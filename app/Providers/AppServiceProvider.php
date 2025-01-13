<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\{User, Post};

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
        Gate::define('update-post', function(User $user, Post $post){
            return $user->id === $post->user_od;
        });

        Gate::before(function(User $user, $ability){
            return $user->hasRole('Super Admin') ? true : false;
        });
    }
}
