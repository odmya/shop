<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactUs;
use App\Models\Contact;

class ContactUsController extends Controller
{
    public function index(Request $request){
      return view('contact_us.index');
    }

    public function send(Request $request)
    {
      $this->validate($request, [
       'name' => 'required',
       'email' => 'required|email',
       'subject' => 'required',
       'message' => 'required',
     ]);

     $name = $request->input('name');
     $email = $request->input('email');
     $subject = $request->input('subject');
     $message = $request->input('message');

     $contact_list =Contact::get();

     //dd($contact_list);

     Mail::to($contact_list)->send(new ContactUs($name,$email,$subject,$message));

      return view('contact_us.send');
    }

}
