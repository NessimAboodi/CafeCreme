<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Cette variable contiendra les infos du formulaire

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Nouveau message - Café Crème')
            ->view('emails.contact'); // On définit la vue de l'email
    }
}
