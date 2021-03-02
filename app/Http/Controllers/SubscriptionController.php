<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResources;
use App\Token;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    /**
     * @param SubscriptionRequest $request
     * @return SubscriptionResources
     */
    public function subscribe(SubscriptionRequest $request)
    {
        $checked_receipt = $this->checkVerification($request->receipt);

        if ($checked_receipt)
            $this->createSubscription($request->all());

        return new SubscriptionResources($checked_receipt);
    }

    /**
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function check($token)
    {
        $token = Token::where('token', $token)->firstOrFail();

        return response()->json([
            'status' => $token->isActive()
        ]);
    }

    /**
     * @param $receipt
     * @return bool
     */
    public function checkVerification($receipt) // simple mock function for a verification
    {
        return (bool)((int)substr($receipt, -1) % 2 == 0);
    }

    /**
     * @param $request
     */
    public function createSubscription($request)
    {
        $token = Token::where('token', $request['token'])->first();

        $token->device->subscription()->firstOrCreate(
            [
                'token_id' => $token->id,
                'device_id' => $token->device->id
            ],
            [
                'token_id' => $token->id,
                'expire_date' => Carbon::now()->addMonths(1)
            ]
        );
    }
}
