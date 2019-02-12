<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use App\Http\Requests\StoreSubscription;

class SubscriptionController extends Controller
{
    public function store(StoreSubscription $request, SubscriptionService $subscriptionService)
    {
        $subscriptionService->processSubscriptionRequest($request);

        return redirect()->route('landing.show');
    }
}
