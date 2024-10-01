<?php

namespace App\Providers;

use App\Sevices\AddressParser\FakeParser;
use App\Sevices\AddressParser\ParserInterface;
use Illuminate\Support\ServiceProvider;

class DadataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        /*$this->app->singleton(DadataClient::class, function () {
            return new DadataClient(config('dadata.token'), config('dadata.secret'));
        });*/

        $this->app->singleton(ParserInterface::class, function () {
            return new FakeParser();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
