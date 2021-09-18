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
        $words = $word_model->get_word()->get();
        return view('home',compact('words'));
    }

    public function search(Request $request)
    {
        $title = $request->input('title');
        $person = $request->input('person');
        if($title === null && $person === null){
            return redirect()->route('home')->with('errors','キーワードを選択してください。');
        }
        $word_model = new Word();
        $words = $word_model->search($title,$person);
        return view('home',compact('words'));
    }

    

    public function detail_word($id)
    {
        $stock_model = new Stock();
        $posts = $this->get_post($id);
        //dd($posts);
        $word = Word::where('status',0)->find($id);
        $stock = $stock_model->get_my_word_stock($word)->first();
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
