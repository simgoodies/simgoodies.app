<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use Illuminate\Support\Facades\Redirect;

class SubscriptionConfirmationController extends Controller
{
    public function store(SubscriptionService $subscriptionService, $token)
    {
        $subscriptionService->processConfirmation($token);

        return redirect()->route('landing.show');
    }
}
