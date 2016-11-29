<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Click;
use App\BadDomain;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Click::creating(function ($click) {
            $click->id = Click::generateUnikId();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
