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
        $stock_model->user_id = $user_id;
        $stock_model->word_id = $word_id;
        $stock_model->save();

        return redirect()->route('home')->with('success', 'ストックしました。');
    }
}
