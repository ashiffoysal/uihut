<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\GeneralSetting;
use App\Models\Cashier\Receipt;
use App\Models\Cashier\Subscription;
use Laravel\Paddle\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Cashier::useReceiptModel(Receipt::class);
        Cashier::useSubscriptionModel(Subscription::class);
        $logo=GeneralSetting::first();
        view()->share('logo', $logo);
    }
}
