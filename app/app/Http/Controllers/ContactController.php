<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactSendmail;

class ContactController extends Controller
{
    public function index_contact()
    {
        return view('index_contact');
    }

    public function confirm_contact(ContactFormRequest $request)
    {
        $contact = $request->all();
        return view('confirm_contact',compact('contact'));
    }

    public function thanks_contact(ContactFormRequest $request)
    {
        $contact = $request->all();
        //$contact_sendmail = new ContactSendmail($contact);
        \Mail::to($contact['email'])->send(new ContactSendmail($contact));
        $request->session()->regenerateToken();
        return view('thanks_contact');
    }
}
