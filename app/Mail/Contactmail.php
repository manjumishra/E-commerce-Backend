<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contactmail extends Mailable
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
        //
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
          $data=$this->data;
        return $this->from('example@example.com', 'Example')
                ->view('Contactmail')->with([
                    'email'=>$data['email'],
                    'phonenumber' => $data['phonenumber'],
                      'message'=>$data['message'],
                     
        ]);
    }
}
