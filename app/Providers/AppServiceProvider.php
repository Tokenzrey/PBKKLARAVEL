<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register button component
        Blade::component('button', \App\View\Components\Buttons\Button::class);
        Blade::component('icon-button', \App\View\Components\Buttons\IconButton::class);
        Blade::component('button-link', \App\View\Components\Links\ButtonLink::class);
        Blade::component('icon-link', \App\View\Components\Links\IconLink::class);
        Blade::component('unstyled-link', \App\View\Components\Links\UnstyledLink::class);

    }
}
