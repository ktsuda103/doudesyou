@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($words as $word)
                    <ul>
                        <li>
                            <a href="" class="lead">{{ $word['word'] }}</a>
                            <div>by{{ $word['person'] }}</div>
                            <div class="text-right">〜{{ $word['title'] }}より</div>
                        </li>
                        <hr>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
