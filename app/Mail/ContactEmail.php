<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class ContactEmail extends Mailable
{
    use Queueable;

    /**
     * Email address the contact email is from.
     *
     * @var  string
     */
    protected $email;
    /**
     * Contact email name.
     *
     * @var  string
     */
    protected $name;
    /**
     * Contact email message.
     *
     * @var  string
     */
    protected $message;

    /**
     * Create a new message instance.
     *
     * @param  array $emailVars
     */
    public function __construct(array $emailVars)
    {
        $this->email = $emailVars['email'];
        $this->name = $emailVars['name'];
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
