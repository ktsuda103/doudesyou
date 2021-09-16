<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Word;
use App\models\User;
use App\models\Stock;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
        $user_id = \Auth::id();
        $posts = $this->get_post($id);
        $word = Word::where('status',0)->find($id);
        $stock = Stock::where('user_id',$user_id)->where('word_id',$word['id'])->first();
        if(!empty($word)){
            return view('detail_word',compact('word','posts','stock'));
        }else{
            return redirect()->route('home');
        }
    }

    private function get_post($id)
    {
        $posts = User::join('posts','users.id','=','posts.user_id')->where('posts.word_id','=',$id)->get();
        return $posts;
    }

}
