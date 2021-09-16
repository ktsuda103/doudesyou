<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function store_stock(Request $request)
    {
        $user_id = \Auth::id();
        $word_id = $request->input('id');
        $stock_model = new Stock();
        $stock_model->store($user_id,$word_id);

        return redirect()->route('detail_word',['id'=>$word_id])->with('success', 'ストックしました。');
    }

    public function delete_stock(Request $request)
    {
        $id = $request->input('id');
        $word_id = $request->input('word_id');
        Stock::where('id',$id)->delete();
        return redirect()->route('detail_word',['id'=>$word_id])->with('success','ストックを解除しました。');
    }

    
}
