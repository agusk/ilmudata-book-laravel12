<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\MessageServiceInterface;
use App\Services\StandardMessageService;
use App\Services\SingletonMessageService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Transient (default) binding
        $this->app->bind('standard.message', StandardMessageService::class);

        // Singleton binding
        $this->app->singleton('singleton.message', SingletonMessageService::class);

        // Interface binding (default uses Standard)
        $this->app->bind(MessageServiceInterface::class, StandardMessageService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
