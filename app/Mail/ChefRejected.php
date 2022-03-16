<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChefRejected extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $chef;
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
        $name               =   $this->chef['full_name'];
        $message="Registration rejected by admin. Please contact support@pepelechef.com ";
            return $this->subject('Chef rejected - PEPE LE CHEF ')
                        ->from('support@pepelechef.com','Pepe Le Chef')
                        ->markdown('emails.chef-rejected',compact('name','message'));
    }
}
