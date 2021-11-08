<?php

namespace App\Helpers\VkNewMessageHandler\BotCarousel\Buttons;

use App\Helpers\VkNewMessageHandler\BotCarousel\Button;

/**
 * Кнопка передачи геолокации
 */
class Location extends Button
{
    /**
     * Конструктор
     *
     * [@param array $payload = []] - нагрузка кнопки
     */
    public function __construct (array $payload = [])
    {
        $this->action = [
            'type'    => 'location',
            'payload' => $payload
        ];
    }
}
