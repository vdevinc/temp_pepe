<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheficaSignup extends Mailable
{
    use Queueable, SerializesModels;
    public $chef;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($chef)
    {
        $this->chef = $chef;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('Independent Contractors Agreement - Pepe Le Chef')
                    ->from('support@pepelechef.com','Pepe Le Chef')
                    ->markdown('emails.chef-icasignup');
    }
}
