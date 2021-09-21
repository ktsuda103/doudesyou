<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Word;
use App\models\User;
use App\models\Stock;
use RakutenRws_Client;

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
        $word = Word::where('status',0)->find($id);
        $count_stocks = $stock_model->count_stock();
        $items = $this->get_rakuten_items($word['title']);
        //dd($items);
        $stock = $stock_model->get_my_word_stock($word)->first();
        if(!empty($word)){
            return view('detail_word',compact('word','posts','stock','items','count_stocks'));
        }else{
            return redirect()->route('home');
        }
    }

    private function get_post($id)
    {
        $posts = User::join('posts','users.id','=','posts.user_id')->where('posts.word_id','=',$id)->get();
        return $posts;
    }

    public function get_rakuten_items($title)
    {
        $client = new RakutenRws_Client();

        define("RAKUTEN_APPLICATION_ID", config('app.rakuten_id'));

        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        $response = $client->execute('IchibaItemSearch',array(
            'keyword' => '水曜どうでしょう'.$title
        ));

        if(!$response->isOk()){
            return 'Error:'.$response->getMessage();
        } else {
            $items = [];
            foreach($response as $key => $rakutenItem){
                $items[$key]['title'] = $rakutenItem['itemName'];
                $items[$key]['price'] = $rakutenItem['itemPrice'];
                $items[$key]['itemUrl'] = $rakutenItem['itemUrl'];
                $items[$key]['review'] = $rakutenItem['reviewAverage'];

                if($rakutenItem['imageFlag']){
                    $imgSrc = $rakutenItem['mediumImageUrls'][0]['imageUrl'];
                    $items[$key]['img_src'] = preg_replace('/^http:/','https:',$imgSrc);
                }
            }
            return $items;
        }
    }

    public function user_policy()
    {
        return view('policy.user_policy');
    }

    public function privacy_policy()
    {
        return view('policy.privacy_policy');
    }
}
