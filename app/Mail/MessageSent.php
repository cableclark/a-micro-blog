<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class MessageSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {   
        $data = $request-> validate([
              'name' => 'required',
              'email' => 'required|email',
              'title'=>'required',
              'body'=>'required'  
        ]);
            
        return  $this->from($request->input('email'))
            ->view('emails.message')
            ->with([
                'maildata' => $data
             ]);
    }
}
