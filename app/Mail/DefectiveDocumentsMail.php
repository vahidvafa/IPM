<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DefectiveDocumentsMail extends Mailable
{
    use Queueable, SerializesModels;


    public $shortcomings;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct($shortcomings,$name)
    {
        $this->shortcomings = $shortcomings;
        $this->name = $name;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $shortcomings = $this->shortcomings;
        $name = $this->name;
        return $this->subject("نقص مدارک")->view('email.defective_documents',compact('name','shortcomings'));
    }
}
