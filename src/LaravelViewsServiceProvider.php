<?php

namespace Mischkez\LaravelViews;

use Illuminate\Support\ServiceProvider;
use Mischkez\LaravelViews\Console\ScaffoldViews;

class LaravelViewsServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ScaffoldViews::class,
            ]);
        }
    }
}

