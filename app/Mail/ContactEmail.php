<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $from_email;
    public $name;
    public $message_text;
    public $subject;
    public $is_msg_html;

    public function __construct($from, $name, $message, $subject, $is_html = 0)
    {
        //
        $this->from_email = $from;
        $this->name = $name;
        $this->is_msg_html = $is_html;
        $this->message_text = $message;
        $this->subject($subject);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact_template');
    }
}
