<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $event = $this->order->event()->first();
        $eventName = $event->title;
        $longitude = $event->longitude;
        $latitude = $event->latitude;
        $link = "https://maps.google.com/?q=$latitude,$longitude";
        $orderCodes = $this->order->orderCodes();
        $count = tr_num($orderCodes->count());
        $text = "کاربر عزیز بلیت های شما برای رویداد $eventName به تعداد $count عدد صادر شد ";
        $mail = $this->view('email.order')->with([
            'text' => $text,
            'link' => $link,
        ])->subject('بلیت های صادر شده !');
        foreach ($orderCodes->get() as $orderCode) {
            $fileName = $orderCode->picture;
            $mail->attach(asset("img/codes/$fileName"));
        }
        return $mail;
    }
}
