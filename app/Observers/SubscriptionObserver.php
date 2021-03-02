<?php

namespace App\Observers;

use App\Log;
use App\Services\Logger;
use App\Subscription;

class SubscriptionObserver
{
    /**
     * Handle the subscription "created" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function created(Subscription $subscription)
    {
        (new Logger())->addLog($subscription, 'started');
    }

    /**
     * Handle the subscription "updated" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function updated(Subscription $subscription)
    {
        (new Logger())->addLog($subscription, 'renewed');
    }

    /**
     * Handle the subscription "deleted" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function deleted(Subscription $subscription)
    {
        (new Logger())->addLog($subscription, 'cancelled');
    }

    /**
     * Handle the subscription "restored" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function restored(Subscription $subscription)
    {
        //
    }

    /**
     * Handle the subscription "force deleted" event.
     *
     * @param  \App\Subscription  $subscription
     * @return void
     */
    public function forceDeleted(Subscription $subscription)
    {
        //
    }
}
