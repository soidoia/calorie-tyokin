<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;

class LineAuthProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('Laravel\Socialite\Contracts\Factory')->extend(
            'line',
            function ($app) {
                return $app['Laravel\Socialite\Contracts\Factory']->buildProvider(
                    \SocialiteProviders\Line\Provider::class,
                    config('services.line')
                );
            }
        );    
    }
}
