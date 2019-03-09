<?php

namespace App\Services;

use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreSubscription;
use App\Mail\ConfirmYourSubscriptionMailable;

class SubscriptionService
{
    public function processSubscriptionRequest(StoreSubscription $request)
    {
        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->token = md5(now()->timestamp);
        $subscription->save();

        Mail::to($request->email)->send(new ConfirmYourSubscriptionMailable($subscription->token));

        Session::flash('success', 'You have successfully subscribed to stay posted about VATGoodies.com. Please check your inbox to confirm your subscription.');

        return $subscription;
    }

    public function processConfirmation($token)
    {
        $subscription = Subscription::where('token', $token)->first();

        $subscription->confirmed = true;

        $subscription->save();

        Session::flash('success', 'You have successfully confirmed your subscription to stay posted about VATGoodies.com');

        return $subscription;
    }
}
