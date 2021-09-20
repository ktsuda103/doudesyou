<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

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

    public function thanks_contact()
    {

    }
}
