<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local')
        {
            /* 依環境載⼊入額外的 ServiceProvider */
            $this->app->register(\Gvb\Whoops\ServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);

            $alias = AliasLoader::getInstance();
            $alias->alias('Debugbar',\Barryvdh\Debugbar\Facade::class);

        }
    }
}
