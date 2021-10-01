<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_stock()
    {
        $stock_model = new Stock();
        $stocks = $stock_model->get_my_all_stock()->join('words','words.id','=','stocks.word_id')->get();
        return view('index_stock',compact('stocks'));
    }

    public function store_stock(Request $request)
    {
        $user_id = \Auth::id();
        $word_id = $request->input('id');
        $stock_model = new Stock();
        $my_stock = $stock_model->get_my_word_stock($word_id)->first();
        if(empty($my_stock)){
        $stock_model->store($user_id,$word_id);
        }else{
            return redirect()->route('detail_word',['id'=>$word_id])->with('success', 'すでにストックされています。');
        }
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
