<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MessageSent;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    //
      /**
     * Display the create form resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
    
        return view("contact");
    }

      /**
     * Send the email.
     * 
     * @return \Illuminate\Http\Response
     */
    public function store ()
    {
        
        Mail::to('elenavselena@gmail.com')->send(new MessageSent());
        return view("contact");
    }

}
