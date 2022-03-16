<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DishRejected extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $dish;
    public function __construct($dish)
    {
        $this->dish = $dish;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        $name      =   $this->dish['user']['first_name'];
        $message="Your dish approval status is pending.Please contact support@pepelechef.com ";
            return $this->subject('Dish rejected - PEPE LE CHEF ')
                        ->from('support@pepelechef.com','Pepe Le Chef')
                        ->markdown('emails.dish-rejected',compact('name','message'));
    }
}
