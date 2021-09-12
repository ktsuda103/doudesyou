<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function store_post(PostFormRequest $request)
    {
        $user = \Auth::user();
        $word_id = $request->input('id');
        if(empty($errors)){
            $post = new Post();
            $post->user_id = $user['id'];
            $post->word_id = $word_id;
            $post->post = $request->input('post');
            $post->save();
            return redirect()->route('detail_word',['id'=>$word_id])->with('success', 'コメントを投稿しました。');
        }
    }
}
