<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Product extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user_name;
    public $user_surname;


    public function __construct($user_name, $user_surname)
    {
        //
        $this->user_name=$user_name;
        $this->user_surname=$user_surname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Un utilisateur a acheté un produit !')->view('emails.Product');
    }
}

