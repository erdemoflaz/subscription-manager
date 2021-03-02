<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'device_id', 'token'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function scopeIsActive()
    {
        return $this->device->subscription->expire_date >= Carbon::now() ? 'active' : 'passive';
    }
}
