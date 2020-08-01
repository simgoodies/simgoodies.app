<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmYourSubscriptionMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * This is the token used for the confirmation of the e-mail
     *
     * @var string
     */
    protected $token;

    /**
     * Create a new message instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
        
        $this->populateMail();
    }

    private function populateMail()
    {
        $this->subject('Confirm your subscription to Simgoodies');
        $this->markdown('emails.subscriptions.confirm');
        $this->with([
            'token' => $this->token,
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this;
    }
}
