@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                            <a href="{{ route('detail_word',['id'=>$word->id]) }}" class="lead">{{ $word['word'] }}</a>
                            @auth
                                @if(!empty($stock))
                                    <form class="d-inline" action="{{ route('delete_stock') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $stock->id }}">
                                        <input type="hidden" name="word_id" value="{{ $word->id }}">
                                        <button class="btn" type="submit"><i class="far fa-star"></i></button>
                                    </form>
                                @else
                                    <form class="d-inline" action="{{ route('store_stock') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $word->id }}">
                                        <button class="btn" type="submit"><i class="fas fa-star star"></i></button>
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
                    @if(empty($posts))
                        コメントはありません
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
                            <input id="post" name="post" type="text" class="form-control">
                            <input type="submit" value="送信" class="btn btn-primary">
                            @endguest
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection