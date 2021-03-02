<?php

namespace App\Observers;

use App\Device;
use Illuminate\Support\Facades\Hash;

class DeviceObserver
{
    public function setToken($device)
    {
        return $device->token()->updateOrCreate(
            [
                'device_id' => $device->id,
            ]
            ,[
                'device_id' => $device->id,
                'token' => Hash::make($device->uid),
            ]
        );
    }
    /**
     * Handle the device "created" event.
     *
     * @param  \App\Device  $device
     * @return void
     */
    public function created(Device $device)
    {
        return $this->setToken($device);
    }

    /**
     * Handle the device "updated" event.
     *
     * @param  \App\Device  $device
     * @return void
     */
    public function updated(Device $device)
    {
        return $this->setToken($device);
    }

    /**
     * Handle the device "deleted" event.
     *
     * @param  \App\Device  $device
     * @return void
     */
    public function deleted(Device $device)
    {
        //
    }

    /**
     * Handle the device "restored" event.
     *
     * @param  \App\Device  $device
     * @return void
     */
    public function restored(Device $device)
    {
        //
    }

    /**
     * Handle the device "force deleted" event.
     *
     * @param  \App\Device  $device
     * @return void
     */
    public function forceDeleted(Device $device)
    {
        //
    }
}
