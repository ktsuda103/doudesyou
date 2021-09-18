<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public function store($user_id,$word_id)
    {
        $this->user_id = $user_id;
        $this->word_id = $word_id;
        $this->save();
    }

    public function get_my_word_stock($word)
    {
        return $this->get_my_all_stock()->where('word_id',$word['id']);
    }

    public function get_my_all_stock()
    {
        $user_id = \Auth::id();
        return $this->where('user_id',$user_id);
    }
}
