<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Bike;

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
        View::composer('layouts.navbar', function ($view) {
            $bikesByType = Bike::with('variants')
                             ->orderBy('name')
                             ->get()
                             ->groupBy('type');

            // Sắp xếp các nhóm theo thứ tự bạn muốn
            $sortedBikesByType = $bikesByType->sortBy(function ($bikes, $type) {
                return match ($type) {
                    'CAO CẤP' => 1,
                    'TRUNG CẤP' => 2,
                    'PHỔ THÔNG' => 3,
                    default => 4,
                };
            });

            $view->with('bikesByType', $sortedBikesByType);
        });
    }
}
