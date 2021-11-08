<?php
namespace App\Helpers\VkNewMessageHandler\BotKeyboard;

class Keyboard
{

    private $keyboard = [];

    public function addRow(array $buttonRow): self
    {
        $this->keyboard['buttons'][] = $buttonRow;

        return $this;
    }

    public function setOneTime(bool $value): self
    {
        $this->keyboard['one_time'] = $value;

        return $this;
    }
    public function setInline($inline  = false): self
    {
        $this->keyboard['inline'] = $inline;

        return $this;
    }

    public function getKeyboardJson(): string
    {
        return json_encode($this->keyboard, JSON_UNESCAPED_UNICODE);
    }
}
