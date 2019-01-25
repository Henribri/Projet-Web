<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $tuteur_name;
    public $tuteur_surname;
    public $type;
    public $name_type;

    public function __construct($tuteur_name, $tuteur_surname, $type, $name_type)
    {
        //
        $this->tuteur_name=$tuteur_name;
        $this->tuteur_surname=$tuteur_surname;
        $this->type=$type;
        $this->name_type=$name_type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Un tuteur a notifié une information !')->view('emails.Notif');
    }
}
