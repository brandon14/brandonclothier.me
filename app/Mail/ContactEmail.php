<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    use Queueable;

    /**
     *
     */
    protected $email;
    protected $name;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $emailVars)
    {
        $this->email   = $emailVars['email'];
        $this->name    = $emailVars['name'];
        $this->message = $emailVars['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact')->with([
            'name'    => $this->name,
            'email'   => $this->email,
            'message' => $this->message,
        ]);
    }
}