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
    public $ex , $user , $id;
    public function __construct($ex)
    {
        $this->ex = $ex;
        info('inside exception' . $ex);
        $this->user = auth()->user()->name ?? 'anymouse';
        $this->id = auth()->user()->id ?? 'anymouse id';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.exception')
        ->subject('Salla Exception Occuerd');
    }
}
