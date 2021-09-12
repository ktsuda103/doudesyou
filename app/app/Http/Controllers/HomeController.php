<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Word;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $word_model = new Word();
        $words = $word_model->where('status',0)->get();
        return view('home',compact('words'));
    }

    public function detail_word($id)
    {
        $word = Word::find($id);
        return view('detail_word',compact('word'));
    }

}
