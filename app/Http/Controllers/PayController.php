<?php

namespace App\Http\Controllers;



use App\Http\Controllers\API\BaseController;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use VkApi;
use App\Models\Amounts;
use App\Models\User;

class PayController extends BaseController
{

    private $vkApiClient;
    private $messages;



    public function store(Request $request)
    {

        $this->vkApiClient = app()->get('vkchangesapi');
        $this->messages = config('bot_messages');

        $amountInfo = Amounts::where('amount_type', $request->amount)->first();
        $checkStatus = base64_encode("renart1998181_G".$amountInfo->price);
        $user = User::where('id', $request->id)->update([
            "user_action" => $checkStatus
        ]);

        return view('pay' , [
            'amountPrice' => $amountInfo->price,
            'encryptData' => $checkStatus
        ]);
    }

    public function test(Request $request){

        $user = User::where('id', $request->id )->increment('wallet' , 9);
//        dd($user);
        $this->messages = config('bot_messages');
        $this->vkApiClient = app()->get('vkchangesapi');
        echo "successful payment and good luck you on test";

        $userOb = User::where('id',  $request->id)->first();
        if($userOb->name == "Константин"){
            echo " konstantin pidr";
        }
        $text = "Поздравляем вас с успешным пополнением кошелька на сумму - 9 руб";
        $params = [
            'user_id'   => $userOb->vk_from_id,
            'random_id' => rand(0, 2 ** 31),
            'message'   => $text,

        ];
        $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);

    }
    public function successPay(Request $request){
        //осталось запросить както последний платеж по его транзакции или id
        $this->vkApiClient = app()->get('vkchangesapi');
        $this->messages = config('bot_messages');

        $user = User::where('id', $request->account)->first();

        if(
            base64_encode("renart1998181_G".$request->amountPrice)
            ==
            $user->user_action
        ){
            $user->wallet = $user->wallet + $request->amountPrice;
            $user->user_action = '-';
            $user->save();

            $text = "Поздравляем вас с успешным пополнением кошелька на сумму - ".$request->amountPrice." руб";
            $params = [
                'user_id'   => $user->vk_from_id,
                'random_id' => rand(0, 2 ** 31),
                'message'   => $text,

            ];
            $this->vkApiClient->messages()->send(env('VK_SECRET_INIT_KEY') , $params);

            return view('successPay' , [
                'userName' => $user->name,
                'surName' => $user->surName
            ]);
        }else{
            return view('successEnded' , [
                'userName' => $user->name,
                'surName' => $user->surName
            ]);
        }


    }



}
