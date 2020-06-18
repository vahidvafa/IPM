<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;


    public $main;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($main,$name)
    {
        $this->main = $main;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $main = $this->main;
        $name = $this->name;
        return $this->view('email.register',compact('name','main'))->subject("مدارک شما تایید شد - انجمن مدیریت پروژه ایران");
    }
}
