<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $full_name;
    public $email;
    public $message_text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($full_name, $email, $message_text)
    {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->message_text = $message_text;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $senderEmail = $this->email;
        $senderName = $this->full_name;
        return $this->from($senderEmail, $senderName)
            ->subject("New message from " . $this->full_name)
            ->view("mail.sendMail")
            ->with([
                'full_name' => $this->full_name,
                'email' => $this->email,
                'message_text' => $this->message_text
            ]);
    }
}
