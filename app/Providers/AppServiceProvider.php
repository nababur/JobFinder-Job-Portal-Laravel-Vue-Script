<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
        Paginator::useBootstrapFive();


        // Gate::define('admin', function (User $user) {
        //     if (Auth::check()) {
        //         $adminRole = Auth::user()->roles()->pluck('name');
        //         if ($adminRole->contains('admin')) {
        //             return;
        //         }
        //     }
        // });

        // Blade::if('admin', function () {
        //     return request()->user()?->can('admin');
        // });

        // Gate::define('admin', function (User $user) {
        //     return $user->name === 'admin';
        // });

        // Blade::if('admin', function () {
        //     return request()->user()?->can('admin');
        // });


    }
}
