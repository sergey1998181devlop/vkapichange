<?php
namespace App\Helpers\VkNewMessageHandler\BotKeyboard;

class KeyboardFactory
{

    public static function createKeyboard(): Keyboard
    {
        return new Keyboard();
    }

}
