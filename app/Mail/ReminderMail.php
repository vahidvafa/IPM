<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;

    public $text;

    public function __construct(User $user, $text)
    {
        $this->user = $user;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = encrypt($this->user->email);
        $upgradeUrl = route('preUpgrade.code', [$email]);
        $repeatUrl = route('preRepeat.code', [$email]);
        return $this->view('email.reminder')->with([
            'text' => $this->text,
            'upgradeUrl' => $upgradeUrl,
            'repeatUrl' => $repeatUrl,
        ]);
    }
}
