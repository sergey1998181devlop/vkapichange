<?php

namespace App\Http\Controllers\API;

use App\Helpers\AntiСurseWords\ObsceneCensorRus;
use App\Helpers\laravelSpatial\Types\Point;
use App\Helpers\VkNewMessageHandler\BotKeyboard\Button;
use App\Helpers\VkNewMessageHandler\BotKeyboard\ButtonRowFactory;
use App\Helpers\VkNewMessageHandler\BotKeyboard\KeyboardFactory;
use App\Http\Controllers\Controller;
use App\Helpers\VkNewMessageHandler\MessageNewHandler;
use App\Models\Categories;
use App\Models\KoordLatLngRussia;
use App\Models\Products;
use App\Helpers\VkNewMessageHandler\BotCarousel;
use App\Models\StatusUsersChangers;
use App\Models\StatusUsersChangersBuy;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use VkApi;

class BaseController extends Controller
{
    private $user;
    private $listData;
    private $vkApiClient;
    private $messages;
    private $status;
    private $walletMin = 9;
    private $radiusDefault = 1600000;
    private $radiusMax = 2000000;
    private $radiusPlanet = 6371210;


    public function store(Request $request){


        //Если секрет не совпадает финиш
        if ($request->secret !== env('VK_SECRET_KEY_CALLBACK')) {
            return;
        }
        //Верификация сервера
        if ($request->type === 'confirmation') {
            return env('VK_SECRET_INIT_KEY_SERVER');
        }

        //Отправка 'ok' на любой запрос от VK
        $this->sendOK();



        //статус зареган или нет
        $this->vkApiClient = app()->get('vkchangesapi');
        $this->messages = config('bot_messages');
        $this->status = $this->getStatusUser($request);
        //достаю разделы если действие было заполненный товар или кнопка посмотреть разделы


        switch ($this->user['user_action']){
            case "waitStart":


//                $payloadMap = json_decode($request->object['payload']);

                if(!empty($request->object['text']) && $request->object['text'] != "Начать"){
                    $params = [
                        'user_id'   => $request->object['from_id'],
                        'random_id' => rand(0, 2 ** 31),
                        'message'   => $this->messages['waitMapNewUser'],

                    ];

                    $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                    die();
                }
                break;
            case "btnAddAdvertisementPhoto":

                   $this->listData =  $this->addDescriptionProduct($request);
                break;
            case "exchangeProduct":
                    $this->type_list_add($request);
                break;
            case "giveAway":
                    $this->type_list_add($request);
                break;
            case "sellProduct":
                    $this->type_list_add($request);
                break;
            case "setPriceForProduct":
                    $this->setPriceForProduct($request);
                break;
            case "name_list_add":
                    $this->name_list_add($request);
                break;
            case "advertisement_list_add":
                    $this->addDescProduct($request);
                break;
            case "typeListAddbtn":
                    $this->typeListAddbtn($request);
                break;

            case "type_list_add":
                $countProducts = Products::where('user_id' , $this->user->id)->count();

                if($countProducts >= 5){
                    //если хотят отправить еще товар  - больше макс кол-во
                    $params = [
                        'user_id'   => $request->object['from_id'],
                        'random_id' => rand(0, 2 ** 31),
                        'message'   => $this->messages['maxProducts'],

                    ];

                    $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                    die();
                }else{
                    //иначе добавляю товар
                    $this->type_list_add($request);
                }
                break;
            case "userClickRadiusInputBtn":
                $this->waitRadiusNumMessage($request);
                break;
        }
//        $this->listData = $this->SaveNewProduct($request);

        //проверяю сейччас пользователь хочет установить своему товару раздел
        //или он хочет установить раздел для поиска товаров
        //также кнопка Обмен
        //согласие или не согласие на обмен
        $payload = '';
        $idKey = '';
        $userInput = '';
        $productInput = '';
        $myProductInput = '';
        $pageMyProducts = '';
        if(isset($request->object['payload'])){
            $payload = json_decode($request->object['payload'], true);
            if(isset($payload['button'])){

                preg_match_all('/#(.*?)#/', (string) $payload['button'] , $statusSectionBtn);
                $idKey = preg_replace('/\D/', '', (string) $payload['button'] );
                if(isset($statusSectionBtn[1][0]) && $statusSectionBtn[1][0] == "readyChange" ||
                    isset($statusSectionBtn[1][0]) && $statusSectionBtn[1][0] == "selectProductToChangeNext" ||
                    isset($statusSectionBtn[1][0]) && $statusSectionBtn[1][0] == "notAgreeWithProduct" ||
                    isset($statusSectionBtn[1][0]) && $statusSectionBtn[1][0] == "notAgreeWithProductBuy" ||
                    isset($statusSectionBtn[1][0]) && $statusSectionBtn[1][0] == "buyProduct" ||
                    isset($statusSectionBtn[1][0]) && $statusSectionBtn[1][0] == "agreeWithProduct" ||
                    isset($statusSectionBtn[1][0]) && $statusSectionBtn[1][0] == "agreeWithProductBuy"
                ){
                    preg_match_all('/!(.*?)!/', (string) $payload['button'] , $productInputMess);
                    preg_match_all('/\((.*?)\)/', (string) $payload['button'] , $userInputMess);
                    preg_match_all('/\*(.*?)\*/', (string) $payload['button'] , $myProductInputMess);


                    preg_match_all('/\^(.*?)\^/', (string) $payload['button'] , $pageMyProductsMess);

                    if(!empty($userInputMess[1][0])){
                        $userInput = $userInputMess[1][0];
                        $productInput = $productInputMess[1][0];
                        if(!empty($myProductInputMess[1][0])){
                            $myProductInput = $myProductInputMess[1][0];
                        }
                        if(!empty($pageMyProductsMess[1][0])){
                            $pageMyProducts = $pageMyProductsMess[1][0];
                        }

                    }
                }

            }
        }


        if(!empty($statusSectionBtn[1][0])){

            $payload['button'] = $statusSectionBtn[1][0];
            //            #set_section#29
//            #search_section#_29
            //#readyChange#22  - 22 вк айди автора
        }

        if(isset($payload['button'])){
            switch ($payload['button']){
                //проверяю не хочет ли пользователь выложить повторно только что созданное обьявление
                case "advertisement_list_add_again":
                         //тогда вызываю функцию которая удалит последнее созданное обьявление
                        //поставит пользователю превоночальный статус
                        //и отправит просьбу о фотке
                        $this->advertisementListAddAgain($request);
                    break;
                case "show_products":
                    $this->listData = $this->checkUserSearchSection( $request);
                    break;
                case "editSearchSection":
                    $this->listData = $this->checkUserSearchSection( $request , true);
                    break;
                case "set_section" :
                    $this->listData = $this->setSectionForProduct((int) $idKey , $request );
                    break;

                case "search_section" :
                    $this->listData = $this->setSectionForSearchUser($request , $idKey );
                    break;
                case "search_sectionWithoutReg" :
                    $this->listData = $this->search_sectionWithoutReg(0 , $idKey );
                    break;
                case "changeSection" :
                    $this->listData = $this->getSections();
                    break;
                case "readyChange" :
                    $this->listData = $this->processingRequest( $request , $userInput , $productInput , $myProductInput);
                    break;
                case "nextPage" :
                    $this->listData = $this->nextPage( $request , $idKey);
                    break;

                case "selectProductToChange" :
                    $this->listData = $this->myProductsToChange( $request);
                    break;
                case "selectProductToChangeNext" :
                    $this->listData = $this->myProductsToChange(  $request , $pageMyProducts);
                    break;

                case "myProducts" :
                    $this->listData = $this->myProducts( $request);
                    break;
                case "nextPageMyProduct":
                    $this->listData = $this->myProducts( $request , $idKey);

                    break;
                case "delProduct":
                    $this->delProduct( $request , $idKey);
                    break;
                case "dellAccount":
                    $this->dellAccount();
                    break;

                case "agreeWithProduct":
                    $this->listData = $this->agreeWithProduct($request , $userInput , $productInput , $myProductInput , $pageMyProducts);
                    break;
                case "agreeWithProductBuy":
                    $this->listData = $this->agreeWithProductBuy($request , $userInput , $productInput , $myProductInput , $pageMyProducts);
                    break;
                case "notAgreeWithProduct" :
                    $this->listData = $this->notAgreeWithProduct($request , $userInput , $productInput , $myProductInput , $pageMyProducts);
                    break;
                case "notAgreeWithProductBuy" :
                    $this->listData = $this->notAgreeWithProductBuy($request , $userInput , $productInput , $myProductInput , $pageMyProducts);
                    break;
                    case "myWallet" :
                        $this->listData =  $this->myWallet();
                    break;
                case "changeRadius" :
                    $this->listData =  $this->changeRadius();
                    break;
                case "waitRadiusBtn" :
                    $this->listData =  $this->waitRadiusBtn($request);
                    break;
                case "buyProduct" :
                    $this->listData =  $this->buyProduct($request , $userInput , $productInput , $myProductInput);
                    break;
                case "show_products_without_reg" :
                    $this->listData = $this->getSectionsWithoutReg();
                    break;
            }
        }

        //Обрабатываем поступившее сообщение / также в нее передаю разделы товаров - если есть
        if ($request->type === 'message_new') {
            MessageNewHandler::handle($request , $this->status , $this->listData);
        }
    }
    public function typeListAddbtn($request){
        $payload = '';
        if(array_key_exists('payload',$request->object)){
            $payload = json_decode($request->object['payload'], true);
        }
        if(
            !empty($request->object['text']) && empty($payload) ||
            isset($request->object['attachments'][0]['type'])){
            $params = [
                'user_id'   => $request->object['from_id'],
                'random_id' => rand(0, 2 ** 31),
                'message'   => $this->messages['pleaseInputTypeProductWithoutPhotoText'],
            ];
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }
    }
    public function buyProduct($request , $userInput , $productInput , $myProductInput){
        $listData = '';
        if((int) $this->user->wallet < (int) $this->walletMin){
            $listData = [
                "currentUser" => $this->user->id,
                "currentWallet" => $this->user->wallet
            ];
            $this->status = "userEmptyWalletForBuy";
        }else{

            //проверяю есть ли у текущего пользователя обьявления
            //если обьявлений нету  - кидаю ему сообщение - что для обмена вам нужно хотя бы одно обьявление
            //в сообщении подставляю предыдущую кнопку  - добавить обьявление

                //если товар есть проверяю сумму на кошельке для обмена
                //если сумма меньше указанной для обмена  - высылаю кнопку пополнения
                if($this->user->wallet < $this->walletMin){
                    $this->status = "userEmptyWalletForBuy";
                }else{
                    //проверяю нажимал ли он уже кнопку обмен?

                    if(StatusUsersChangersBuy::where('user_id' , $this->user->id)
                        ->where('product_id_one' , $productInput)
                        ->where('status' , 'inpProductBuy')
                        ->first()){
                        //если пользователь удалился в момент согласия на обмен
                        $params = [
                            'user_id'   => $this->user->vk_from_id,
                            'random_id' => rand(0, 2 ** 31),
                            'message'   =>  $this->messages['youRepeatBuyFalse'],

                        ];
                        $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                        die();
                    }else{
                        //иначе отправляю пользователю свой товар
                        //подбираю свой товар и его

                        $categories = Products::whereIn('id' , [$productInput])->with('categories')
                            ->with('user')->get();


                        $resultToSend = [
                            'useridToSend' => $userInput,
                            'userCurrent'  => $this->user->vk_from_id
                        ];


                        foreach ($categories as $id => $product){
                            if($product->id == $productInput) {

                                $resultToSend['productInput'] = [
                                    "id" => $product->id,
                                    "id_product" => $product->id_product,
                                    "category_id" => $product->category_id,
                                    "user_id" => $product->user_id,
                                    "photo" => $product->photo,
                                    "description" => $product->description,
                                    "photo_id" => $product->photo_id,
                                    "access_key" => $product->access_key,
                                    "name" => $product->user->name,
                                    "wallet" => $product->user->wallet,
                                    "surname" => $product->user->surname,
                                    "city" => $product->user->city,
                                    "section_description" => $product->categories->title,

                                    "type_product" => $product->type_product,
                                    "name_product" => $product->name_product,
                                    "price" => $product->price,
                                ];
                                if (!empty($resultToSend['productInput']['access_key'])) {

                                    $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY'),
                                        ['message_ids' => array($resultToSend['productInput']['access_key'])]);
                                    $resultToSend['productInput']['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
                                }

                            }
                        }


                        //если в массиве нету товара пользователя которого выбрали - значит удалили акаунт или этот товар
                        if(empty($resultToSend['productInput']['id'])){
                            //если пользователь удалился в момент согласия на обмен
                            $params = [
                                'user_id'   => $this->user->vk_from_id,
                                'random_id' => rand(0, 2 ** 31),
                                'message'   =>  $this->messages['delAccountInInput'],

                            ];
                            $this->status = "delAccountInInput";
                            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                            die();
                        }
                        else{

                            $statusUsersChangers = StatusUsersChangersBuy::create(
                                array(
                                    'user_id' => $this->user->id,
                                    'product_id_one' => $productInput,
                                    'status' => 'inpProductBuy',
                                )
                            );
                            $this->status = "messageToBuyProductUser";
                            $listData = $resultToSend;
                        }
                    }





                }

                //если не пуста высылаю автору запрос на обмен с кнопками согласия либо отказа

//        dd($productCurrentUser);
        }
        return $listData;
    }
    public function waitRadiusBtn($request){

        $this->status = "waitRadius";
        $this->user->user_action = "userClickRadiusInputBtn";
        $this->user->save();
    }
    public function waitRadiusNumMessage($request){
        if((int) $request->object['text'] &&
            (int) $request->object['text'] * 1000 < $this->radiusPlanet &&
            (int) $request->object['text'] * 1000 <= $this->radiusMax ){


            $radiusNew = (int) $request->object['text'] * 1000;
            $this->user->current_radius = $radiusNew;
            $this->user->user_action = "successChangeRadius";
            $this->user->save();
            $this->status = "successUpdateRadius";
        }else{
            $this->status = "userInputNotNum";

        }

    }
    public function changeRadius(){
        $radius['currentRadius'] = 0;
        if($this->user->current_radius){
            $radius['currentRadius'] = $this->user->current_radius  / 1000;
        }else{
            $radius['currentRadius'] = $this->radiusDefault / 1000;
        }
        return $radius;
    }
    public function myWallet(){
        $this->status = "myWallet";
        return [
            'wallet' => $this->user->wallet,
            'currentUser' => $this->user->id,
        ];
    }
    //отказ на обмен
    public function notAgreeWithProduct($request , $userInput , $productInput , $myProductInput , $pageMyProducts){
        //если пользователь отказал - отправляю текущему отказсчику уведомление  -
        //что отказ ушел - возвращаю кнопку поиска
        // второму отправляю уведомление об отказе



        if(StatusUsersChangers::where('user_id' , $this->user->id)
            ->where('product_id_one' , $myProductInput)
            ->where('product_id_two' , $pageMyProducts)
            ->where('status' , 'setStatusTruNotChange')
            ->first()){
            //если пользователь удалился в момент согласия на обмен
            $params = [
                'user_id'   => $this->user->vk_from_id,
                'random_id' => rand(0, 2 ** 31),
                'message'   =>  $this->messages['TrueChangeToUser'],

            ];
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }else{
            $this->status = "notAgreeWithProductTrueForUser";
            $listId = [
                'userIdWithEmptyWallet' => (int) $userInput,
                'currentUser' => $this->user->vk_from_id
            ];
            $user2 = User::where("vk_from_id",(int) $userInput)->first();
            $statusUsersChangers = StatusUsersChangers::create(
                array(
                    'user_id' => $this->user->id,
                    'product_id_one' => $myProductInput,
                    'product_id_two' => $pageMyProducts,
                    'status' => 'setStatusTruNotChange',
                )
            );

            if(!$user2){


                //если пользователь удалился в момент согласия на обмен

                $this->status = "delAccountInApply";
                die();
                return false;

            }
        }




        return $listId;
    }
    //отказ на покупку
    public function notAgreeWithProductBuy($request , $userInput , $productInput , $myProductInput , $pageMyProducts){
        //если пользователь отказал - отправляю текущему отказсчику уведомление  -
        //что отказ ушел - возвращаю кнопку поиска
        // второму отправляю уведомление об отказе



        if(StatusUsersChangersBuy::where('user_id' , $this->user->id)
            ->where('product_id_one' , $myProductInput)
            ->where('status' , 'setStatusTruNotChange')
            ->first()){
            //если пользователь удалился в момент согласия на обмен
            $params = [
                'user_id'   => $this->user->vk_from_id,
                'random_id' => rand(0, 2 ** 31),
                'message'   =>  $this->messages['TrueBuyToUser'],

            ];
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }else{
            $this->status = "notAgreeWithProductTrueForUserBuy";
            $listId = [
                'userIdWithEmptyWallet' => (int) $userInput,
                'currentUser' => $this->user->vk_from_id
            ];
            $user2 = User::where("vk_from_id",(int) $userInput)->first();
            $statusUsersChangers = StatusUsersChangersBuy::create(
                array(
                    'user_id' => $this->user->id,
                    'product_id_one' => $myProductInput,
                    'product_id_two' => $pageMyProducts,
                    'status' => 'setStatusTruNotChange',
                )
            );

            if(!$user2){


                //если пользователь удалился в момент согласия на обмен

                $this->status = "delAccountInApply";
                die();
                return false;

            }
        }




        return $listId;
    }
    //согласие на на покупку
    public function agreeWithProductBuy($request , $userInput , $productInput , $myProductInput , $pageMyProducts){

        $listId = '';//сюда закидываю обратно айдишники юзеров )
        //чтобы востановить кнопку пользователю - Согласиться
//        dd($this->user);
//        dd($userInput , $productInput , $myProductInput);
//        $productCurrentUser = User::where('vk_from_id' , $this->user->id)->first();
        if($this->user->wallet < $this->walletMin){
            $this->status = "userEmptyWallet";
            $user2 = User::where("vk_from_id",(int) $userInput)->first();
            $listId = [
                'currentUser' => $this->user->vk_from_id,
                'userIdWithEmptyWallet' => $user2->vk_from_id, // второй юзер
            ];
        }else{
            //проверяю у второго стредства
            $user2 = User::where("vk_from_id",(int) $userInput)->first();
            if(!$user2){


                //если пользователь удалился в момент согласия на обмен

                $this->status = "delAccountInApply";

                return false;

            }

            //если у второго пользователя нету средств ) отправляю в обе стороны уведомление
            //первому кидаю кнопку - смотреть обьявления - предлагаю смотреть дальше или
            //повторить действие позже
            // второму кидаю уведомаление о согласии но отсуствии средств
            if((int) $user2->wallet < (int) $this->walletMin){


                $this->status = "secondUserEmptyWalletBuy";
//                $myProductInput

                $product = Products::where("id",(int) $myProductInput)->with('categories')->first();

                $listId = [
                    'userIdWithEmptyWallet' => $user2->vk_from_id,
                    'currentUser' => $this->user->vk_from_id,
                    'product' => [
                        "id" => $product->id,
                        "id_product" => $product->id_product,
                        "category_id" => $product->category_id,
                        "user_id" => $product->user_id,
                        "photo" => $product->photo,
                        "description" => $product->description,
                        "photo_id" => $product->photo_id,
                        "access_key" => $product->access_key,
                        "name" => $product->user->name,
                        "wallet" => $product->user->wallet,
                        "surname" => $product->user->surname,
                        "city" => $product->user->city,
                        "section_description" => $product->categories->title,

                        "type_product" => $product->type_product,
                        "name_product" => $product->name_product,
                        "price" => $product->price,
                    ]
                ];


                if(!empty($listId['product']['access_key'])){

                    $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                        ['message_ids' => array($listId['product']['access_key'])] );
                    $listId['product']['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
                }


            }else{


//                $product = Products::where("id",(int) $myProductInput)->with('categories')->first();
                if(StatusUsersChangersBuy::where('user_id' , $this->user->id)
                    ->where('product_id_one' , $myProductInput)
                    ->where('status' , 'setStatusTruNotChange')
                    ->first()){
                    //если пользователь удалился в момент согласия на обмен
                    $params = [
                        'user_id'   => $this->user->vk_from_id,
                        'random_id' => rand(0, 2 ** 31),
                        'message'   =>  $this->messages['TrueBuyToUser'],

                    ];
                    $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                    die();
                }else{
                    //иначе списываю у двоих и высылаю в обе стороны ссылки на аккаунты
                    $status = User::whereIn('vk_from_id',[$userInput , $productInput])->decrement('wallet' , $this->walletMin);
                    $this->status = "successDeal";



                    $product = Products::where("id",(int) $myProductInput)->with('categories')->first();
                    $listId = [
                        'userIdWithEmptyWallet' => $user2->vk_from_id,
                        'currentUser' => $this->user->vk_from_id,
                        'product' => [
                            "id" => $product->id,
                            "id_product" => $product->id_product,
                            "category_id" => $product->category_id,
                            "user_id" => $product->user_id,
                            "photo" => $product->photo,
                            "description" => $product->description,
                            "photo_id" => $product->photo_id,
                            "access_key" => $product->access_key,
                            "name" => $product->user->name,
                            "wallet" => $product->user->wallet,
                            "surname" => $product->user->surname,
                            "city" => $product->user->city,
                            "section_description" => $product->categories->title,

                            "type_product" => $product->type_product,
                            "name_product" => $product->name_product,
                            "price" => $product->price,
                        ]
                    ];


                    if(!empty($listId['product']['access_key'])){
                        $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                            ['message_ids' => array($listId['product']['access_key'])] );
                        $listId['product']['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
                    }
                    $statusUsersChangers = StatusUsersChangersBuy::create(
                        array(
                            'user_id' => $this->user->id,
                            'product_id_one' => $myProductInput,
                            'status' => 'setStatusTruNotChange',
                        )
                    );



                }




            }


        }

        return $listId;
    }
    //согласие на обмен
    public function agreeWithProduct($request , $userInput , $productInput , $myProductInput , $pageMyProducts){

        $listId = '';//сюда закидываю обратно айдишники юзеров )
        //чтобы востановить кнопку пользователю - Согласиться
//        dd($this->user);
//        dd($userInput , $productInput , $myProductInput);
//        $productCurrentUser = User::where('vk_from_id' , $this->user->id)->first();
        if($this->user->wallet < $this->walletMin){
            $this->status = "userEmptyWallet";
            $user2 = User::where("vk_from_id",(int) $userInput)->first();
            $listId = [
                'currentUser' => $this->user->vk_from_id,
                'userIdWithEmptyWallet' => $user2->vk_from_id, // второй юзер
            ];
        }else{
            //проверяю у второго стредства
            $user2 = User::where("vk_from_id",(int) $userInput)->first();
            if(!$user2){


                    //если пользователь удалился в момент согласия на обмен

                    $this->status = "delAccountInApply";

                    return false;

            }

            //если у второго пользователя нету средств ) отправляю в обе стороны уведомление
            //первому кидаю кнопку - смотреть обьявления - предлагаю смотреть дальше или
            //повторить действие позже
            // второму кидаю уведомаление о согласии но отсуствии средств
            if((int) $user2->wallet < (int) $this->walletMin){


                $this->status = "secondUserEmptyWallet";
//                $myProductInput

                $product = Products::where("id",(int) $myProductInput)->with('categories')->first();

                $listId = [
                    'userIdWithEmptyWallet' => $user2->vk_from_id,
                    'currentUser' => $this->user->vk_from_id,
                    'product' => [
                        "id" => $product->id,
                        "id_product" => $product->id_product,
                        "category_id" => $product->category_id,
                        "user_id" => $product->user_id,
                        "photo" => $product->photo,
                        "description" => $product->description,
                        "photo_id" => $product->photo_id,
                        "access_key" => $product->access_key,
                        "name" => $product->user->name,
                        "wallet" => $product->user->wallet,
                        "surname" => $product->user->surname,
                        "city" => $product->user->city,
                        "section_description" => $product->categories->title,

                        "type_product" => $product->type_product,
                        "name_product" => $product->name_product,
                        "price" => $product->price,
                    ]
                ];


                if(!empty($listId['product']['access_key'])){

                    $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                        ['message_ids' => array($listId['product']['access_key'])] );
                    $listId['product']['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
                }

            }else{


//                $product = Products::where("id",(int) $myProductInput)->with('categories')->first();
                if(StatusUsersChangers::where('user_id' , $this->user->id)
                    ->where('product_id_one' , $myProductInput)
                    ->where('product_id_two' , $pageMyProducts)
                    ->where('status' , 'setStatusTruNotChange')
                    ->first()){
                    //если пользователь удалился в момент согласия на обмен
                    $params = [
                        'user_id'   => $this->user->vk_from_id,
                        'random_id' => rand(0, 2 ** 31),
                        'message'   =>  $this->messages['TrueChangeToUser'],

                    ];
                    $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                    die();
                }else{
                    //иначе списываю у двоих и высылаю в обе стороны ссылки на аккаунты
                    $status = User::whereIn('vk_from_id',[$userInput , $productInput])->decrement('wallet' , $this->walletMin);
                    $this->status = "successDeal";



                    $product = Products::where("id",(int) $myProductInput)->with('categories')->first();
                    $listId = [
                        'userIdWithEmptyWallet' => $user2->vk_from_id,
                        'currentUser' => $this->user->vk_from_id,
                        'product' => [
                            "id" => $product->id,
                            "id_product" => $product->id_product,
                            "category_id" => $product->category_id,
                            "user_id" => $product->user_id,
                            "photo" => $product->photo,
                            "description" => $product->description,
                            "photo_id" => $product->photo_id,
                            "access_key" => $product->access_key,
                            "name" => $product->user->name,
                            "wallet" => $product->user->wallet,
                            "surname" => $product->user->surname,
                            "city" => $product->user->city,
                            "section_description" => $product->categories->title,

                            "type_product" => $product->type_product,
                            "name_product" => $product->name_product,
                            "price" => $product->price,
                        ]
                    ];


                    if(!empty($listId['product']['access_key'])){
                        $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                            ['message_ids' => array($listId['product']['access_key'])] );
                        $listId['product']['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
                    }
                    $statusUsersChangers = StatusUsersChangers::create(
                        array(
                            'user_id' => $this->user->id,
                            'product_id_one' => $myProductInput,
                            'product_id_two' => $pageMyProducts,
                            'status' => 'setStatusTruNotChange',
                        )
                    );



                }




            }


        }

        return $listId;
    }
    //удаление аккаунта
    public function dellAccount(){
//        $result = User::where('id' , $this->user->id)->delete();
//          $result = $this->user->products()->delete();
//          $result = $this->user->delete();
//          dd($result);
        $result = Products::where('user_id' , $this->user->id)->delete();
        $result = $this->user->delete();
        $this->status = "removedUser";
    }
    //удаление товара
    public function delProduct($request , $idKey){
        $count = Products::where('id_product' , $idKey)->count();
        if($count){
            $status = Products::where('id_product' , $idKey)->delete();
            if($status){
                $this->status = "removedProduct";
            }
        }else{
            $this->status = "alreadyRemoved";
        }
    }

    //мои товары для выбора на обмен
    public function myProductsToChange($request , $page = 0){

        //получаю товары пользователя
        $products = Products::where('user_id' , $this->user->id)
            ->join('catalog_category_main', 'catalog_category_main.id', '=', 'products.category_id')
            ->join('users', 'users.id', '=', 'products.user_id')
            ->limit(1)->offset($page)->first();
        $result = '';

        if($res = $products){
            $this->status = "myProductsToChangeNotEmpty";

            if(!empty($res['access_key'])){

                $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                    ['message_ids' => array($res['access_key'])] );
                $res['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
            }

            $result = $res;

        }else{
            $products = Products::where('user_id' , $this->user->id)
                ->join('catalog_category_main', 'catalog_category_main.id', '=', 'products.category_id')
                ->join('users', 'users.id', '=', 'products.user_id')
                ->limit(1)->offset(0)->first();
//            $result = '';


            if($res = $products){
                $this->status = "myProductsToChangeNotEmptyRepeat";

                if(!empty($res['access_key'])){

                    $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                        ['message_ids' => array($res['access_key'])] );
                    $res['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
                }

                $result = $res;

            }else{
                            $this->status = "myProductsToChangeEmpty";
            }

//            $this->status = "myProductsToChangeEmpty";
        }
//        dd( $this->status);
        return $result;
    }
    //мои товары
    public function myProducts($request , $page = 0){
        //получаю товары пользователя
        $products = Products::where('user_id' , $this->user->id)
            ->join('catalog_category_main', 'catalog_category_main.id', '=', 'products.category_id')
            ->join('users', 'users.id', '=', 'products.user_id')
            ->limit(1)->offset($page)->first();
        $result = '';
        if($res = $products){
            $this->status = "myProductNotEmpty";
            $result = $res;
            if(!empty($res['access_key'])){
                $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                    ['message_ids' => array($res['access_key'])] );
                $result['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
            }


        }else{
            $productszer = Products::where('user_id' , $this->user->id)
                ->join('catalog_category_main', 'catalog_category_main.id', '=', 'products.category_id')
                ->join('users', 'users.id', '=', 'products.user_id')
                ->limit(1)->offset(0)->first();
            if($res = $productszer){
                $this->status = "myProductNotEmptyRepeat";

                $result = $res;
                if(!empty($res['access_key'])){
                    $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                        ['message_ids' => array($res['access_key'])] );
                    $result['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
                }
            }else{
                $this->status = "myProductEmpty";
            }


//            $this->status = "myProductEmpty";
        }


        return $result;
    }
    //проверяю есть ли еще обьявления - меняю статус
    public function nextPage($request , $idKey){
        $result = $this->showListProducts($idKey);
        if($result){
            $this->status = "nextPageIsset";
        }else{
            $this->status = "nextPageEmpty";
        }
        return $result;
    }
    //функция обработки  кнопки обмен
    public function processingRequest( $request , $userInput , $productInput , $myProductInput){
        $listData = '';
        if((int) $this->user->wallet < (int) $this->walletMin){
            $listData = [
                "currentUser" => $this->user->id,
                "currentWallet" => $this->user->wallet
            ];
            $this->status = "userEmptyWallet";
        }else{

            //проверяю есть ли у текущего пользователя обьявления
            //если обьявлений нету  - кидаю ему сообщение - что для обмена вам нужно хотя бы одно обьявление
            //в сообщении подставляю предыдущую кнопку  - добавить обьявление
            $productCurrentUser = Products::where('user_id' , $this->user->id)->first();
            if(empty($productCurrentUser)){
                //если у пользователя нету товаров - отправляю сообщение с кнопкой - добавить обьявления
                $this->status = "userEmptyProduct";
                $this->user->user_action = "advertisement_list_add";
                $this->user->save();
            }else{
                //если товар есть проверяю сумму на кошельке для обмена
                //если сумма меньше указанной для обмена  - высылаю кнопку пополнения
                if($this->user->wallet < $this->walletMin){
                    $this->status = "userEmptyWallet";
                }else{
                    //проверяю нажимал ли он уже кнопку обмен?

                    if(StatusUsersChangers::where('user_id' , $this->user->id)
                        ->where('product_id_one' , $productInput)
                        ->where('product_id_two' , $myProductInput)
                        ->where('status' , 'inpProductChange')
                        ->first()){
                        //если пользователь удалился в момент согласия на обмен
                        $params = [
                            'user_id'   => $this->user->vk_from_id,
                            'random_id' => rand(0, 2 ** 31),
                            'message'   =>  $this->messages['youRepeatChangeFalse'],

                        ];
                        $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                        die();
                    }else{
                        //иначе отправляю пользователю свой товар
                        //подбираю свой товар и его

                        $categories = Products::whereIn('id' , [$productInput, $myProductInput])->with('categories')
                            ->with('user')->get();

                        $resultToSend = [
                            'useridToSend' => $userInput,
                            'userCurrent'  => $this->user->vk_from_id
                        ];


                        foreach ($categories as $id => $product){
                            if($product->id == $productInput){

                                $resultToSend['productInput'] = [
                                    "id" => $product->id,
                                    "id_product" => $product->id_product,
                                    "category_id" => $product->category_id,
                                    "user_id" => $product->user_id,
                                    "photo" => $product->photo,
                                    "description" => $product->description,
                                    "photo_id" => $product->photo_id,
                                    "access_key" => $product->access_key,
                                    "name" => $product->user->name,
                                    "wallet" => $product->user->wallet,
                                    "surname" => $product->user->surname,
                                    "city" => $product->user->city,
                                    "section_description" => $product->categories->title,

                                    "type_product" => $product->type_product,
                                    "name_product" => $product->name_product,
                                    "price" => $product->price,
                                ];
                                if(!empty($resultToSend['productInput']['access_key'])){

                                    $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                                        ['message_ids' => array($resultToSend['productInput']['access_key'])] );
                                    $resultToSend['productInput']['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
                                }

                            }elseif ($product->id == $myProductInput){

                                $resultToSend['myProductInput'] = [
                                    "id" => $product->id,
                                    "id_product" => $product->id_product,
                                    "category_id" => $product->category_id,
                                    "user_id" => $product->user_id,
                                    "photo" => $product->photo,
                                    "description" => $product->description,
                                    "photo_id" => $product->photo_id,
                                    "access_key" => $product->access_key,
                                    "name" => $product->user->name,
                                    "wallet" => $product->user->wallet,
                                    "surname" => $product->user->surname,
                                    "city" => $product->user->city,
                                    "section_description" => $product->categories->title,


                                    "type_product" => $product->type_product,
                                    "name_product" => $product->name_product,
                                    "price" => $product->price,
                                ];
                                if(!empty($resultToSend['myProductInput']['access_key'])){

                                    $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                                        ['message_ids' => array($resultToSend['myProductInput']['access_key'])] );
                                    $resultToSend['myProductInput']['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
                                }
                            }
                        }

                        //если в массиве нету товара пользователя которого выбрали - значит удалили акаунт или этот товар
                        if(empty($resultToSend['productInput']['id'])){
                            //если пользователь удалился в момент согласия на обмен
                            $params = [
                                'user_id'   => $this->user->vk_from_id,
                                'random_id' => rand(0, 2 ** 31),
                                'message'   =>  $this->messages['delAccountInInput'],

                            ];
                            $this->status = "delAccountInInput";
                            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                            die();
                        }
                        else{

                            $statusUsersChangers = StatusUsersChangers::create(
                                array(
                                    'user_id' => $this->user->id,
                                    'product_id_one' => $productInput,
                                    'product_id_two' => $myProductInput,
                                    'status' => 'inpProductChange',
                                )
                            );
                            $this->status = "messageToChangeUser";
                            $listData = $resultToSend;
                        }
                    }





                }

                //если не пуста высылаю автору запрос на обмен с кнопками согласия либо отказа
            }
//        dd($productCurrentUser);
        }
        return $listData;
    }
    //функция присвоения раздела для поиска - после первого захода или кнопки  - изменить
    public function setSectionForSearchUser($request , $idSection){
        if(empty($this->user->section_seach)){
            //если пустое поле поиска разделов  - значит это новобранец ебаный
            $this->user->section_seach = $idSection ??  "";
            $this->user->save();
        }else{
            $this->user->section_seach = $idSection ??  "";
            $this->user->save();
        }
        $result = '';
        if($res = $this->showListProducts()){
            $result = $res;
        }else{
            $this->status = "startSearchEmptyRes";
        }
        //после добавление или обновления вызываю сразу функцию поиска и отдаю ему первую часть обьявлений
        return $result;
    }
    //функция для кнопки - выложить повторно
    public function advertisementListAddAgain($request){

        $product = Products::latest()->where('user_id',$this->user->id)->first()->delete();
        $this->user->user_action = "typeListAddbtn";
        $this->user->save();
        $this->status = "advertisementListAddAgain";

    }
    //присвоение товару  - id  раздела
    public function setSectionForProduct($idSection , $request ){

        $product = Products::latest()->where('user_id',$this->user->id)->first()->update([
            "category_id" => (int) $idSection
        ]);
        $product = Products::latest()->where('user_id',$this->user->id)->first();

        $dataToMessageUser = [];
        if($product){
//говно написал - не понимавю как при обновлении вернуть связанную таблицу
            $category = Categories::find((int) $idSection);

            $dataToMessageUser = [
                "userName" => $this->user->name,
                "surname" => $this->user->surname,
                "country" => $this->user->country,
                "city" => $this->user->city,
                "photo" => $product->photo,
                "description" => $product->description,
                "titleSection" => $category->title,
                "descriptionSection" => $category->description,
                "photo_id" => $product->photo_id,
                "access_key" => $product->access_key,
                "wallet" => $this->user->wallet,
                "name_product" => $product->name_product,
                "type_product" => $product->type_product,
                "price" => $product->price,
            ];
            if(!empty($dataToMessageUser['access_key'])){

                $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                    ['message_ids' => array($dataToMessageUser['access_key'])] );
                $dataToMessageUser['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
            }



        }

        return $dataToMessageUser;

    }
    //получение текущего статуса юзера - есть/ нету
    public function getStatusUser($request){

        //проверяем есть ли пользователь в базе / если нету отправляю его на регистрацию отдаю описание что он не зарегистрарован
        //и сразу отдаю карту для заполнения
        $statusUser = '';

//        $ssf = User::where('vk_from_id', $request->object['from_id'])->get();
//        dd($ssf);
        $this->user = User::where('vk_from_id', $request->object['from_id'])->first();



        if(!$this->user){

            $payload = '';
            if(array_key_exists('payload',$request->object)){
                $payload = json_decode($request->object['payload'], true);
            }

            if(!isset($payload['command']) ){
                //если при первом запуске ввели текст  - то кидаю кнопку начать и прошу начать - с нажатия ээтой кнопки

                $start       = Button::create(['command' => 'start'], 'Начать', 'positive');
                $btnRow1 = ButtonRowFactory::createRow()->addButton($start)->getRow();
                $kb = KeyboardFactory::createKeyboard()
                    ->addRow($btnRow1)
                    ->setOneTime(false)
                    ->setInline(true)
                    ->getKeyboardJson();
                    $params = [
                        'user_id'   => $request->object['from_id'],
                        'random_id' => rand(0, 2 ** 31),
                        'message'   => $this->messages['pleaseInpBtnStart'],
                        'keyboard'  => $kb,
                    ];
                    $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);

                   die();

            }

            //получаю имя и фамилию город страну и дату рождения у вк
            $VkUser = VkApi::users()->get(env('VK_SECRET_INIT_KEY'), [
                'user_ids'  => [$request->object['from_id']],
                'fields'    => ['first_name', 'last_name' , 'bdate' , 'city' , 'country'],
            ]);
            $statusFirstStart = '';
            $city_coordinates_Y = '';
            $city_coordinates_X = '';
            $cityTitle = '';
            //получаю город пользователя
            if(!empty($VkUser[0]['city'])){
                $statusFirstStart = 'show_products_without_reg';
                $countryIndetiter = $VkUser[0]['country']['id'];
                $country = $VkUser[0]['country']['title'];
                $cityIndetiter = $VkUser[0]['city']['id'];

                $cityVk = $VkUser[0]['city']['title'];
                //достаю из своей базы координаты города который вернулся
                $city = KoordLatLngRussia::where('city', 'LIKE', "%{$cityVk}%")->first();

                $cityTitle = $city->city;
                $city_coordinates_Y =  $city->lat;
                $city_coordinates_X = $city->lng;
            }else{
                $statusFirstStart = 'waitStart';
                $city_coordinates_Y = '55.755819';
                $city_coordinates_X = '37.617644';
            }

            $age = 0;

            if(isset($VkUser[0]['bdate']) && !empty($VkUser[0]['bdate']) && preg_match("/[\d]{4}+/", $VkUser[0]['bdate'] ,$match) ){
                $birthDate = explode(".", $VkUser[0]['bdate']);
                //get age from date or birthdate
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                    ? ((date("Y") - $birthDate[2]) - 1)
                    : (date("Y") - $birthDate[2]));
            }


            $payload = '';
            if(array_key_exists('payload',$request->object)){
                $payload = json_decode($request->object['payload'], true);
            }

            //добавляю пользователя в базу
            $this->user = User::create(
                array(
                    'vk_from_id' => (int) $request->object['from_id'],
                    'city_coordinates_Y' => $city_coordinates_Y,
                    'city_coordinates_X' => $city_coordinates_X,
                    'geometry_point' => new Point(55.755819 , 37.617644),
                    'country' => 'Россия',
                    'city' => 'Москва',
                    'name' => $VkUser[0]['first_name'],
                    'surname' => $VkUser[0]['last_name'],
                    'wallet' => 33,
                    'user_action' => $statusFirstStart,
                    'age' => (int) $age,
                )
            );

            if(!empty($cityTitle)){
                //отправляю сообщение пользователю о том какой город взят для поиска
                $params = [
                    'user_id'   => $request->object['from_id'],
                    'random_id' => rand(0, 2 ** 31),
                    'message'   => '',
                    'keyboard'  => json_encode([
                        'buttons' => [],
                        'one_time' => true
                    ]),
                ];
                $params['message'] = 'Город  '.$cityTitle.' взят из вашего аккаунта для поиска товаров';
                $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                //ставлю статус зареганого если у него в акаунте был город  и я сммог получить координаты
                $statusUser = 'updatingAccountAddMap';
            }else{
                if($this->user->count()){
                    //Ставлю статус не зарегистрированого
                    $statusUser = 'notRegistered';
                }
            }


        }else{

            $statusUser = 'Registered';
            if(array_key_exists('geo', $request->object) ){
                //если пришла карта в сообщении - то добавлю статус обновления
                //чтобы вернуть сообщение об успешной регистрации и кнопки
                $this->user->citi_coordinates_y = (string) $request->object['geo']['coordinates']['latitude'];
                $this->user->citi_coordinates_x = (string) $request->object['geo']['coordinates']['longitude'];
                $this->user->geometry_point = new Point($request->object['geo']['coordinates']['latitude'] , $request->object['geo']['coordinates']['longitude']);
                $this->user->country = $request->object['geo']['place']['country'] ?? "";
                $this->user->city = $request->object['geo']['place']['city'] ??  "";
                $this->user->save();

                //когда аккаунт создан  / высвечиваю кнопки старта и отсылаю статус о успешной регистрации
                //проставляю статус для стартового метода
                $statusUser = 'updatingAccountAddMap';
                $payload = '';
                if(array_key_exists('payload',$request->object)){
                    $payload = json_decode($request->object['payload'], true);
                }




                if($payload['button'] == "updateMap"){
                    //если это было обновление карты - высвечиваю кнопки старта и отдаю статус об успешном обновлении адресса
                    //тут ставим статус для текста об обновлении
                    $statusUser = 'updateMapSuccess';
                }
            }

            $payload = '';
            if(array_key_exists('payload',$request->object)){
                $payload = json_decode($request->object['payload'], true);
            }
            if(!isset($payload['command']) && array_key_exists('payload',$request->object) && $payload['button'] == "edit_map"){
                //находимся в процессе обновления  - вызываем метод который отдаст кнопку местоположения
                $statusUser = 'updatingMap';
            }
            if( !empty($payload['command']) &&
                $payload['command'] == "start"
            ){
                $params = [
                    'user_id'   => $request->object['from_id'],
                    'random_id' => rand(0, 2 ** 31),
                    'message'   => '',
                    'keyboard'  => json_encode([
                        'buttons' => [],
                        'one_time' => true
                    ]),
                ];
                switch ($this->user->user_action){
                    case "type_list_add":
                        $params['message'] = $this->messages['type_list_add'];
                        //востанавливаю кнопки пользователлю - продать /  обменять / отдать даром

                        $exchangeProduct       = Button::create(['button' => 'exchangeProduct'], 'Обменять', 'positive');
                        $giveAway       = Button::create(['button' => 'giveAway'], 'Отдать даром', 'primary');
                        $sellProduct       = Button::create(['button' => 'sellProduct'], 'Продать', 'primary');

                        $btnRow1 = ButtonRowFactory::createRow()->addButton($exchangeProduct)->getRow();
                        $btnRow2 = ButtonRowFactory::createRow()->addButton($giveAway)->getRow();
                        $btnRow3 = ButtonRowFactory::createRow()->addButton($sellProduct)->getRow();
                        $kb = KeyboardFactory::createKeyboard()
                            ->addRow($btnRow1)
                            ->addRow($btnRow2)
                            ->addRow($btnRow3)
                            ->setOneTime(false)
                            ->getKeyboardJson();
                        $params['keyboard'] = $kb;

                        $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                        die();
                    break;
                    case "name_list_add":
                        $params['message'] = $this->messages['name_list_add_after_del'];
                        $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                        die();
                        break;
                    case "advertisement_list_add":
                        $params['message'] = $this->messages['btnAddAdvertisement_after_del'];
                        $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                        die();
                    break;
                    case "btnAddAdvertisementPhoto":
                        $params['message'] = $this->messages['btnAddAdvertisementPhoto_after_del'];
                        $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                        die();
                    break;
                }
            }


            $payloadMap = '';
            if(!empty($payload['command']) &&  $payload['command'] == "start"){
                $payloadMap = 'WaitMap';
            }

            if(!empty($payload)){
                $this->user->user_action = $payload['button'] ?? $payloadMap;
                $this->user->save();
            }

        }
        return $statusUser;
    }

    //прислали фото своего товара
    function addDescriptionProduct( $request){
        if(!empty($request->object['text'])){
            $params = [
                'user_id'   => $request->object['from_id'],
                'random_id' => rand(0, 2 ** 31),
                'message'   => $this->messages['btnAddAdvertisementPhoto_please_after_error'],
                'keyboard'  => json_encode([
                    'buttons' => [],
                    'one_time' => true
                ]),
            ];
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }

        $listSections = [];
        if(isset($request->object['attachments'][0]['type']) && $request->object['attachments'][0]['type'] == "photo" &&
            $this->user['user_action'] == "btnAddAdvertisementPhoto"
        ){



//                $product = Products::latest()->where('user_id',$this->user->id)->first()->update([
//                    "category_id" => (int) $idSection
//                ]);

            $path = '';
            foreach ($request->object['attachments'][0]['photo']['sizes'] as $id => $photo){
                if($photo['type'] == "w" || $photo['type'] == "z" || $photo['type'] == "y" || $photo['type'] == "r" ||  $photo['type'] == "q"
                    || $photo['type'] == "x" || $photo['type'] == "p"
                ){
                    $path = $photo['url'];
                    break;
                }
            }

            $messageForUser = '';
            //если фоток больше одной  - отправляю сообщение
            if(count($request->object['attachments']) == 1) {
                //если маленькая фотка  - отпрвляю сообщение что фотка маленькая
                if (empty($path)) {
                    $messageForUser = $this->messages['SmallSizePhoto'];
                } else {

                    //иначе обновляю товар

                    $product = Products::latest()->where('user_id',$this->user->id)->first()->update([
                        'photo' => $path,
                        'photo_id' => $request->object['attachments'][0]['photo']['owner_id'].'_'.$request->object['attachments'][0]['photo']['id'],
                        'access_key' => $request->object['id']
                    ]);
                    $this->user->user_action = "btnAddAdvertisementPhotoSuccess";
                    $this->user->save();

                    $listSections = $this->getSections();

                }
            }else{
                $messageForUser = $this->messages['UserUploadMoreOnePhoto'];
            }
            if(!empty($messageForUser)){
                $params = [
                    'user_id'   => $request->object['from_id'],
                    'random_id' => rand(0, 2 ** 31),
                    'message'   => $messageForUser,
                    'keyboard'  => json_encode([
                        'buttons' => [],
                        'one_time' => true
                    ]),
                ];
                $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                return false;
            }


        }
        return $listSections;
    }
    public function setPriceForProduct($request){
        $params = [
            'user_id'   => $request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->messages['pleaseWithoutTExt'],
            'keyboard'  => json_encode([
                'buttons' => [],
                'one_time' => true
            ]),
        ];

        //если прислали фото в момент выбора типа
        if(!empty($request->object['attachments'][0]['type'])){
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }
        //если прислали текст в момент выбора типа
        if(!empty($request->object['text']) && !(int) $request->object['text']){
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }

        if($price = (int) $request->object['text']){

//            name_list_add
            $product = Products::latest()->where('user_id',$this->user->id)->first()->update([
                'price' => $price,
            ]);

            $this->user->user_action = "name_list_add";
            $this->user->save();


            $params = [
                'user_id'   => $request->object['from_id'],
                'random_id' => rand(0, 2 ** 31),
                'message'   => $this->messages['btnAddAdvertisementWithoutPhotoName'],
                'keyboard'  => json_encode([
                    'buttons' => [],
                    'one_time' => true
                ]),
            ];

            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
        }
        die();
    }
    public function type_list_add($request ){
        $params = [
            'user_id'   => $request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->messages['pleaseInputTypeWithoutPhoto'],
            'keyboard'  => json_encode([
                'buttons' => [],
                'one_time' => true
            ]),
        ];

        //если прислали фото в момент выбора типа
        if(!empty($request->object['attachments'][0]['type'])){
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }
        //если прислали текст в момент выбора типа
        if(!array_key_exists('payload',$request->object) && !empty($request->object['text'])){
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }

        $payload = '';
        if(array_key_exists('payload',$request->object)){
            $payload = json_decode($request->object['payload'], true);
        }
        //сохраняю и перехожу на след действие  - заполнение названия )
        // ставлю статус чтобы ушло сообщение  - введите название

        if(!empty($request->object['text']) && $payload['button'] == "exchangeProduct" ||
            $payload['button'] == "giveAway"  || $payload['button'] == "sellProduct"){
            $productCreate = Products::create(
                array(
                    'id_product' => 'products.id',
                    'user_id' => $this->user->id,
                    'type_product' => $request->object['text'],
                )
            );

            $productCreate->id_product = $productCreate->id;
            $productCreate->save();

            $this->user->user_action = "name_list_add";
            if($payload['button'] == "sellProduct"){
                $this->user->user_action = "setPriceForProduct";
            }
            $this->user->save();


            $params['message'] = $this->messages['btnAddAdvertisementWithoutPhotoName'];
            if($payload['button'] == "sellProduct"){
                $params['message'] = $this->messages['pleaseSentPriceForProduct'];
            }

            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }

    }
    //прислали название своего товара
    public function name_list_add( $request){


        //если прислали фото опять дауны
        if(!empty($request->object['attachments'][0]['type'])){
            $params = [
                'user_id'   => $request->object['from_id'],
                'random_id' => rand(0, 2 ** 31),
                'message'   => $this->messages['btnAddAdvertisementWithoutPhotoName'],
                'keyboard'  => json_encode([
                    'buttons' => [],
                    'one_time' => true
                ]),
            ];
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }


        //если пользователь прислал название своего товара
        if(!empty($request->object['text']) && !isset($request->object['attachments'][0]['type']) &&
            !empty($this->user['user_action']) &&
            $this->user['user_action'] == "name_list_add" && !isset($request->object['payload'])
        ){

            $userText = $request->object['text'];
            //удаляю мат
            ObsceneCensorRus::filterText($userText);


            //удаляю ссылки и почту
            $patterns = array('<[\w.]+@[\w.]+>', '<\w{3,6}:(?:(?://)|(?:\\\\))[^\s]+>');
            $matches = array('', '');
            $userText = preg_replace($patterns, $matches, $userText);

            //удаляю номера телефонов
            //удаляю ссылки и почту
            $patterns = '/1?\W*([2-9][0-8][0-9])\W*([2-9][0-9]{2})\W*([0-9]{4})(\se?x?t?(\d*))?/';
            $matches = '';
            $userText = preg_replace($patterns, $matches, $userText);


            if(strlen($userText) < 15){
                $params = [
                    'user_id'   => $request->object['from_id'],
                    'random_id' => rand(0, 2 ** 31),
                    'message'   => $this->messages['messageIsVerySmallName'],
                    'keyboard'  => json_encode([
                        'buttons' => [],
                        'one_time' => true
                    ]),
                ];

                $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                die();
            }

            if(strlen($userText) >= 90){
                $params = [
                    'user_id'   => $request->object['from_id'],
                    'random_id' => rand(0, 2 ** 31),
                    'message'   => $this->messages['messageIsVeryBigestName'],
                    'keyboard'  => json_encode([
                        'buttons' => [],
                        'one_time' => true
                    ]),
                ];

                $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                die();
            }

            //далее надо будет добавить удаление ников емали и номеров телефона
            // создаю товар


            $product = Products::latest()->where('user_id',$this->user->id)->first()->update([
                'name_product' => $userText,
            ]);


            $this->user->user_action = "advertisement_list_add";
            $this->user->save();

            $params = [
                'user_id'   => $request->object['from_id'],
                'random_id' => rand(0, 2 ** 31),
                'message'   => $this->messages['btnAddAdvertisementDesc'],
                'keyboard'  => json_encode([
                    'buttons' => [],
                    'one_time' => true
                ]),
            ];

            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);

            $this->user->user_action = "advertisement_list_add";
            $this->user->save();
            die();
        }
    }
    //прислали текст своего товара
    public function addDescProduct( $request){


        if(!empty($request->object['attachments'][0]['type'])){
            $params = [
                'user_id'   => $request->object['from_id'],
                'random_id' => rand(0, 2 ** 31),
                'message'   => $this->messages['btnAddDescWithoutPhoto'],
                'keyboard'  => json_encode([
                    'buttons' => [],
                    'one_time' => true
                ]),
            ];
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
            die();
        }


        //если пользователь прислал описание своего товара
        if(!empty($request->object['text']) && !isset($request->object['attachments'][0]['type']) &&
            !empty($this->user['user_action']) &&
            $this->user['user_action'] == "advertisement_list_add" && !isset($request->object['payload'])
        ){

            $userText = $request->object['text'];
            //удаляю мат
            ObsceneCensorRus::filterText($userText);


            //удаляю ссылки и почту
            $patterns = array('<[\w.]+@[\w.]+>', '<\w{3,6}:(?:(?://)|(?:\\\\))[^\s]+>');
            $matches = array('', '');
            $userText = preg_replace($patterns, $matches, $userText);

            //удаляю номера телефонов
            //удаляю ссылки и почту
            $patterns = '/1?\W*([2-9][0-8][0-9])\W*([2-9][0-9]{2})\W*([0-9]{4})(\se?x?t?(\d*))?/';
            $matches = '';
            $userText = preg_replace($patterns, $matches, $userText);


            if(strlen($userText) < 25){
                $params = [
                    'user_id'   => $request->object['from_id'],
                    'random_id' => rand(0, 2 ** 31),
                    'message'   => $this->messages['messageIsVerySmall'],
                    'keyboard'  => json_encode([
                        'buttons' => [],
                        'one_time' => true
                    ]),
                ];

                $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                die();
            }

            if(strlen($userText) >= 3500){
                $params = [
                    'user_id'   => $request->object['from_id'],
                    'random_id' => rand(0, 2 ** 31),
                    'message'   => $this->messages['messageIsVeryBigest'],
                    'keyboard'  => json_encode([
                        'buttons' => [],
                        'one_time' => true
                    ]),
                ];

                $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
                die();
            }

            //далее надо будет добавить удаление ников емали и номеров телефона
            // создаю товар


            $product = Products::latest()->where('user_id',$this->user->id)->first()->update([
                'description' => $userText,
            ]);
            $this->user->user_action = "btnAddAdvertisementPhoto";
            $this->user->save();


            $params = [
                'user_id'   => $request->object['from_id'],
                'random_id' => rand(0, 2 ** 31),
                'message'   => $this->messages['btnAddAdvertisementPhoto'],
                'keyboard'  => json_encode([
                    'buttons' => [],
                    'one_time' => true
                ]),
            ];

            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);

            $this->user->user_action = "btnAddAdvertisementPhoto";
            $this->user->save();
            die();
            return false;
        }
    }

    //функция получения разделов
    public function getSections(){
        $listSections = [];
        foreach (Categories::all() as $itemCategory){
//            if($this->user->age < 18 && $itemCategory->titleEng == "products_for_older"){
//            Проверка на возраст 18 лет
//                continue;
//            }
            $listSections[$itemCategory->titleEng]['id'] = $itemCategory->id;
            $listSections[$itemCategory->titleEng]['title'] = $itemCategory->title;
            $listSections[$itemCategory->titleEng]['description'] = $itemCategory->section_description;
        }
        return $listSections;
    }

    /**
     * @return mixed
     */
    public function getSectionsWithoutReg()
    {
        $listSections = [];
        foreach (Categories::all() as $itemCategory){
//            if($this->user->age < 18 && $itemCategory->titleEng == "products_for_older"){
//            Проверка на возраст 18 лет
//                continue;
//            }
            $listSections[$itemCategory->titleEng]['id'] = $itemCategory->id;
            $listSections[$itemCategory->titleEng]['title'] = $itemCategory->title;
            $listSections[$itemCategory->titleEng]['description'] = $itemCategory->section_description;
        }
        return $listSections;
    }

    //проверяю статус  - выбран ли раздел для поискау  юзера или нет
    public function checkUserSearchSection( $request , $edit = false){
        $listSections = '';
        $params = [
            'user_id'   => $request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => '',
            'keyboard'  => json_encode([
                'buttons' => [],
                'one_time' => true
            ]),
        ];
        if(empty($this->user->section_seach)){
            $listSections = $this->getSections();
            $params['message'] = $this->messages['emptySectionUser'];
        }else{
            $listSections = $this->getSections();
            $params['message'] = $this->messages['niceSearch'];
            if($edit == true){
                $listSections = $this->getSections();
                $params['message'] = $this->messages['editSectionUser'];
            }
        }
        $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);
        return $listSections;
    }
    //показ обьявлений
    public function showListProducts($page  = 0){

        $radius = $this->radiusPlanet; //Радиус земли
        $distance = $this->radiusDefault; //Интересующее нас расстояние
        if(!empty($this->user->current_radius)){
            $distance = $this->user->current_radius;
        }
        $sectionSearch = $this->user->section_seach;

        function computeDelta($degrees , $radius) {
            return M_PI / 180 * $radius * cos(deg2rad($degrees));
        }

        $latitude = $this->user->citi_coordinates_y; //Интересующие нас координаты широты
        $longitude = $this->user->citi_coordinates_x; //Интересующие нас координаты долготы

        $deltaLat = computeDelta($latitude , $radius); //Получаем дельту по широте
        $deltaLon = computeDelta($longitude , $radius ); // Дельту по долготе

        $aroundLat = $distance / $deltaLat; // Вычисляем диапазон координат по широте
        $aroundLon = $distance / $deltaLon; // Вычисляем диапазон координат по долготе
//        dd($aroundLat , $aroundLon);
//        ->products()
        //теперь нужно достать пользователей в указаном радиусе и подцепить их связанные товары
        $result = User::where('vk_from_id', '!=' , $this->user->vk_from_id)

        ->whereBetween('citi_coordinates_y' , [
            $latitude - $aroundLat , $latitude + $aroundLat
        ])->whereBetween('citi_coordinates_x' , [
            $longitude - $aroundLon , $longitude + $aroundLon
        ])
            ->join('products', 'users.id', '=', 'products.user_id')
            ->where('products.category_id', $sectionSearch)
            ->join('catalog_category_main', 'catalog_category_main.id', '=', 'products.category_id')
            ->orderBy('products.id', 'desc')
        ->limit(1)->offset($page)->first();



        if(!empty($result['access_key'])){

            $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                ['message_ids' => array($result['access_key'])] );
            $result['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
        }

        return $result;
    }



    //показ обьявлений
    public function search_sectionWithoutReg($page  = 0 , $section){

        $radius = $this->radiusPlanet; //Радиус земли
        $distance = $this->radiusPlanet; //Интересующее нас расстояние


        $latitude = '55.755819'; //Интересующие нас координаты широты
        $longitude = '37.617644'; //Интересующие нас координаты долготы

        function computeDelta($degrees , $radius) {
            return M_PI / 180 * $radius * cos(deg2rad($degrees));
        }

        $deltaLat = computeDelta($latitude , $radius); //Получаем дельту по широте
        $deltaLon = computeDelta($longitude , $radius ); // Дельту по долготе

        $aroundLat = $distance / $deltaLat; // Вычисляем диапазон координат по широте
        $aroundLon = $distance / $deltaLon; // Вычисляем диапазон координат по долготе

//        dd($aroundLat , $aroundLon);
//        ->products()
        //теперь нужно достать пользователей в указаном радиусе и подцепить их связанные товары
        $section = (int) $section;

        $result = User::where('vk_from_id', '!=' , 1)

            ->whereBetween('citi_coordinates_y' , [
                $latitude - $aroundLat , $latitude + $aroundLat
            ])->whereBetween('citi_coordinates_x' , [
                $longitude - $aroundLon , $longitude + $aroundLon
            ])
            ->join('products', 'users.id', '=', 'products.user_id')
            ->where('products.category_id', (int) $section)
            ->join('catalog_category_main', 'catalog_category_main.id', '=', 'products.category_id')
            ->orderBy('products.id', 'desc')
            ->limit(1)->offset($page)->first();



        if(!empty($result['access_key'])){

            $vkMessage = VkApi::messages()->getById(env('VK_SECRET_INIT_KEY') ,
                ['message_ids' => array($result['access_key'])] );
            $result['access_key'] = $vkMessage['items'][0]['attachments'][0]['photo']['access_key'];
        }

        return $result;
    }
    private function sendOK()
    {
        echo 'ok';
        $response_length = ob_get_length();


        ignore_user_abort(true);
        ob_start();
        ob_end_flush();
        flush();
    }
}
