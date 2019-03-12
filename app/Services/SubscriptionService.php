<?php

namespace App\Services;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Libraries\EmailOctopusApi;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Mail\ConfirmYourSubscriptionMailable;

class SubscriptionService
{
    /**
     * @var EmailOctopusApi
     */
    protected $emailOctopusApi;

    /**
     * @var string
     */
    protected $contactListId;
    
    public function __construct(EmailOctopusApi $emailOctopusApi)
    {
        $this->emailOctopusApi = $emailOctopusApi;
        $this->contactListId = config('emailoctopus.contact-lists.vatgoodies_newsletter');
    }

    /**
     * The method that will handle the store for SubscriptionRequestController.
     *
     * @param StoreSubscriptionRequest $request
     * @return Subscription
     */
    public function storeSubscriptionRequest(StoreSubscriptionRequest $request)
    {
        $this->existsByEmail($request->email);
        
        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->token = md5(now()->timestamp);
        $subscription->save();

        Mail::to($request->email)->send(new ConfirmYourSubscriptionMailable($subscription->token));

        Session::flash('success', 'You have successfully subscribed to stay posted about VATGoodies.com. Please check your inbox to confirm your subscription.');

        return $subscription;
    }

    /**
     * The method that will handle the store for the SubscriptionController.
     *
     * @param Request $request
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function storeSubscription(Request $request, string $token)
    {
        $subscription = $this->getByToken($token);
        
        if ($subscription === null) {
            $request->session()->flash('failure', 'The requested e-mail could not be found, thus could not be confirmed.');
            return redirect()->to('landing.show');
        }
        
        $response = json_decode($this->emailOctopusApi->createContactOfAList($this->contactListId, $subscription->email));
        
        if (isset($response->created_at) === false) {
            $request->session()->flash('failure', 'Something went wrong during your confirmation, please try again.');
            return redirect()->to('landing.show');
        }
        
        $subscription->confirmed = true;
        $subscription->save();

        Session::flash('success', 'You have successfully confirmed your subscription to stay posted about VATGoodies.com');

        return $subscription;
    }

    /**
     * Get subscription based on token.
     *
     * @param string $token
     * @return mixed
     */
    public function getByToken(string $token)
    {
        return Subscription::where('token', $token)->first();
    }

    /**
     * See if a subscription exists based on given email.
     *
     * @param $email
     * @return mixed
     */
    public function existsByEmail($email)
    {
        return Subscription::where('email', $email)->exists();
    }
}
