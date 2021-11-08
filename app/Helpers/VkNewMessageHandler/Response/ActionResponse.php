<?php
namespace App\Helpers\VkNewMessageHandler\Response;

use App\Helpers\VkNewMessageHandler\BotKeyboard\Button;
use App\Helpers\VkNewMessageHandler\BotKeyboard\ButtonRowFactory;
use App\Helpers\VkNewMessageHandler\BotKeyboard\KeyboardFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Helpers\VK\Client\VKApiClient;
use App\Helpers\VkNewMessageHandler\BotCarousel\Carousel;
use App\Helpers\VkNewMessageHandler\BotCarousel\Carousel\Elements\Photo;
use App\Helpers\VkNewMessageHandler\BotCarousel\Keyboard\Buttons\Text;


class ActionResponse
{

    private $vkApiClient;
    private $request;
    private $accessToken;
    private $botStandartMessages;

    public function __construct(
        Request $request,
        VKApiClient $vkApiClient,
        String $accessToken
    ) {
        $this->botStandartMessages    = config('bot_messages');
        $this->botStandartAttachments = config('bot_vk_media_attachments');
        $this->botButtonLabels        = config('bot_button_names');
        $this->request                = $request;
        $this->vkApiClient            = $vkApiClient;
        $this->accessToken            = $accessToken;
    }
    public function removedUser(){
        $start       = Button::create(['command' => 'start'], $this->botButtonLabels['startbtn'], 'positive');

        $btnRow1 = ButtonRowFactory::createRow()->addButton($start)->getRow();

        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->getKeyboardJson();
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['removedUser'],
            'keyboard'  => $kb,
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function getMapUserCoordinates($updateMap = false){


        $btnMap = Button::createBtnMap($updateMap ? ['button' => 'updateMap'] : ['button' => 'map'], $this->botButtonLabels['map'], 'secondary' , 'location');

//        show_products_witchoutReg
        $advertisement_list       = Button::create(['button' => 'show_products_without_reg'], $this->botButtonLabels['show_products_without_reg'], 'primary');

        $btnRow1 = ButtonRowFactory::createRow()
            ->addButton($btnMap)
            ->getRow();
//        $btnRow2 = ButtonRowFactory::createRow()
//            ->addButton($advertisement_list)
//            ->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
//            ->addRow($btnRow2)
            ->setOneTime(false)
            ->getKeyboardJson();


        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $updateMap ? $this->botStandartMessages['updateMap'] : $this->botStandartMessages['map_message'],
            'keyboard'  => $kb,
            'attachment' => "photo-202507962_457240875",
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }

    public function RegisterSuccessAndStart($StatusRegUpdate = false)
    {



        $advertisement_list       = Button::create(['button' => 'show_products'], $this->botButtonLabels['show_products'], 'primary');
        $advertisement_list_add     = Button::create(['button' => 'typeListAddbtn'], $this->botButtonLabels['advertisement_list_add'], 'positive');
        $edit_map = Button::create(['button' => 'edit_map'], $this->botButtonLabels['edit_map'], 'negative');



        $btnRow1 = ButtonRowFactory::createRow()->addButton($advertisement_list_add)->addButton($advertisement_list)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($edit_map)->getRow();



        $kb = KeyboardFactory::createKeyboard()
                             ->addRow($btnRow1)
                             ->addRow($btnRow2)

                             ->setOneTime(false)
                             ->getKeyboardJson();


        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $StatusRegUpdate ? $this->botStandartMessages[$StatusRegUpdate] : $this->botStandartMessages['start_message'],
            'keyboard'  => $kb,
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
//    public function typeListAddbtn(){
//        //отправляю сообщение - прошу пользователя скинуть фотографию товара и скрываю кнопки
//        $params = [
//            'user_id'   => $this->request->object['from_id'],
//            'random_id' => rand(0, 2 ** 31),
//            'message'   => $this->botStandartMessages['btnAddAdvertisement'],
//            'keyboard'  => json_encode([
//                'buttons' => [],
//                'one_time' => true
//            ]),
//        ];
//        $this->vkApiClient->messages()->send($this->accessToken, $params);
//    }
    public function nameListAdd(){
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['btnAddAdvertisementWithoutPhotoName'],
            'keyboard'  => json_encode([
                'buttons' => [],
                'one_time' => true
            ]),
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    //кнопка добавить обьявления
    public function AdvertisementListAdd(){
        //отправляю сообщение - прошу пользователя скинуть фотографию товара и скрываю кнопки
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['btnAddAdvertisement'],
            'keyboard'  => json_encode([
                'buttons' => [],
                'one_time' => true
            ]),
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    //отправляю кнопки для выбора типа обявления
    public function typeListAddbtn(){
        $exchangeProduct       = Button::create(['button' => 'exchangeProduct'], $this->botButtonLabels['exchangeProduct'], 'positive');
        $giveAway       = Button::create(['button' => 'giveAway'], $this->botButtonLabels['giveAway'], 'primary');
        $sellProduct       = Button::create(['button' => 'sellProduct'], $this->botButtonLabels['sellProduct'], 'primary');

//        $this->botButtonLabels['advertisement_list_add']

        $btnRow1 = ButtonRowFactory::createRow()->addButton($exchangeProduct)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($giveAway)->getRow();
        $btnRow3 = ButtonRowFactory::createRow()->addButton($sellProduct)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->addRow($btnRow2)
            ->addRow($btnRow3)
            ->setOneTime(false)
            ->getKeyboardJson();
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['pleaseInputTypeProduct'],
            'keyboard'  => $kb,
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function userEmptyProduct(){
        $advertisement_list_add       = Button::create(['button' => 'typeListAddbtn'], $this->botButtonLabels['advertisement_list_add'], 'positive');

        $btnRow1 = ButtonRowFactory::createRow()->addButton($advertisement_list_add)->getRow();

        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->setInline(true)
            ->getKeyboardJson();
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['userEmptyProduct'],
            'keyboard'  => $kb,
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }

    public function userEmptyWalletForBuy($data){

        $linkPay = env("LINK_PAY_FOR_VK_API_BOT");
        $linkPay .= "?id=".$data["currentUser"];

//        $addMoney       = Button::create( ['button' => 'addMoney'], $this->botButtonLabels['addMoney'], 'primary');
        $option1       = Button::createOpenLink("open_link",$linkPay."&amount=min" , ['button' => 'addMoney9'], "9 руб", "primary" );
        $option2       = Button::createOpenLink("open_link" , $linkPay."&amount=start" ,['button' => 'addMoney18'] ,  "18 руб", "primary");
        $option3       = Button::createOpenLink("open_link" , $linkPay."&amount=medium" , ['button' => 'addMoney32'],  "32 руб", "primary");
        $option4       = Button::createOpenLink("open_link" ,$linkPay."&amount=pro" , ['button' => 'addMoney81'],  "81 руб", "primary");
//        $addMoney       = Button::createOpenLink("open_link" , $linkPay , ['button' => 'addMoney'], $this->botButtonLabels['addMoney'], 'primary');

//        $payfortest    = Button::createOpenLink("open_link" ,"http://vkapichange.ru/payfortest?id=".$data["currentUser"]."&amount=pro" , ['button' => 'addMoney9free'],  "9 free", "negative");
//        $fortestbtn = ButtonRowFactory::createRow()->addButton($payfortest)->getRow();

//        $btnRow1 = ButtonRowFactory::createRow()->addButton($addMoney)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($option1)->addButton($option2)->getRow();
        $btnRow3 = ButtonRowFactory::createRow()->addButton($option3)->addButton($option4)->getRow();

        if(empty($data["currentWallet"])){
            $data["currentWallet"] = 0;
        }
        $message = "\nВаш текущий счет - ".$data["currentWallet"]." руб";
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow2)->addRow($btnRow3)
            ->setOneTime(false)
            ->setInline(true)
            ->getKeyboardJson();
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['userEmptyWalletBuy'].$message,
            'keyboard'  => $kb,
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);

        if(!empty($data['userIdWithEmptyWallet'])){
            $params = [
                'user_id'   => $data['userEmptyWalletBuy'],
                'random_id' => rand(0, 2 ** 31),
                'message'   => $this->botStandartMessages['succesAplyButNoMonney'],
            ];

            $this->vkApiClient->messages()->send($this->accessToken, $params);
        }
    }
    public function userEmptyWallet($data){

        $linkPay = env("LINK_PAY_FOR_VK_API_BOT");
        $linkPay .= "?id=".$data["currentUser"];

//        $addMoney       = Button::create( ['button' => 'addMoney'], $this->botButtonLabels['addMoney'], 'primary');
        $option1       = Button::createOpenLink("open_link",$linkPay."&amount=min" , ['button' => 'addMoney9'], "9 руб", "primary" );
        $option2       = Button::createOpenLink("open_link" , $linkPay."&amount=start" ,['button' => 'addMoney18'] ,  "18 руб", "primary");
        $option3       = Button::createOpenLink("open_link" , $linkPay."&amount=medium" , ['button' => 'addMoney32'],  "32 руб", "primary");
        $option4       = Button::createOpenLink("open_link" ,$linkPay."&amount=pro" , ['button' => 'addMoney81'],  "81 руб", "primary");
//        $addMoney       = Button::createOpenLink("open_link" , $linkPay , ['button' => 'addMoney'], $this->botButtonLabels['addMoney'], 'primary');

//        $payfortest    = Button::createOpenLink("open_link" ,"http://vkapichange.ru/payfortest?id=".$data["currentUser"]."&amount=pro" , ['button' => 'addMoney9free'],  "9 free", "negative");
//        $fortestbtn = ButtonRowFactory::createRow()->addButton($payfortest)->getRow();

//        $btnRow1 = ButtonRowFactory::createRow()->addButton($addMoney)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($option1)->addButton($option2)->getRow();
        $btnRow3 = ButtonRowFactory::createRow()->addButton($option3)->addButton($option4)->getRow();

        if(empty($data["currentWallet"])){
            $data["currentWallet"] = 0;
        }
        $message = "\nВаш текущий счет - ".$data["currentWallet"]." руб";
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow2)->addRow($btnRow3)
            ->setOneTime(false)
            ->setInline(true)
            ->getKeyboardJson();
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['userEmptyWallet'].$message,
            'keyboard'  => $kb,
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);

        if(!empty($data['userIdWithEmptyWallet'])){
            $params = [
                'user_id'   => $data['userIdWithEmptyWallet'],
                'random_id' => rand(0, 2 ** 31),
                'message'   => $this->botStandartMessages['succesAplyButNoMonney'],
            ];

            $this->vkApiClient->messages()->send($this->accessToken, $params);
        }
    }
    public function nextPageEmpty(){
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['nextPageEmpty'],
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);

    }
    public function myProductEmpty(){
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['myProductEmpty'],
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);

    }
    public function removedProduct(){
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['removedProduct'],
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);

    }
    public function alreadyRemoved(){
        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['alreadyRemoved'],
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);

    }
    public function myWallet($data){
        $message = $this->botStandartMessages['yourWallet'].$data['wallet']." руб";
        $kb = '';

        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $message,
        ];


           $params['message'] .= "\n";
           $params['message'] .= $this->botStandartMessages['hasHeightWallet'];
           $linkPay = env("LINK_PAY_FOR_VK_API_BOT");
           $linkPay .= "?id=".$data["currentUser"];

//           $addMoney       = Button::create( ['button' => 'addMoney'], $this->botButtonLabels['addMoney'], 'primary');
           $option1       = Button::createOpenLink("open_link",$linkPay."&amount=min" , ['button' => 'addMoney9'], "9 руб", "primary" );
           $option2       = Button::createOpenLink("open_link" , $linkPay."&amount=start" ,['button' => 'addMoney18'] ,  "18 руб", "primary");
           $option3       = Button::createOpenLink("open_link" , $linkPay."&amount=medium" , ['button' => 'addMoney32'],  "32 руб", "primary");
           $option4       = Button::createOpenLink("open_link" ,$linkPay."&amount=pro" , ['button' => 'addMoney81'],  "81 руб", "primary");
//           $addMoney       = Button::createOpenLink("open_link" , $linkPay , ['button' => 'addMoney'], $this->botButtonLabels['addMoney'], 'primary');


//           $payfortest    = Button::createOpenLink("open_link" ,"http://vkapichange.ru/payfortest?id=".$data["currentUser"]."&amount=pro" , ['button' => 'addMoney9free'],  "9 free", "negative");
//           $fortestbtn = ButtonRowFactory::createRow()->addButton($payfortest)->getRow();


//           $btnRow1 = ButtonRowFactory::createRow()->addButton($addMoney)->getRow();
           $btnRow2 = ButtonRowFactory::createRow()->addButton($option1)->addButton($option2)->getRow();
           $btnRow3 = ButtonRowFactory::createRow()->addButton($option3)->addButton($option4)->getRow();



           $kb = KeyboardFactory::createKeyboard()
               ->addRow($btnRow2)->addRow($btnRow3)
               ->setOneTime(false)
               ->setInline(true)
               ->getKeyboardJson();
           $params['keyboard'] = $kb;







        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function userInputNotNum(){
        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $this->botStandartMessages['userInputNotNum']
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function successUpdateRadius(){


        $myProducts     = Button::create(['button' => 'myProducts'], $this->botButtonLabels['myProducts'], 'secondary');
        $addProducts     = Button::create(['button' => 'typeListAddbtn'], $this->botButtonLabels['addProducts'], 'secondary');
        $edit_map     = Button::create(['button' => 'edit_map'], $this->botButtonLabels['edit_map'], 'secondary');
        $dellAccount     = Button::create(['button' => 'dellAccount'], $this->botButtonLabels['dellAccount'], 'secondary');
        $goSearch     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'positive');
        $myWallet     = Button::create(['button' => 'myWallet'], $this->botButtonLabels['myWallet'], 'secondary');
        $changeRadius     = Button::create(['button' => 'changeRadius'], $this->botButtonLabels['changeRadius'], 'secondary');
//        $contacts     = Button::create(['button' => 'contacts_info'], $this->botButtonLabels['contacts_info'], 'negative');

        $btnRow1 = ButtonRowFactory::createRow()->addButton($myProducts)->addButton($addProducts)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($edit_map)->addButton($dellAccount)->getRow();
//        $btnRow3 = ButtonRowFactory::createRow()->addButton($contacts)->getRow();
        $btnRow4 = ButtonRowFactory::createRow()->addButton($goSearch)->getRow();

        $btnRow5 = ButtonRowFactory::createRow()->addButton($myWallet)->addButton($changeRadius)->getRow();
//        $btnRow6 = ButtonRowFactory::createRow()->addButton($changeRadius)->getRow();

        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)->addRow($btnRow2)
//            ->addRow($btnRow3)
            ->addRow($btnRow4)
            ->addRow($btnRow5)

            ->setOneTime(false)
            ->getKeyboardJson();


        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $this->botStandartMessages['successUpdateRadius'],
            'keyboard'  => $kb,
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function contactsInfo(){
        $message = $this->botStandartMessages['userSogl'];
        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $message
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function waitRadius(){
        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $this->botStandartMessages['pleaseSendNewRadius'] ,
            'keyboard'  => json_encode([
                'buttons' => [],
                'one_time' => true
            ]),
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function changeRadiusButton($data){
        $message = $this->botStandartMessages['aboutRadius'].$data['currentRadius']."км\n".$this->botStandartMessages['aboutRadiusChangeAlready'];
//        dd($message);
        $waitRadius     = Button::create(['button' => 'waitRadiusBtn'], $this->botButtonLabels['waitRadius'], 'negative');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($waitRadius)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->setInline(true)
            ->getKeyboardJson();
        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $message ,
            'keyboard'  => $kb,
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function defaultPage(){
        $myProducts     = Button::create(['button' => 'myProducts'], $this->botButtonLabels['myProducts'], 'secondary');
        $addProducts     = Button::create(['button' => 'typeListAddbtn'], $this->botButtonLabels['addProducts'], 'secondary');
        $edit_map     = Button::create(['button' => 'edit_map'], $this->botButtonLabels['edit_map'], 'secondary');
        $dellAccount     = Button::create(['button' => 'dellAccount'], $this->botButtonLabels['dellAccount'], 'secondary');
        $goSearch     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'positive');
        $myWallet     = Button::create(['button' => 'myWallet'], $this->botButtonLabels['myWallet'], 'secondary');
        $changeRadius     = Button::create(['button' => 'changeRadius'], $this->botButtonLabels['changeRadius'], 'secondary');
//        $contacts     = Button::create(['button' => 'contacts_info'], $this->botButtonLabels['contacts_info'], 'negative');

        $btnRow1 = ButtonRowFactory::createRow()->addButton($myProducts)->addButton($addProducts)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($edit_map)->addButton($dellAccount)->getRow();
//        $btnRow3 = ButtonRowFactory::createRow()->addButton($contacts)->getRow();
        $btnRow4 = ButtonRowFactory::createRow()->addButton($goSearch)->getRow();

        $btnRow5 = ButtonRowFactory::createRow()->addButton($myWallet)->addButton($changeRadius)->getRow();
//        $btnRow6 = ButtonRowFactory::createRow()->addButton($changeRadius)->getRow();

        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)->addRow($btnRow2)
//            ->addRow($btnRow3)
            ->addRow($btnRow4)
            ->addRow($btnRow5)

            ->setOneTime(false)
            ->getKeyboardJson();

        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $this->botStandartMessages['defaultPage'] ,
            'keyboard'  => $kb,

        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);

    }
    public function notAgreeWithProductTrueForUserBuy($data){

        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($show_products)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->getKeyboardJson();
        $params = [
            'user_id'    => $data['currentUser'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $this->botStandartMessages['notAgreeWithProductTrue'] ,
//            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);


        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($show_products)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->getKeyboardJson();
        $params = [
            'user_id'    => $data['userIdWithEmptyWallet'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $this->botStandartMessages['notAgreeWithProductTrueToUserBuy'] ,
//            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function notAgreeWithProductTrueForUser($data){

        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($show_products)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->getKeyboardJson();
        $params = [
            'user_id'    => $data['currentUser'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $this->botStandartMessages['notAgreeWithProductTrue'] ,
//            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);


        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($show_products)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->getKeyboardJson();
        $params = [
            'user_id'    => $data['userIdWithEmptyWallet'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $this->botStandartMessages['notAgreeWithProductTrueToUser'] ,
//            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function successDealBuy($data){

        //также отправляю кнопку поиска
        $message = "Пользователь согласился на продажу своего товара.Оплата прошла успешна!\n";
        $message .= "Пожалуйста остерегайтесь мошенников! Ссылка на аккаунт пользователя - https://vk.com/id".$data['currentUser'];

        $message .= "\n\nОбъявление пользователя - \n\n";

        $message .= "Автор объявления : ".$data['product']['name']." ".$data['product']['surname']."\n";
        $message .= "Город автора : ".$data['product']['city']."\n";
        if(empty($data['product']['wallet'])){
            $data['product']['wallet'] = 0;
        }
        $message .= "Текущий счет автора : ".$data['product']['wallet']." руб\n";
        $message .= "Раздел объявления : ".$data['product']['section_description']."\n";
        $message .= "\nОписание объявления : ".$data['product']['description'];

        if(!empty($data['product']['type_product'])){
            $message .= "Тип объявления : ".$data['product']['type_product']."\n\n";
        }
        if(!empty($data['product']['name_product'])){
            $message .= "Название объявления : ".$data['product']['name_product']."\n\n";
        }

        if(!empty($data['product']['price'])){
            $message .= "\n\nЦена объявления : ".$data['product']['price']." руб"."\n";
        }


        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($show_products)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->getKeyboardJson();

        $params = [
            'user_id'    => $data['userIdWithEmptyWallet'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $message,
            'attachment' => "photo".$data['product']['photo_id']."_".$data['product']['access_key'],
//            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);



        //также отправляю кнопку поиска
        $message = "Оплата прошла успешна!\n";
        $message .= "Ссылка на аккаунт пользователя - https://vk.com/id".$data['userIdWithEmptyWallet'];
        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($show_products)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->getKeyboardJson();

        $params = [
            'user_id'    => $data['currentUser'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $message,
//            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
        return false;
    }
    public function successDeal($data){


        //также отправляю кнопку поиска
        $message = "Пользователь согласился на обмен.Оплата прошла успешна!\n";
        $message .= "Пожалуйста остерегайтесь мошенников! Ссылка на аккаунт пользователя - https://vk.com/id".$data['currentUser'];

        $message .= "\n\nОбъявление пользователя - \n\n";

        $message .= "Автор объявления : ".$data['product']['name']." ".$data['product']['surname']."\n";
        $message .= "Город автора : ".$data['product']['city']."\n";
        if(empty($data['product']['wallet'])){
            $data['product']['wallet'] = 0;
        }
        $message .= "Текущий счет автора : ".$data['product']['wallet']." руб\n";
        $message .= "Раздел объявления : ".$data['product']['section_description']."\n";

        if(!empty($data['product']['type_product'])){
            $message .= "Тип объявления : ".$data['product']['type_product']."\n\n";
        }
        if(!empty($data['product']['name_product'])){
            $message .= "Название объявления : ".$data['product']['name_product']."\n\n";
        }


        $message .= "\nОписание объявления : ".$data['product']['description'];


        if(!empty($data['product']['price'])){
            $message .= "\n\nЦена объявления : ".$data['product']['price']." руб"."\n";
        }


        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($show_products)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->getKeyboardJson();

        $params = [
            'user_id'    => $data['userIdWithEmptyWallet'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $message,
            'attachment' => "photo".$data['product']['photo_id']."_".$data['product']['access_key'],
//            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);



        //также отправляю кнопку поиска
        $message = "Оплата прошла успешна!\n";
        $message .= "Ссылка на аккаунт пользователя - https://vk.com/id".$data['userIdWithEmptyWallet'];
        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($show_products)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->getKeyboardJson();

        $params = [
            'user_id'    => $data['currentUser'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $message,
//            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
        return false;
    }
    public function secondUserEmptyWalletBuy($data){

        //если у второго пользователя нету средств ) отправляю в обе стороны уведомление
        //первому кидаю дополнительно кнопку - смотреть обьявления - предлагаю смотреть дальше или
        //повторить действие позже
        // второму кидаю уведомаление о согласии но отсуствии средств
        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');
        $notAgreeWithProduct     = Button::create(['button' => '#notAgreeWithProductBuy#('
            . $data['userIdWithEmptyWallet'] . ')_!'.$data['currentUser'].'!'.'_*'.$data['product']['id'].'*page^'."buy".'^'],
            $this->botButtonLabels['notAgreeWithProduct'], 'negative');

        $agreeWithProduct     = Button::create(['button' => '#agreeWithProductBuy#('
            . $data['userIdWithEmptyWallet'] . ')_!'.$data['currentUser'].'!'.'_*'.$data['product']['id'].'*page^'."buy".'^'],
            $this->botButtonLabels['agreeWithProduct'], 'positive');

////на отказ кидаю внутрь айдишник предложившего - чтобы выслать ему сообщение что ему отказали - откзавшего чтобы сказать что отправлено
//        $notAgreeWithProduct     = Button::create(['button' => '#notAgreeWithProductBuy#('
//            . $data['userCurrent'] . ')_!'.$data['useridToSend'].'!'.'_*'.$data['productInput']['id'].'*page^'."buy".'^'],
//            $this->botButtonLabels['notAgreeWithProduct'], 'negative');
//        //если согласился  - кидаю айди предложившего и согласившегося
//        $agreeWithProduct     = Button::create(['button' => '#agreeWithProductBuy#('
//            . $data['userCurrent'] . ')_!'.$data['useridToSend'].'!'.'_*'.$data['productInput']['id'].'*page^'."buy".'^'],
//            $this->botButtonLabels['agreeWithProduct'], 'positive');

        $btnRow2 = ButtonRowFactory::createRow()->addButton($notAgreeWithProduct)->getRow();
        $btnRow3 = ButtonRowFactory::createRow()->addButton($agreeWithProduct)->getRow();

        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow2)
            ->addRow($btnRow3)
            ->setOneTime(false)
            ->setInline(true)
            ->getKeyboardJson();

        $params = [
            'user_id'    => $data['currentUser'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $this->botStandartMessages['secondUserEmptyWallet'] ,
            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);

        $message = "Пользователь был готов к продаже но в этот момент у вас не было средств .Вот его товар , на который вы кидали запрос на обмен\n";
        $message .= "Автор объявления : ".$data['product']['name']." ".$data['product']['surname']."\n";
        $message .= "Город автора : ".$data['product']['city']."\n";
        if(empty($data['product']['wallet'])){
            $data['product']['wallet'] = 0;
        }
        $message .= "Текущий счет автора : ".$data['product']['wallet']." руб\n";
        $message .= "Раздел объявления : ".$data['product']['section_description']."\n";

        if(!empty($data['product']['type_product'])){
            $message .= "Тип объявления : ".$data['product']['type_product']."\n\n";
        }
        if(!empty($data['product']['name_product'])){
            $message .= "Название объявления : ".$data['product']['name_product']."\n\n";
        }


        $message .= "\nОписание объявления : ".$data['product']['description'];


        if(!empty($data['product']['price'])){
            $message .= "\n\nЦена объявления : ".$data['product']['price']." руб"."\n";
        }

        $params = [

            'user_id'    => $data['userIdWithEmptyWallet'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $message ,
            'attachment' => "photo".$data['product']['photo_id']."_".$data['product']['access_key'],
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function secondUserEmptyWallet($data){

        //если у второго пользователя нету средств ) отправляю в обе стороны уведомление
        //первому кидаю дополнительно кнопку - смотреть обьявления - предлагаю смотреть дальше или
        //повторить действие позже
        // второму кидаю уведомаление о согласии но отсуствии средств
        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');
        $notAgreeWithProduct     = Button::create(['button' => '#notAgreeWithProduct#('
            . $data['userIdWithEmptyWallet'] . ')_!'.$data['currentUser'].'!'],
            $this->botButtonLabels['notAgreeWithProduct'], 'negative');

        $agreeWithProduct     = Button::create(['button' => '#agreeWithProduct#('
            . $data['userIdWithEmptyWallet'] . ')_!'.$data['currentUser'].'!'.'_*'.$data['product']['id'].'*'],
            $this->botButtonLabels['agreeWithProduct'], 'positive');



        $btnRow2 = ButtonRowFactory::createRow()->addButton($notAgreeWithProduct)->getRow();
        $btnRow3 = ButtonRowFactory::createRow()->addButton($agreeWithProduct)->getRow();

        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow2)
            ->addRow($btnRow3)
            ->setOneTime(false)
            ->setInline(true)
            ->getKeyboardJson();

        $params = [
            'user_id'    => $data['currentUser'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $this->botStandartMessages['secondUserEmptyWallet'] ,
            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);


        $message = "Пользователь был готов к обмену но в этот момент у вас не было средств .Вот его товар , на который вы кидали запрос на обмен\n";
        $message .= "Автор объявления : ".$data['product']['name']." ".$data['product']['surname']."\n";
        $message .= "Город автора : ".$data['product']['city']."\n";
        if(empty($data['product']['wallet'])){
            $data['product']['wallet'] = 0;
        }
        $message .= "Текущий счет автора : ".$data['product']['wallet']." руб\n";
        $message .= "Раздел объявления : ".$data['product']['section_description']."\n";


        if(!empty($data['product']['type_product'])){
            $message .= "Тип объявления : ".$data['product']['type_product']."\n\n";
        }
        if(!empty($data['product']['name_product'])){
            $message .= "Название объявления : ".$data['product']['name_product']."\n\n";
        }


        $message .= "\nОписание объявления : ".$data['product']['description'];


        if(!empty($data['product']['price'])){
            $message .= "\n\nЦена объявления : ".$data['product']['price']." руб"."\n";
        }

        $params = [

            'user_id'    => $data['userIdWithEmptyWallet'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $message ,
            'attachment' => "photo".$data['product']['photo_id']."_".$data['product']['access_key'],
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function delAccountInApply(){

        $goSearch     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'primary');
        $defaultPage     = Button::create(['button' => 'defaultPage'], $this->botButtonLabels['defaultPage'], 'negative');

        $btnRow1 = ButtonRowFactory::createRow()->addButton($goSearch)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($defaultPage)->getRow();


        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->addRow($btnRow2)
            ->setOneTime(false)
            ->getKeyboardJson();


        $params = [

            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>   $this->botStandartMessages['delAccountInInput'] ,
            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function messageToBuyProductUser($data){

        $message = "Пользователь прислал вам запрос на покупку!Взгляните на свое объявление которое он хочет купить\n";
        $message .= "Автор объявления : ".$data['productInput']['name']." ".$data['productInput']['surname']."\n";
        $message .= "Город автора : ".$data['productInput']['city']."\n";
        if(empty($data['productInput']['wallet'])){
            $data['productInput']['wallet'] = 0;
        }
        $message .= "Текущий счет автора : ".$data['productInput']['wallet']." руб\n";
        $message .= "Раздел объявления : ".$data['productInput']['section_description']."\n";



        if(!empty($data['productInput']['type_product'])){
            $message .= "Тип объявления : ".$data['productInput']['type_product']."\n\n";
        }
        if(!empty($data['productInput']['name_product'])){
            $message .= "Название объявления : ".$data['productInput']['name_product']."\n\n";
        }


        $message .= "\nОписание объявления : ".$data['productInput']['description'];


        if(!empty($data['productInput']['price'])){
            $message .= "\n\nЦена объявления : ".$data['productInput']['price']." руб"."\n";
        }


//на отказ кидаю внутрь айдишник предложившего - чтобы выслать ему сообщение что ему отказали - откзавшего чтобы сказать что отправлено
        $notAgreeWithProduct     = Button::create(['button' => '#notAgreeWithProductBuy#('
            . $data['userCurrent'] . ')_!'.$data['useridToSend'].'!'.'_*'.$data['productInput']['id'].'*page^'."buy".'^'],
            $this->botButtonLabels['notAgreeWithProduct'], 'negative');
        //если согласился  - кидаю айди предложившего и согласившегося
        $agreeWithProduct     = Button::create(['button' => '#agreeWithProductBuy#('
            . $data['userCurrent'] . ')_!'.$data['useridToSend'].'!'.'_*'.$data['productInput']['id'].'*page^'."buy".'^'],
            $this->botButtonLabels['agreeWithProduct'], 'positive');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($notAgreeWithProduct)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($agreeWithProduct)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)->addRow($btnRow2)
            ->setOneTime(false)
            ->setInline(true)
            ->getKeyboardJson();


        $params = [
            'user_id'    => $data['useridToSend'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $message ,
            'attachment' => "photo".$data['productInput']['photo_id']."_".$data['productInput']['access_key'],
            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);



        //текущему отправляю - что запрос отправлен
        $params = [
            'user_id'    => $data['userCurrent'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $this->botStandartMessages['requestSendedBuy'] ,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function messageToChangeUser($data){


        $message = "Пользователь прислал вам запрос на обмен!Взгляните на свое объявление с которым он хочет обменяться\n";
        $message .= "Автор объявления : ".$data['productInput']['name']." ".$data['productInput']['surname']."\n";
        $message .= "Город автора : ".$data['productInput']['city']."\n";
        if(empty($data['productInput']['wallet'])){
            $data['productInput']['wallet'] = 0;
        }
        $message .= "Текущий счет автора : ".$data['productInput']['wallet']." руб\n";
        $message .= "Раздел объявления : ".$data['productInput']['section_description']."\n";


        if(!empty($data['productInput']['type_product'])){
            $message .= "Тип объявления : ".$data['productInput']['type_product']."\n\n";
        }
        if(!empty($data['productInput']['name_product'])){
            $message .= "Название объявления : ".$data['productInput']['name_product']."\n\n";
        }


        $message .= "\nОписание объявления : ".$data['productInput']['description'];


        if(!empty($data['productInput']['price'])){
            $message .= "\n\nЦена объявления : ".$data['productInput']['price']." руб"."\n";
        }




        $params = [
            'user_id'    => $data['useridToSend'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $message ,
            'attachment' => "photo".$data['productInput']['photo_id']."_".$data['productInput']['access_key'],
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);


        $message = "\n\nТак-же предлагаем вам взглянуть на объявление которое он предлагает вам в обмен\n";
        $message .= "Ну что-же решайте сами , что нам с этим делать.У вас два варианта - согласиться или отказаться\n";
        $message .= "Автор объявления : ".$data['myProductInput']['name']." ".$data['myProductInput']['surname']."\n";
        $message .= "Город автора : ".$data['myProductInput']['city']."\n";

        if(empty($data['myProductInput']['wallet'])){
            $data['myProductInput']['wallet'] = 0;
        }
        $message .= "Текущий счет автора : ".$data['myProductInput']['wallet']." руб\n";
        $message .= "Раздел объявления : ".$data['myProductInput']['section_description']."\n";


        if(!empty($data['myProductInput']['type_product'])){
            $message .= "Тип объявления : ".$data['myProductInput']['type_product']."\n\n";
        }
        if(!empty($data['myProductInput']['name_product'])){
            $message .= "Название объявления : ".$data['myProductInput']['name_product']."\n\n";
        }


        $message .= "\nОписание объявления : ".$data['myProductInput']['description'];


        if(!empty($data['myProductInput']['price'])){
            $message .= "\n\nЦена объявления : ".$data['myProductInput']['price']." руб"."\n";
        }



        //на отказ кидаю внутрь айдишник предложившего - чтобы выслать ему сообщение что ему отказали - откзавшего чтобы сказать что отправлено
        $notAgreeWithProduct     = Button::create(['button' => '#notAgreeWithProduct#('
            . $data['userCurrent'] . ')_!'.$data['useridToSend'].'!'.'_*'.$data['productInput']['id'].'*page^'.$data['myProductInput']['id'].'^'],
            $this->botButtonLabels['notAgreeWithProduct'], 'negative');
        //если согласился  - кидаю айди предложившего и согласившегося
        $agreeWithProduct     = Button::create(['button' => '#agreeWithProduct#('
            . $data['userCurrent'] . ')_!'.$data['useridToSend'].'!'.'_*'.$data['productInput']['id'].'*page^'.$data['myProductInput']['id'].'^'],
            $this->botButtonLabels['agreeWithProduct'], 'positive');



        $btnRow1 = ButtonRowFactory::createRow()->addButton($notAgreeWithProduct)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($agreeWithProduct)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)->addRow($btnRow2)
            ->setOneTime(false)
            ->setInline(true)
            ->getKeyboardJson();

        $params = [
            'user_id'    => $data['useridToSend'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $message ,
            'attachment' => "photo".$data['myProductInput']['photo_id']."_".$data['myProductInput']['access_key'],
            'keyboard'  => $kb,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);


        //текущему отправляю - что запрос отправлен
        $params = [
            'user_id'    => $data['userCurrent'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $this->botStandartMessages['requestSended'] ,
        ];
        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function startSearchEmptyRes(){
        $changeSection     = Button::create(['button' => 'changeSection'], $this->botButtonLabels['changeSection'], 'primary');
        $defaultPage     = Button::create(['button' => 'defaultPage'], $this->botButtonLabels['defaultPage'], 'secondary');

        $btnRow1 = ButtonRowFactory::createRow()->addButton($changeSection)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($defaultPage)->getRow();


        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->addRow($btnRow2)
            ->setOneTime(false)
            ->getKeyboardJson();

        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    =>  $this->botStandartMessages['nextPageEmpty'] ,
            'keyboard'  => $kb,

        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function myProductsToChange($data  , $page = false , $userInput = false , $productInput = false){



        $currentPage = 0;
        if($page !== false){
            $currentPage = $page + 1;
        }

        $message = "Автор объявления : ".$data->name." ".$data->surname."\n";
        $message .= "Город автора : ".$data->city."\n";
        if(empty($data->wallet)){
            $data->wallet = 0;
        }
        $message .= "Текущий счет автора : ".$data->wallet." руб\n";
        $message .= "Раздел объявления : ".$data->section_description."\n";




        if(!empty($data->type_product)){
            $message .= "Тип объявления : ".$data->type_product."\n\n";
        }
        if(!empty($data->name_product)){
            $message .= "Название объявления : ".$data->name_product."\n\n";
        }


        $message .= "\nОписание объявления : ".$data->description;


        if(!empty($data->price)){
            $message .= "\n\nЦена объявления : ".$data->price." руб"."\n";
        }



        $nextPage     = Button::create(['button' => '#selectProductToChangeNext#'
            ."(".$userInput.")"."_"."!".$productInput."!"."*".$data->id_product."*page^"
            .$currentPage."^"], $this->botButtonLabels['nextPage'], 'positive');
        $inputCurrentProductToChange     = Button::create(['button' => '#readyChange#'
            ."(".$userInput.")"."_"."!".$productInput."!"."*".$data->id_product."*"
        ], $this->botButtonLabels['ready_change'], 'negative');



        $goSearch     = Button::create(['button' => 'show_products'], $this->botButtonLabels['goSearch'], 'secondary');


        $btnRow1 = ButtonRowFactory::createRow()->addButton($nextPage)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($inputCurrentProductToChange)->getRow();
        $btnRow3 = ButtonRowFactory::createRow()->addButton($goSearch)->getRow();



        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->addRow($btnRow2)
            ->addRow($btnRow3)
            ->setOneTime(false)
            ->getKeyboardJson();
//        dd($dataToSend['photo_id']);
        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    => substr($message, 0, 9000),
            'attachment' => "photo".$data['photo_id']."_".$data['access_key'],
            'keyboard'  => $kb,

        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function myProducts($data  , $page = false ){

        $currentPage = 1;
        if($page !== false){
            $currentPage = $page + 1;
        }

        $message = "Автор объявления : ".$data->name." ".$data->surname."\n";
        $message .= "Город автора : ".$data->city."\n";
        if(empty($data->wallet)){
            $data->wallet = 0;
        }
        $message .= "Текущий счет автора : ".$data->wallet." руб\n";
        $message .= "Раздел объявления : ".$data->section_description."\n";


        if(!empty($data->type_product)){
            $message .= "Тип объявления : ".$data->type_product."\n\n";
        }
        if(!empty($data->name_product)){
            $message .= "Название объявления : ".$data->name_product."\n\n";
        }


        $message .= "\nОписание объявления : ".$data->description;


        if(!empty($data->price)){
            $message .= "\n\nЦена объявления : ".$data->price." руб"."\n";
        }


        $nextPage     = Button::create(['button' => '#nextPageMyProduct#'.$currentPage], $this->botButtonLabels['nextPage'], 'positive');

        $delProduct     = Button::create(['button' => '#delProduct#'.$data->id_product], $this->botButtonLabels['delProduct'], 'negative');
        $defaultPage     = Button::create(['button' => 'defaultPage'], $this->botButtonLabels['defaultPage'], 'secondary');

        $btnRow1 = ButtonRowFactory::createRow()->addButton($nextPage)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($delProduct)->addButton($defaultPage)->getRow();



        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->addRow($btnRow2)
            ->setOneTime(false)
            ->getKeyboardJson();
//        dd($dataToSend['photo_id']);
        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    => substr($message, 0, 9000),
            'attachment' => "photo".$data['photo_id']."_".$data['access_key'],
            'keyboard'  => $kb,

        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    //список объявлений
    public function listProductsResultWithoutReg($data , $page = false){
        $currentPage = 1;
        if($page !== false){
            $currentPage = $page + 1;
        }
        $message = "Автор объявления : ".$data->name." ".$data->surname."\n";
        $message .= "Город автора : ".$data->city."\n";
        if(empty($data->wallet)){
            $data->wallet = 0;
        }
        $message .= "Текущий счет автора : ".$data->wallet." руб\n";
        $message .= "Раздел объявления : ".$data->section_description."\n";

        if(!empty($data->type_product)){
            $message .= "Тип объявления : ".$data->type_product."\n\n";
        }
        if(!empty($data->name_product)){
            $message .= "Название объявления : ".$data->name_product."\n\n";
        }

        $message .= "\nОписание объявления : ".$data->description;


        if(!empty($data->price)){
            $message .= "\n\nЦена объявления : ".$data->price." руб"."\n";
        }

        $buyOrChange = '';

        if(!empty($data->price)){
            $buyOrChange = Button::create(['button' =>
                '#buyProduct#' . "(" . $data->vk_from_id . ")" . "_" . "!" . $data->id_product . "!"],
                $this->botButtonLabels['buyProduct'], 'secondary');
        }else{
            $buyOrChange     = Button::create(['button' =>
                '#selectProductToChange#'."(".$data->vk_from_id.")"."_"."!".$data->id_product."!"],
                $this->botButtonLabels['selectProductToChange'], 'secondary');
        }






        $nextPage     = Button::create(['button' => '#nextPage#'.$currentPage], $this->botButtonLabels['nextPage'], 'positive');
        $changeSection     = Button::create(['button' => 'changeSection'], $this->botButtonLabels['changeSection'], 'primary');
        $defaultPage     = Button::create(['button' => 'defaultPage'], $this->botButtonLabels['defaultPage'], 'secondary');

        $btnRow1 = ButtonRowFactory::createRow()->addButton($nextPage)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($buyOrChange)->getRow();
        $btnRow4 = ButtonRowFactory::createRow()->addButton($changeSection)->addButton($defaultPage)->getRow();

        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->addRow($btnRow2)
            ->addRow($btnRow4)
            ->setOneTime(false)
            ->getKeyboardJson();
//        dd($dataToSend['photo_id']);
        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    => substr($message, 0, 9000),
            'attachment' => "photo".$data['photo_id']."_".$data['access_key'],
            'keyboard'  => $kb,

        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);

    }
    //список объявлений
    public function listProductsResult($data , $page = false){
        $currentPage = 1;
        if($page !== false){
            $currentPage = $page + 1;
        }
        $message = "Автор объявления : ".$data->name." ".$data->surname."\n";
        $message .= "Город автора : ".$data->city."\n";
        if(empty($data->wallet)){
            $data->wallet = 0;
        }
        $message .= "Текущий счет автора : ".$data->wallet." руб\n";
        $message .= "Раздел объявления : ".$data->section_description."\n";

        if(!empty($data->type_product)){
            $message .= "Тип объявления : ".$data->type_product."\n\n";
        }
        if(!empty($data->name_product)){
            $message .= "Название объявления : ".$data->name_product."\n\n";
        }

        $message .= "\nОписание объявления : ".$data->description;


        if(!empty($data->price)){
            $message .= "\n\nЦена объявления : ".$data->price." руб"."\n";
        }

        $buyOrChange = '';

        if(!empty($data->price)){
            $buyOrChange = Button::create(['button' =>
                '#buyProduct#' . "(" . $data->vk_from_id . ")" . "_" . "!" . $data->id_product . "!"],
                $this->botButtonLabels['buyProduct'], 'secondary');
        }else{
            $buyOrChange     = Button::create(['button' =>
                '#selectProductToChange#'."(".$data->vk_from_id.")"."_"."!".$data->id_product."!"],
                $this->botButtonLabels['selectProductToChange'], 'secondary');
        }






        $nextPage     = Button::create(['button' => '#nextPage#'.$currentPage], $this->botButtonLabels['nextPage'], 'positive');
        $changeSection     = Button::create(['button' => 'changeSection'], $this->botButtonLabels['changeSection'], 'primary');
        $defaultPage     = Button::create(['button' => 'defaultPage'], $this->botButtonLabels['defaultPage'], 'secondary');

        $btnRow1 = ButtonRowFactory::createRow()->addButton($nextPage)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($buyOrChange)->getRow();
        $btnRow4 = ButtonRowFactory::createRow()->addButton($changeSection)->addButton($defaultPage)->getRow();

        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->addRow($btnRow2)
            ->addRow($btnRow4)
            ->setOneTime(false)
            ->getKeyboardJson();
//        dd($dataToSend['photo_id']);
        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    => substr($message, 0, 9000),
            'attachment' => "photo".$data['photo_id']."_".$data['access_key'],
            'keyboard'  => $kb,

        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);

    }
    public function show_products_without_reg($sections){

        $caroselOb = new Carousel();

        $counter = 0;
        $page = 1;
        $endEl = array_key_last($sections) ;

        foreach ($sections as $id => $valSection){
            $element = new Photo( $this->botStandartAttachments[$id] , $valSection['title'] , $valSection['description']);
            $element->buttons->add(1 , new Text ($this->botStandartMessages[$id] , [
                "button" => "#search_sectionWithoutReg#".$valSection['id']
            ]));
            $caroselOb->add($element);

            if($counter !== 0 && $counter % 9 == 0 || $id == $endEl){
                $message = '';
                if($counter !== 0 && $page == 1){
                    $message = $this->botStandartMessages['PleaseInputSection'].".  Страница ".$page;
                    sleep(1);
                }else{
                    $message = "Страница ".$page;
                    sleep(1);
                }
                $params = [
                    'peer_id' => $this->request->object['peer_id'],
                    'random_id' => rand(0, 2 ** 31),
                    'message'   => $message,

                    'template' => $caroselOb->toJson()

                ];


                $this->vkApiClient->messages()->send($this->accessToken, $params);

                $status = $caroselOb->removeAll();

                $page++;
            }
            $counter++;
        }

        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    => $this->botStandartMessages['end_list'],

        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }

    public function setSectionForseach($sections){

        $caroselOb = new Carousel();

        $counter = 0;
        $page = 1;
        $endEl = array_key_last($sections) ;

        foreach ($sections as $id => $valSection){
            $element = new Photo( $this->botStandartAttachments[$id] , $valSection['title'] , $valSection['description']);
            $element->buttons->add(1 , new Text ($this->botStandartMessages[$id] , [
                "button" => "#search_section#".$valSection['id']
            ]));
            $caroselOb->add($element);

            if($counter !== 0 && $counter % 9 == 0 || $id == $endEl){
                $message = '';
                if($counter !== 0 && $page == 1){
                    $message = $this->botStandartMessages['PleaseInputSection'].".  Страница ".$page;
                    sleep(1);
                }else{
                    $message = "Страница ".$page;
                    sleep(1);
                }
                $params = [
                    'peer_id' => $this->request->object['peer_id'],
                    'random_id' => rand(0, 2 ** 31),
                    'message'   => $message,

                    'template' => $caroselOb->toJson()

                ];


                $this->vkApiClient->messages()->send($this->accessToken, $params);

                $status = $caroselOb->removeAll();

                $page++;
            }
            $counter++;
        }

        $defaultPage     = Button::create(['button' => 'defaultPage'], $this->botButtonLabels['defaultPage'], 'negative');
        $btnRow1 = ButtonRowFactory::createRow()->addButton($defaultPage)->getRow();
        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->getKeyboardJson();
        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    => $this->botStandartMessages['end_list'],
            'keyboard'  => $kb,

        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    //отправляю пользователю успешно заполненное обьявление и кнопку  - смотреть обьявления
    public function setSectionSuccessSendMessageToUser($dataToSend){
        $message = "Ваше объявление - (проверьте все ли верно и выберите след действие) \n\nАвтор объявления : ".$dataToSend['userName']." ".$dataToSend['surname']."\n";
        $message .= "Город автора : ".$dataToSend['city']."\n";
        if(empty($dataToSend['wallet'])){
            $dataToSend['wallet'] = 0;
        }
        $message .= "Текущий счет автора : ".$dataToSend['wallet']." руб\n";
        $message .= "Раздел объявления : ".$dataToSend['titleSection']."\n\n";

        if(!empty($dataToSend['type_product'])){
            $message .= "Тип объявления : ".$dataToSend['type_product']."\n\n";
        }
        if(!empty($dataToSend['name_product'])){
            $message .= "Название объявления : ".$dataToSend['name_product']."\n\n";
        }


//        $message .= $dataToSend['descriptionSection'];
        $message .= "\nОписание объявления : ".$dataToSend['description']."\n\n";

        if(!empty($dataToSend['price'])){
            $message .= "\n\nЦена объявления : ".$dataToSend['price']." руб"."\n";
        }


        $again_send_product       = Button::create(['button' => 'advertisement_list_add_again'], $this->botButtonLabels['again_send_product'], 'primary');
        $again_send_product_without_del       = Button::create(['button' => 'typeListAddbtn'], $this->botButtonLabels['addProducts_without_del'], 'primary');
        $defaultPage     = Button::create(['button' => 'defaultPage'], $this->botButtonLabels['defaultPage'], 'negative');
        $show_products     = Button::create(['button' => 'show_products'], $this->botButtonLabels['show_products'], 'positive');

        $btnRow1 = ButtonRowFactory::createRow()->addButton($again_send_product)->getRow();
        $btnRow2 = ButtonRowFactory::createRow()->addButton($show_products)->getRow();
        $btnRow3 = ButtonRowFactory::createRow()->addButton($again_send_product_without_del)->getRow();
        $btnRow4 = ButtonRowFactory::createRow()->addButton($defaultPage)->getRow();


        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)->addRow($btnRow2)->addRow($btnRow3)->addRow($btnRow4)
            ->setOneTime(false)
            ->getKeyboardJson();
//        dd($dataToSend['photo_id']);
        $params = [
            'user_id'    => $this->request->object['from_id'],
            'random_id'  => rand(0, 2 ** 31),
            'message'    => substr($message, 0, 9000),
//            'attachment' => "photo"."245897552_457270300_"."461bb924918a445fb0",
//            'attachment' => "photo-".$dataToSend['photo_id']."_"."461bb924918a445fb0",
            'attachment' => "photo".$dataToSend['photo_id']."_".$dataToSend['access_key'],
            'keyboard'  => $kb,

        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
    public function processingUserPhotoNewAdvertisement($sections){

        $caroselOb = new Carousel();

        $counter = 0;
        $page = 1;
        $endEl = array_key_last($sections) ;

        foreach ($sections as $id => $valSection){
            $element = new Photo( $this->botStandartAttachments[$id] , $valSection['title'] , $valSection['description']);
            $element->buttons->add(1 , new Text ($this->botStandartMessages[$id] , [
                "button" => "#set_section#".$valSection['id']
            ]));
            $caroselOb->add($element);
                if($counter !== 0 && $counter % 9 == 0 || $id == $endEl){
                    $message = '';
                    if($counter !== 0 && $page == 1){
                        $message = $this->botStandartMessages['PleaseInputSection'].".  Страница ".$page;
                        sleep(1);
                    }else{
                        $message = "Страница ".$page;
                        sleep(1);
                    }
                    $params = [
                        'peer_id' => $this->request->object['peer_id'],
                        'random_id' => rand(0, 2 ** 31),
                        'message'   => $message,

                        'template' => $caroselOb->toJson()

                    ];



                    $this->vkApiClient->messages()->send($this->accessToken, $params);

                    $status = $caroselOb->removeAll();

                    $page++;
                }
            $counter++;
        }


    }

    public function defaultResponse()
    {
        $defaultPage     = Button::create(['button' => 'defaultPage'], $this->botButtonLabels['defaultPage'], 'negative');


        $btnRow1 = ButtonRowFactory::createRow()->addButton($defaultPage)->getRow();


        $kb = KeyboardFactory::createKeyboard()
            ->addRow($btnRow1)
            ->setOneTime(false)
            ->setInline(true)
            ->getKeyboardJson();




        $params = [
            'user_id'   => $this->request->object['from_id'],
            'random_id' => rand(0, 2 ** 31),
            'message'   => $this->botStandartMessages['default_message'],
            'keyboard'  => $kb,
        ];

        $this->vkApiClient->messages()->send($this->accessToken, $params);
    }
}
