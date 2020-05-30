<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;


    public $userCard;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userCard)
    {
        $this->userCard = $userCard;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fileName = $this->userCard;
        return $this->view('email.register')->attach(asset("img/userCards/$fileName"));
    }
}
