<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

     public $name;
     public $email;
     public $subject;
     public $message;
    public function __construct($name,$email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('emails.contact_us')
                  ->with([
                          'name' => $this->name,
                          'subject' => $this->subject,
                          'message' => $this->message,
                      ]);
    }
}
