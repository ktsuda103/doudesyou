<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_contact()
    {
        return view('index_contact');
    }

    public function confirm_contact()
    {

    }

    public function thanks_contact()
    {

    }
}
