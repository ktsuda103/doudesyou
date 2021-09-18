@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <ul>
                        <li>
                            <div class="d-flex justify-content-between">
                            <div class="lead word">｢{{ $word['word'] }}｣</div>
                            @auth
                                @if(!empty($stock))
                                    <form class="d-inline" action="{{ route('delete_stock') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $stock->id }}">
                                        <input type="hidden" name="word_id" value="{{ $word->id }}">
                                        <button class="btn" type="submit"><i class="far fa-star fa-2x"></i></button>
                                    </form>
                                @else
                                    <form class="d-inline" action="{{ route('store_stock') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $word->id }}">
                                        <button class="btn" type="submit"><i class="fas fa-star star fa-2x"></i></button>
                                    </form>
                                @endif
                            @endauth
                            </div>
                            <div>by{{ $word['person'] }}</div>
                            <div class="text-right">〜{{ $word['title'] }}</div>
                            
                        </li>
                    </ul>
                </div>
                <div class="card-body form-group">
                    {!! $word->content !!}
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    @if($posts->isEmpty())
                        <p>コメントはありません</p>
                    @else
                        @foreach($posts as $post)
                            <div class="row">
                                <div class="col-md-4">投稿者：{{ $post['name'] }} </div>
                                <div class="offset-md-4 small">{{ $post['created_at'] }}</div>
                                <div class="col-12 lead">{{ $post['post'] }}</div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                </div>
                <div class="card-footer">
                    <form action="{{ route('store_post') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $word['id'] }}">
                        <div class="form-group">
                            <label for="post">コメント</label>
                            @guest
                            <p>コメントするにはログインが必要です。</p>
                            @else
                            <textarea name="post" id="post" cols="30" rows="10" class="form-control"></textarea>
                            <input type="submit" value="送信" class="btn btn-primary">
                            @endguest
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(!empty($items))
        <div class="col-md-3">
                @for($i=0; $i<1; $i++)
                    <div class="card p-0">
                        <div class="card-header">参考商品</div>  
                        <div class="card-body text-center"> 
                            <img src="{{ $items[$i]['img_src'] }}" class="img-fluid d-block">                     
                            <a href="{{ $items[$i]['itemUrl'] }}" class="item_title">{{ $items[$i]['title'] }}</a>
                        </div>
                        <div class="card-footer">
                            <div>価格：{{ number_format($items[$i]['price']) }}円<div>   
                            @if($items[$i]['review'] > 0)
                            <div>レビュー評価:{{ $items[$i]['review'] }}点</div> 
                            @else
                            <div>レビューはありません</div>
                            @endif
                        </div>        
                    </div>
                @endfor
        </div>
        @endif
    </div>
</div>


@endsection