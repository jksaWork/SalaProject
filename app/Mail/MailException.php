<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\CssSelector\Node\FunctionNode;

class MailException extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message,$file,$line,$trace;
    public function __construct($message , $file, $line)
    {
        $this->message = $message;
        $this->file = $file;
        $this->line = $line;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.exception');
        // ->subject('Salla Exception Occuerd');
    }
}
