<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Requests\DeviceInformationRequest;
use App\Http\Resources\DeviceInformationResources;

class DeviceController extends Controller
{
    /**
     * @param DeviceInformationRequest $request
     * @return DeviceInformationResources
     */
    public function storeOrUpdate(DeviceInformationRequest $request)
    {
        $device = Device::updateOrCreate(
            [
                'uid' => $request->uid
            ],
            [
                'app_id' => $request->app_id,
                'language' => $request->language,
                'operating_system' => $request->operating_system,
            ]
        );

        return new DeviceInformationResources($device);
    }

}
