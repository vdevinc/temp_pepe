<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChefApproved extends Mailable
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
      
        $user_id            =   $this->chef['id'];
        $name               =   $this->chef['full_name'];

        $pdfpath=public_path("uploads"). "/user/".$user_id."/agreement.pdf";
       
        return $this->subject('Chef approved - Pepe Le Chef')
                ->from('support@pepelechef.com','Pepe Le Chef')
                ->markdown('emails.chef-approved',compact('name'))
                ->attach($pdfpath, [
                   'as' => 'agreement.pdf',
                   'mime' => 'application/pdf'
        ]);
        
        
    }

}
