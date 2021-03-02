<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'status' => $this->resource,
            'expire_date' => Carbon::now()
                ->setTimezone('Asia/Dhaka')
                ->format('Y-m-d H:i:s')
        ];
    }
}
