<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactSendmail;

class ContactController extends Controller
{
    public function index_contact()
    {
        return view('contact.index_contact');
    }

    public function confirm_contact(ContactFormRequest $request)
    {
        $contact = $request->all();
        return view('contact.confirm_contact',compact('contact'));
    }

    public function thanks_contact(ContactFormRequest $request)
    {
        $contact = $request->all();
        //$contact_sendmail = new ContactSendmail($contact);
        \Mail::to('k.tsuda.103@gmail.com')->send(new ContactSendmail($contact));
        $request->session()->regenerateToken();
        return view('contact.thanks_contact');
    }
}
