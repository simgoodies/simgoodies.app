<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use App\Http\Requests\StoreSubscriptionRequest;

class SubscriptionRequestController extends Controller
{
    /**
     * @var SubscriptionService
     */
    protected $subscriptionService;
    
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function store(StoreSubscriptionRequest $request)
    {
        $this->subscriptionService->storeSubscriptionRequest($request);

        return redirect()->route('landing.show');
    }
}
