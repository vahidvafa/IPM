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
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userCard,$name)
    {
        $this->userCard = $userCard;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fileName = $this->userCard;
        $name = $this->name;
        return $this->view('email.register',compact('name'))->subject("مدارک شما تایید شد - انجمن مدیریت پروژه ایران")->attach(asset("img/userCards/$fileName"));
    }
}
