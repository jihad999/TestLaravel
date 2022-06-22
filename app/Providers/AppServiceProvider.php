<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\TestingHelper;
use App\Providers\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TestingHelper::class , function(){
            return new TestingHelper('Hello, World !');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // RateLimiter::for('limit', function (Request $request) {
        //     return Limit::perSecondes(2);
        // });
    }
}
