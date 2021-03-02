<?php

namespace App\Services;

use App\Log;

class Logger
{
    /**
     * @param $model_data
     * @param null $type
     * @return mixed
     */
    public function addLog($model_data, $type = null)
    {
        return Log::create([
            'model' => class_basename($model_data),
            'model_id' => $model_data->id,
            'type' => $type
        ]);
    }
}
