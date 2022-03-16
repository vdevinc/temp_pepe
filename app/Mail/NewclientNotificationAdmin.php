<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewclientNotificationAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $clientaddress;
    public function __construct($user)
    {
        $this->user= $user;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Client Created')
                     ->from('admin@pepelechef.com','Pepe Le Chef')
                     ->markdown('emails.newclientnotifcation-admin');
    }
}
