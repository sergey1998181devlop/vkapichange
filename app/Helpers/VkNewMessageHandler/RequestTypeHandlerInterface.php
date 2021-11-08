<?php
namespace App\Helpers\VkNewMessageHandler;

use Illuminate\Http\Request;

interface RequestTypeHandlerInterface
{

    public static function handle(Request $request  , $status);
}
