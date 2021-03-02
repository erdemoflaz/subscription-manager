<?php

namespace App\Providers;

use App\Device;
use App\Observers\DeviceObserver;
use App\Observers\SubscriptionObserver;
use App\Subscription;
use Illuminate\Support\ServiceProvider;

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
        Device::observe(DeviceObserver::class);
        Subscription::observe(SubscriptionObserver::class);
    }
}
