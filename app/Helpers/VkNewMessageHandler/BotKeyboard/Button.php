<?php
namespace App\Helpers\VkNewMessageHandler\BotKeyboard;

class Button
{

    public static function create(array $payload, string $label, string $colorType): array
    {
    $button['action']['type'] = 'text';
    $button['action']['payload'] = json_encode($payload,JSON_UNESCAPED_UNICODE);
    $button['action']['label'] = $label;
    $button['color']= $colorType;
    return $button;
    }
    public static function createOpenLink($type , $link , array $payload, string $label, string $colorType): array
    {
        $button['action']['type'] = $type;
        $button['action']['link'] = $link;
        $button['action']['payload'] = json_encode($payload,JSON_UNESCAPED_UNICODE);
        $button['action']['label'] = $label;

        return $button;
    }
    public static function createBtnMap(array $payload, string $label, string $colorType , $type): array
    {
        $button['action']['type'] = $type;
        $button['action']['payload'] = json_encode($payload,JSON_UNESCAPED_UNICODE);
        return $button;
    }
}
