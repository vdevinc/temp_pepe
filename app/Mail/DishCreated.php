<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DishCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $dish;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        return $this->subject('New Dish submited')
                     ->from('admin@pepelechef.com','Pepe Le Chef')
                     ->markdown('emails.dish-created');
    }
}
