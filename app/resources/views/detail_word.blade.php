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
        </div>
    </div>
</div>


@endsection