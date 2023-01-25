<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class PasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
    public function __construct($user)
{
    $this->user = $user;
}

public function build()
{
    // Array for Blade

    $this->view('emails.passwordreset')
                ->with([
                    'id' => $this->user,
                  ]);

    return $this->markdown('emails.passwordreset');
}
}
