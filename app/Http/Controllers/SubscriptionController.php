<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubscriptionService;

class SubscriptionController extends Controller
{
    protected $subscriptionService;
    
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function store(Request $request, string $token)
    {
        $this->subscriptionService->storeSubscription($request, $token);

        return redirect()->route('landing.show');
    }
}
