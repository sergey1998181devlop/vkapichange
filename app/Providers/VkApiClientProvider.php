<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use App\Helpers\NewsApiHelper\NewsApi;
use App\Helpers\VK\Client\VKApiClient;
use App\Helpers\VK\Client\VKApiRequest;



class VkApiClientProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('vkchangesapi', function ($app) {
            return new VKApiClient('5.101', 'ru');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
