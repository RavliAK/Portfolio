<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Order;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $order;
    public function __construct(Order $order)
{
    $this->order = $order;
}

public function build()
{
    // Array for Blade

    $this->view('emails.welcome')
                ->with([
                    'order' => $this->order->id,
                  ]);

    return $this->markdown('emails.welcome');
}
}
