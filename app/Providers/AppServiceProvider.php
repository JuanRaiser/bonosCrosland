<?php

namespace App\Providers;

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
        
        $nombres=['Pulsar','discover'];
        $model=['125','150','200'];
        $precio = [5000, 6000, 7000, 8000, 9000, 10000];
        $bono = [100, 200, 300];
        $precio_base = function (array $attributes) {
            return $attributes['precio'] * 0.9; // Assuming a 10% discount for the base price
        };
    }
}
