<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactEmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $contactEmail = config('mail.contactemail');

        $name    = $request->input('name') ? strip_tags($request->input('name')) : null;
        $email   = $request->input('email') ? filter_var($request->input('email'), FILTER_SANITIZE_EMAIL) : null;
        $message = $request->input('message') ?: 'No message';

        if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Mail::to($contactEmail)->send(new ContactEmail([
                'name'    => $name,
                'email'   => $email,
                'message' => $message,
            ]));

            return response()->json([
                'response' => 'Message was sent.',
                'status'   => 200,
            ], 200);
        } else {
            return response()->json([
                'response' => 'Invalid email address.',
                'status'   => 400,
            ], 400);
        }
    }
}