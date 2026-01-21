<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Contiendra les infos du formulaire de réservation

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Nouvelle demande de réservation - Café Crème')
            ->view('emails.reservation'); // On définit la vue de l'email
    }
}
