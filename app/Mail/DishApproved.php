<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DishApproved extends Mailable
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
       $name               =   $this->dish['user']['full_name'];

        $message="Congratulations! Your dish is ready to rake in the dough! ";
              
        return $this->subject('Dish Approved By Pepe Le Chef')
                ->from('admin@pepelechef.com','Pepe Le Chef')
                ->markdown('emails.dish-approved',compact('name','message'));
                
    }
}
