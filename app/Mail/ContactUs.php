<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $name            =   $this->data['name'];
        $phone           =   $this->data['phone'];
        $email           =    $this->data['email'];
        $message         =    $this->data['message'];

        // return $this->markdown('emails.contactus');
         return $this->subject('Contact Form - Pepe Le Chef')
                ->from('support@pepelechef.com','Pepe Le Chef')
                ->markdown('emails.contactus',compact('name','phone','email','message'));
          
    }
}
