<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'device_id', 'token_id', 'expire_date'
    ];
}
