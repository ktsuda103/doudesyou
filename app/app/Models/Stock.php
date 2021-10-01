<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Stock extends Model
{
    use HasFactory;

    public function store($user_id,$word_id)
    {
        $this->user_id = $user_id;
        $this->word_id = $word_id;
        $this->save();
    }

    public function get_my_word_stock($word_id)
    {
        return $this->get_my_all_stock()->where('word_id',$word_id);
    }

    public function get_my_all_stock()
    {
        $user_id = \Auth::id();
        return $this->where('user_id',$user_id);
    }

    public function count_stock()
    {
        $count_stock = DB::table('stocks')
        ->join('words','stocks.word_id','=','words.id')
        ->select('words.word','words.id',DB::raw("count(*) as cnt"))
        ->groupBy('words.word')
        ->groupBy('words.id')
        ->orderBy('cnt','DESC')
        ->limit(3)
        ->get();

        return $count_stock;
    }
}
