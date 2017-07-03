<?php

namespace App\Providers;

use App\Senders\SmsSender;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(SmsSender::class, function () {
            $username = env('SMS_USERNAME');
            $apiKey = env('SMS_API_KEY');
            return new SmsSender($username, $apiKey);
        });
    }
}
