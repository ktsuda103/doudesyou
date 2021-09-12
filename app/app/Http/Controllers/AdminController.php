<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WordFormRequest;
use App\Models\word;

class AdminController extends Controller
{
    
    public function admin()
    {
        return view('admin');
    }

    public function store(WordFormRequest $request)
    {
        if(empty($errors)){
            $word = new Word();
            $word->word = $request->input('word');
            $word->content = $request->input('content');
            $word->title = $request->input('title');
            $word->person = $request->input('person');
            $word->save();
            return redirect()->route('admin')->with('success','名言を登録しました。');
        }
    }
}
