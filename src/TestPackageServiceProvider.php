<?php

namespace TestPackages;

use Illuminate\Support\ServiceProvider;

class TestPackageServiceProvider extends ServiceProvider

{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'register');
        // $this->loadViewsFrom(__DIR__.'/views', 'login');

        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
