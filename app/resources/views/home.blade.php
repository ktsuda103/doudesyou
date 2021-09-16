@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="" class="form-group form-inline">
                <select name="title" id="" class="form-control">
                    @foreach($titles as $title)
                        <option value="">{{ $title }}</option>
                    @endforeach
                </select>
                <select name="person" id="" class="form-control">
                    @foreach($persons as $person)  
                        <option value="">{{ $person }}</option>
                    @endforeach
                </select>
                <input type="submit" value="検索" class="btn btn-success">
            </form>
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
                            <a href="{{ route('detail_word',['id'=>$word->id]) }}" class="lead">{{ $word['word'] }}</a>
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
