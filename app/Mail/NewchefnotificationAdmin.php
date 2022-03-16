<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewchefnotificationAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $chefaddress;
    public function __construct($user,$chefaddress)
    {
         $this->user = $user;
         $this->chefaddress = $chefaddress;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $fullname =$this->user->fullname;
        
        return $this->subject('New Chef Created')
                     ->from('admin@pepelechef.com','Pepe Le Chef')
                     ->markdown('emails.newchefnotification-admin');
    }
}
