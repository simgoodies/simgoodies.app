<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscription;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    public function store(StoreSubscription $request, SubscriptionService $subscriptionService)
    {
        $subscriptionService->processSubscriptionRequest($request);

        return redirect()->route('landing.show');
    }
}
