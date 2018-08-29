<?php

namespace App\Services;

use App\Http\Requests\StoreSubscription;
use App\Models\Subscription;
use Illuminate\Support\Facades\Session;

class SubscriptionService

{
    public function processSubscriptionRequest(StoreSubscription $request)
    {
        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->token = md5(now()->timestamp);
        $subscription->save();

        Session::flash('success', 'You have successfully subscribed to stay posted about VATGoodies.com');

        return $subscription;
    }

    public function processConfirmation($token)
    {
        $subscription = Subscription::where('token', $token)->first();

        $subscription->confirmed = true;

        $subscription->save();

        Session::flash('success', 'You have successfully subscribed to stay posted about VATGoodies.com. Please check your inbox to confirm your subscription');

        return $subscription;
    }
}