<?php
namespace Tarikhagustia\LaravelMt5;

use Illuminate\Support\ServiceProvider;

class LaravelMt5Provider extends ServiceProvider
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
        $this->publishes([
            __DIR__.'/config/mt5.php' => config_path('mt5.php'),
        ]);
    }
}
