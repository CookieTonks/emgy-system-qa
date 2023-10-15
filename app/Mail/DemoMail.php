<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $orden;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData, $orden)
    {
        $this->mailData = $mailData;
        $this->orden = $orden;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notificacion del sistema')
            ->view('emails.notificacion');
    }
}
