@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                @if($stocks->isEmpty())
                    <p>ストックはありません。</p>
                @else    
                    @foreach($stocks as $stock)
                    <ul>
                        <li>
                            <a href="{{ route('detail_word',['id'=>$stock->word_id]) }}" class="lead">{{ $stock['word'] }}</a>
                            <div>by{{ $stock['person'] }}</div>
                            <div class="text-right">〜{{ $stock['title'] }}</div>
                        </li>
                        <hr>
                    </ul>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
