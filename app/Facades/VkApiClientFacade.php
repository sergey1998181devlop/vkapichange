<?php

namespace App\Facades;


use \Illuminate\Support\Facades\Facade;


class VkApiClientFacade extends Facade {
    protected static function getFacadeAccessor() { return 'vkchangesapi'; }
}
