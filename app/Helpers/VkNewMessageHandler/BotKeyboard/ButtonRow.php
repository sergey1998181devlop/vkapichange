<?php
namespace App\Helpers\VkNewMessageHandler\BotKeyboard;

class ButtonRow
{

    private $buttonRow = [];

    public function addButton(array $button): self
    {
        $this->buttonRow[] = $button;

        return $this;
    }

    public function getRow(): array
    {
        return $this->buttonRow;
    }
}
