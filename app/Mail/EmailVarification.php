<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVarification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $fullname;
     public $email;
     public $varify_token;

    public function __construct($fullname,$email,$varify_token)
    {
        $this->$fullname = $fullname;
        $this->$email = $email;
        $this->$varify_token = $varify_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullname = $this->fullname;
        $email = $this->email;
        $varify_token = $this->varify_token;
        return $this->view('backend.mail_template.user_verification_mail',compact('fullname','email','varify_token'));
    }
}
