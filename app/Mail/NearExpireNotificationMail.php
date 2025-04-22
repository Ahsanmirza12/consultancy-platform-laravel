<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NearExpireNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $expiringUsers;

    public function __construct($expiringUsers)
    {
        $this->expiringUsers = $expiringUsers;
    }

    public function build()
    {
        return $this->subject('Near Expiry Subscriptions Alert')
                    ->view('emails.near_expiry');
    }
}
