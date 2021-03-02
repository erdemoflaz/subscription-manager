<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'uid', 'app_id', 'language', 'operating_system'
    ];

    public function token()
    {
        return $this->hasOne(Token::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
