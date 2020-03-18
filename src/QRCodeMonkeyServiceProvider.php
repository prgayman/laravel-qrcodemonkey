<?php

namespace AymanAlaiwah\QRCodeMonkey;

use Illuminate\Support\ServiceProvider;


class QRCodeMonkeyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $publishes = [
            "config" =>         [
                __DIR__ . '/Config/qrcode_monkey.php' => config_path('qrcode_monkey.php')
            ],
            "public" => [
                __DIR__ . '/Assets' => public_path('vendor/qrcodemonkey')
            ]

        ];
        foreach ($publishes as $group => $publishe) {
            $this->publishes($publishe, $group);
        }
    }
}
