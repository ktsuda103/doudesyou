@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <ul>
                        <li>
                            <a href="{{ route('detail_word',['id'=>$word->id]) }}" class="lead">{{ $word['word'] }}</a>
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
                    コメントはありません
                </div>
                <div class="card-footer">
                    <form action="{{ route('store_post') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $word['id'] }}">
                        <div class="form-group">
                            <label for="post">コメント</label>
                            <input id="post" name="post" type="text" class="form-control">
                            <input type="submit" value="送信" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection