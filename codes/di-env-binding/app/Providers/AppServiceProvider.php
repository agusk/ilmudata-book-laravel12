<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\NotifierInterface;
use App\Services\EmailNotifier;
use App\Services\SlackNotifier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NotifierInterface::class, function ($app) {
            return match (config('notifier.driver')) {
                'slack' => new SlackNotifier(),
                default => new EmailNotifier(),
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
