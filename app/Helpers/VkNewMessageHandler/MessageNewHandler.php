<?php
namespace App\Helpers\VkNewMessageHandler;

use App\Helpers\VkNewMessageHandler\Response\ActionResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Helpers\VkNewMessageHandler\BotCarousel;


abstract class MessageNewHandler implements RequestTypeHandlerInterface
{

    public static function handle(Request $request  , $status , $data = false)
    {

        $dialogStep = "";
        $idKey = '';
        $idProductForChange = '';
        $idVkFromId = '';
        if (isset($request->object['payload'])) {
            $payload = '';
            if(array_key_exists('payload',$request->object)){
                $payload = json_decode($request->object['payload'], true);
                if(isset($payload['button']) ){
                    //проверяю с начала выбор разделов  - ибо у них ключи находятся между # ) потом уже проверяю на иные сообщения
                    preg_match_all('/#(.*?)#/', (string) $payload['button'] , $statusSectionBtn);
                    $idKey = preg_replace('/\D/', '', (string) $payload['button'] );
                    if(isset($statusSectionBtn[1][0]) && $statusSectionBtn[1][0] == "readyChange"){
                        preg_match_all('/!(.*?)!/', (string) $payload['button'] , $idProductForChangeMess);
                        preg_match_all('/\((.*?)\)/', (string) $payload['button'] , $idVkFromIdMess);
                        if(!empty($idProductForChangeMess[1][0])){
                            $idProductForChange = $idProductForChangeMess[1][0];
                            $idVkFromId = $idVkFromIdMess[1][0];
                        }
                    }

                    if(!empty($statusSectionBtn[1][0])){
                        switch ($statusSectionBtn[1][0]){
                            case "set_section" :
                                $dialogStep = "set_section";
                                break;
                            case "search_section" :
                                $dialogStep = "search_section";
                                break;
                        }
                    }
                    elseif (isset($payload['button'])) {
                        //если отправили любые другие соощения помимо разделов
                        $dialogStep = $payload['button'];
                    }
                }
            }
        }

            if(isset($request->object['attachments'][0]['type']) && $request->object['attachments'][0]['type'] == "photo" ){
                    $dialogStep = "photo_new_Advertisement";
            }

        $actionResponse = new ActionResponse($request, app()->get('vkchangesapi') , env('VK_SECRET_INIT_KEY') );



        switch ($status) {
            case 'advertisementListAddAgain':
                $actionResponse->typeListAddbtn();
                break;
            case 'name_list_add':
                $actionResponse->nameListAdd();
                break;
            case 'waitRadius':
                $actionResponse->waitRadius();
                break;
            case "userInputNotNum":
                $actionResponse->userInputNotNum();
                break;
            case "successUpdateRadius":
                $actionResponse->successUpdateRadius();
                break;
            case "myWallet":
                    $actionResponse->myWallet($data);
                break;
            case 'successDealBuy':
                $actionResponse->successDealBuy($data);
                break;
            case 'successDeal':
            $actionResponse->successDeal($data);
                break;
            case 'delAccountInApply':

                $actionResponse->delAccountInApply();
                break;
            case 'notAgreeWithProductTrueForUserBuy':

                $actionResponse->notAgreeWithProductTrueForUserBuy($data);
                break;
            case 'notAgreeWithProductTrueForUser':

                $actionResponse->notAgreeWithProductTrueForUser($data);
                break;
            case 'secondUserEmptyWalletBuy':
                //Отправляю пользователю запрос на обмен
                $actionResponse->secondUserEmptyWalletBuy($data);
                break;
            case 'secondUserEmptyWallet':
                //Отправляю пользователю запрос на обмен
                $actionResponse->secondUserEmptyWallet($data);
                break;
            case 'messageToChangeUser':
                //Отправляю пользователю запрос на обмен
                $actionResponse->messageToChangeUser($data);
                break;

            case 'messageToBuyProductUser':
                //Отправляю пользователю запрос на обмен
                $actionResponse->messageToBuyProductUser($data);
                break;
            case 'removedUser':
                //пользователь успешно удален
                $actionResponse->removedUser();
                break;
            case 'removedProduct':
                //успешно удален
                $actionResponse->removedProduct();
                break;
            case 'alreadyRemoved':
                //уже был успешно удален
                $actionResponse->alreadyRemoved();
                break;
            case 'startSearchEmptyRes':
                //если при выборе раздела - там пусто сразу кидаю сообщение о пустоте и отправляю кнопки изменить и главное меню
                $actionResponse->startSearchEmptyRes();
                break;
            //если обьявлений больше нет  - кидаю сообщение
            case 'nextPageEmpty':
                $actionResponse->nextPageEmpty();
                break;
            //если пользователь выбирает  товары  свои для обмена  - а там пусто
            case 'myProductsToChangeEmpty':
                $actionResponse->myProductEmpty($data , $idKey);
                break;
                //если пользователь нажал мои товары  - а там пусто
            case 'myProductEmpty':
                $actionResponse->myProductEmpty($data , $idKey);
                break;
            //если есть еще мои обьявления для обмена  - кидаю обьявление и страницу
            case 'myProductsToChangeNotEmpty':
                $page = 0;
                $userInput = '';
                $productInput = '';
                preg_match_all('/\((.*?)\)/', (string) $payload['button'] , $userInputMess);
                if(!empty($userInputMess[1][0])){
                    $userInput = $userInputMess[1][0];
                    preg_match_all('/\!(.*?)\!/', (string) $payload['button'] , $productInputMess);
                    $productInput = $productInputMess[1][0];
                }
                if(strpos($payload['button'], "page")){
                    preg_match_all('/\^(.*?)\^/', (string) $payload['button'] , $pageMyProductsMess);
                    $page = $pageMyProductsMess[1][0];
                }


                $actionResponse->myProductsToChange($data , $page , $userInput , $productInput);
                break;
            case 'myProductsToChangeNotEmptyRepeat':
                $page = 0;
                $userInput = '';
                $productInput = '';
                preg_match_all('/\((.*?)\)/', (string) $payload['button'] , $userInputMess);
                if(!empty($userInputMess[1][0])){
                    $userInput = $userInputMess[1][0];
                    preg_match_all('/\!(.*?)\!/', (string) $payload['button'] , $productInputMess);
                    $productInput = $productInputMess[1][0];
                }
                if(strpos($payload['button'], "page")){
                    preg_match_all('/\^(.*?)\^/', (string) $payload['button'] , $pageMyProductsMess);
                    $page = $pageMyProductsMess[1][0];
                }

                $actionResponse->myProductsToChange($data , 0 , $userInput , $productInput);
                break;
            //если есть еще мои обьявления  - кидаю обьявление и страницу
            case 'myProductNotEmpty':
                if(empty($idKey)){
                    $idKey = 0;
                }
                $actionResponse->myProducts($data , $idKey);
                break;
            case 'myProductNotEmptyRepeat':

                $actionResponse->myProducts($data , 0);
                break;
            //если есть еще обьявления  - кидаю обьявление и страницу
            case 'nextPageIsset':
                $actionResponse->listProductsResult($data , $idKey);
                break;
            //у пользователя сумма кошелька меньше суммы обмена  - отправляю сообщение с кнопкой пополнения
            case 'userEmptyWallet':
                $actionResponse->userEmptyWallet($data);
                break;
            //у пользователя сумма кошелька меньше суммы покупки  - отправляю сообщение с кнопкой пополнения
            case 'userEmptyWalletForBuy':
                $actionResponse->userEmptyWalletForBuy($data);
                break;
            //если у пользователя нету товаров - отправляю сообщение с кнопкой - добавить обьявления
            case 'userEmptyProduct':
                    $actionResponse->userEmptyProduct();
                break;
            case 'notRegistered':
                //если не зареган  - отправляю ему карту  - пусть расшифровыет свое местоположение грязная сучка
                    $actionResponse->getMapUserCoordinates();
                break;
                //когда аккаунт создан  / высвечиваю кнопки старта и отсылаю статус о успешной регистрации
            case 'updatingAccountAddMap':
                    $actionResponse->RegisterSuccessAndStart("registerSuccess");
                break;
                //после получения  - изменить город ) отдаю туже кнопку местоположения что при регистрации ) только + статус для текста - об обновлении города
            case 'updatingMap':
                    $actionResponse->getMapUserCoordinates("updateMap");
                break;
                //когда обновлении карты прошло успешно  / высвечиваю кнопки старта и отдаю статус об успешном обновлении адресса
            case 'updateMapSuccess':
                $actionResponse->RegisterSuccessAndStart("updateMapSuccess");
                break;
            default:
                self::checkStep($actionResponse, $dialogStep , $data);
        }

    }

    private static function checkStep($actionResponse , $dialogStep , $data = false){


        switch ($dialogStep) {

            case 'show_products_without_reg':
                $actionResponse->show_products_without_reg($data);
                break;
            //кнопка радиус в меню
            case 'changeRadius':
                $actionResponse->changeRadiusButton($data);
                break;
                //мои обявления список
            case 'contacts_info':
                $actionResponse->contactsInfo($data);
                break;
                //мои обявления список
            case 'myProducts':
                $actionResponse->myProducts($data);
                break;
            case 'defaultPage':
                $actionResponse->defaultPage();
                break;
            //возращаю пользователю записи из поиска  при первом поиске
            case 'search_sectionWithoutReg':
                $actionResponse->listProductsResultWithoutReg($data);
                break;
            //возращаю пользователю записи из поиска  при первом поиске
            case 'search_section':
                $actionResponse->listProductsResult($data);
                break;
            case 'changeSection':
                $actionResponse->setSectionForseach($data);
                break;
            case 'show_products':
                $actionResponse->setSectionForseach($data);
                break;
            case 'editSearchSection':
                $actionResponse->setSectionForseach($data);
                break;
            case 'set_section':
                //установка раздела для товара прошла / отсылаю пользователю его товар с вопросом все ли ок ?
                $actionResponse->setSectionSuccessSendMessageToUser($data);
                break;
            case 'typeListAddbtn':
                $actionResponse->typeListAddbtn();
                break;
            case 'advertisement_list_add':
                $actionResponse->AdvertisementListAdd();
                break;
            case 'photo_new_Advertisement':
                $actionResponse->processingUserPhotoNewAdvertisement($data);
                break;
            default:
                $actionResponse->defaultResponse();
        }
    }
}
