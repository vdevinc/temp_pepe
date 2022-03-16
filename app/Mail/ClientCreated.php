<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $clientaddress;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client)
    {
        $this->client = $client;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Successfully registered as Client ')
                     ->from('support@pepelechef.com','Pepe Le Chef')
                     ->markdown('emails.client-created');
    }
}
