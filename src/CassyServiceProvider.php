<?php

namespace Olelo\Cassy;

use Illuminate\Support\ServiceProvider;

class CassyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/cassy.php' => base_path('config/cassy.php')
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/cassy.php', 'cassy');

        $this->app->bind('cassy', function(){
            return new Cassy(config('cassy.cdn.url'));
        });
    }
}