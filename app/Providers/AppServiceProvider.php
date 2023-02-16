<?php

namespace App\Providers;
use Blade;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\View;  
use Illuminate\Support\ServiceProvider;
use App\Models\ticket;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            $user = Auth::user();
            return auth()->check() && $user->hasRole('admin');

        });   
        Blade::if('user', function () {
            $user = Auth::user();
            return auth()->check() && $user->hasRole('user');

        });   

        Blade::if('support', function () {
            $user = Auth::user();
            return auth()->check() && $user->hasRole('support');

        });   

        Blade::if('auth', function () {
            $user = Auth::user();
            return auth()->check() ;

        });
       
    }


}
