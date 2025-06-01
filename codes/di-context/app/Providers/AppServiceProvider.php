<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\GreetingServiceInterface;
use App\Services\FormalGreetingService;
use App\Services\CasualGreetingService;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\FriendController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(GuestController::class)
            ->needs(GreetingServiceInterface::class)
            ->give(FormalGreetingService::class);

        $this->app->when(FriendController::class)
            ->needs(GreetingServiceInterface::class)
            ->give(CasualGreetingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
