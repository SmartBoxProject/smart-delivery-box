<?php

namespace App\Mail;

use App\Models\Delivery;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeliveryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $delivery;

    public function __construct($delivery)
    {
        $this->delivery = $delivery;
    }

    public function build()
    {
        return $this
            ->subject('New Delivery Arrived')
            ->view('emails.delivery');
    }
}