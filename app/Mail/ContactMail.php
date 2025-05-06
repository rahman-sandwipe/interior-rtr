<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $phone;
    public $userMessage;
    public $companyName;

    public function __construct($name, $email, $subject, $userMessage, $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->phone = $phone;
        $this->companyName = config('app.name');
        $this->userMessage = $userMessage;
    }

    public function build()
    {
        return $this->subject( $this->subject . ' | ' . config('app.name'))
                ->view('emails.contact');
    }
}
