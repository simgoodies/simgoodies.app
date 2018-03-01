<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscription;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    public function store(StoreSubscription $request)
    {
        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->save();

        Session::flash('success', 'You have successfully subscribed to stay posted about VATGoodies.com');

        return redirect()->route('landing.show');
    }
}
