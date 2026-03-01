<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->global_role === 'admin';
        });
        Blade::if('owner', function ($apartment) {
            return auth()->check() && $apartment->users()
                ->where('user_id', auth()->id())
                ->wherePivot('role', 'owner')
                ->wherePivot('status', 'active')
                ->exists();
        });
    }
}
