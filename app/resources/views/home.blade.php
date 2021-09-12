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
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @foreach($words as $word)
                    <ul>
                        <li>
                            <a href="" class="lead">{{ $word['word'] }}</a>
                            @if($user['id'] === 1)
                            <a href="{{ route('edit',['id' => $word->id]) }}"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('delete') }}" method="post" class="d-inline">
                            @csrf
                                <input type="hidden" name="id" value="{{ $word['id'] }}">
                                <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                            @endif
                            <div>by{{ $word['person'] }}</div>
                            <div class="text-right">〜{{ $word['title'] }}</div>
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
