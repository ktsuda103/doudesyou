<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WordFormRequest;
use App\Models\word;

class AdminController extends Controller
{
    
    public function admin()
    {
        $user = \Auth::user();
        if($user['id'] === 1){
            return view('admin');
        }else{
            return redirect()->route('home');
        }
    }

    public function store(WordFormRequest $request)
    {
        if(empty($errors)){
            $word = new Word();
            $word->word = $request->input('word');
            $word->content = $request->input('content');
            $word->title = $request->input('title');
            $word->person = $request->input('person');
            $word->status = 0;
            $word->save();
            return redirect()->route('admin')->with('success','名言を登録しました。');
        }
    }

    public function edit($id)
    {
        $user = \Auth::user();
        if($user['id'] === 1){
            $word_model = new Word();
            $word = $word_model->find($id);
            return view('edit',compact('word'));
        }else{
            return redirect()->route('home');
        }
    }

    public function update(WordFormRequest $request){
        $id = $request->input('id');
        $word = Word::find($id);
        $word->word = $request->input('word');
        $word->content = $request->input('content');
        $word->title = $request->input('title');
        $word->person = $request->input('person');
        $word->status = 0;
        $word->save();
        return redirect()->route('home')->with('success','名言を更新しました。');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $word = Word::find($id);
        $word->status = 1;
        $word->save();
        return redirect()->route('home')->with('success','名言を削除しました。');
    }
}
