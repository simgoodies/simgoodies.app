<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PragmaRX\Version\Package\Version;

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
        if ($this->app->environment() == ('production' || 'staging')) {
            $this->app->alias('bugsnag.multi', \Illuminate\Contracts\Logging\Log::class);
            $this->app->alias('bugsnag.multi', \Psr\Log\LoggerInterface::class);
        }
    }
}
