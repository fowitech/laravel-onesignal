<?php

namespace Fowitech\OneSignal;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class OneSignalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (app() instanceof \Illuminate\Foundation\Application) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('onesignal.php'),
            ], 'fowitech-onesignal');
        }
    }

    public function register()
    {
        $this->app->singleton(OneSignal::class, function (Application $app) {
            return new OneSignal(new Client([
                'base_uri' => 'https://onesignal.com/api/v1/',
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer '.config('onesignal.api_key')
                ]
            ]));
        });
    }
}
