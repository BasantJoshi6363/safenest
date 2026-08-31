<?php

namespace App\Providers;

use App\Notifications\CustomResetPassword;
use Filament\Auth\Notifications\ResetPassword as FilamentResetPassword;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Intercept Filament's internal reset password notification and force it to use your SafeNest theme
        $this->app->bind(FilamentResetPassword::class, function ($app, array $parameters) {
            return new CustomResetPassword($parameters['token'] ?? '');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ...
    }
}