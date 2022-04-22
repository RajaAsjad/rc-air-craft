<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->details['from']=='verify'){
            return $this->subject('Verification Account')->view('emails.verify-email');
        }elseif($this->details['from']=='password-reset'){
            return $this->subject('Reset Password Notification')->view('emails.password-reset');
        }elseif($this->details['from']=='admin-password-reset'){
            return $this->subject('Reset Password Notification')->view('emails.password-reset');
        }
    }
}
