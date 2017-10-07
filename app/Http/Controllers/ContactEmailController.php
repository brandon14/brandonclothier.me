<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Mail\Mailer;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SendContactEmail;

class ContactEmailController extends Controller
{
    /**
     * Mailer service.
     *
     * @var \Illuminate\Mail\Mailer
     */
    private $mailer;

    /**
     * ContactEmailController constructor.
     *
     * @param \Illuminate\Mail\Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Controller function to send a contact email to the contact email configured.
     *
     * @param  \App\Http\Requests\SendContactEmail $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmail(SendContactEmail $request)
    {
        $contactEmail = config('mail.contact_email');
        $name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
        $email = filter_var($request->input('email'), FILTER_SANITIZE_EMAIL);
        $message = filter_var($request->input('message'), FILTER_SANITIZE_STRING);

        $this->mailer->to($contactEmail)->send(
            new ContactEmail([
                'name'    => $name,
                'email'   => $email,
                'message' => $message,
            ])
        );

        return new JsonResponse([
            'message' => 'Message was sent.',
            'status'  => 200,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
