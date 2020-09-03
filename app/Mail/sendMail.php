<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $message;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void 
     */
    public function __construct($data)
    {
        $this->message = $data['message'];
        $this->name=$data['name'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Employee ADD')->view('mail.sendMail');
    }
}
