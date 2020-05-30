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

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct($shortcomings)
    {
        $this->shortcomings = $shortcomings;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $shortcomings = $this->shortcomings;
        return $this->view('email.defective_documents',compact('shortcomings'));
    }
}
