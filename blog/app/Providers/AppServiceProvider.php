<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('isGuru', function ($user) {
            return $user->role == 'guru';
        });
        Gate::define('isSiswa', function ($user) {
            return $user->role == 'siswa';
        });
        Gate::define('isKepsek', function ($user) {
            return $user->role == 'kepsek';
        });
    }
}
