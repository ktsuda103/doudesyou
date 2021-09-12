@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">管理画面</div>
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body form-group">
                    <form action="{{ route('store') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="word">名言:</label>
                            <input type="text" id="word" name="word" class="form-control">    
                        </div>
                        <div class="form-group">
                            <label for="content">説明文:</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>         
                        </div>
                        <div class="form-group">        
                            <label for="title">サブタイトル:</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="form-group">        
                            <label for="person">発言者:</label>
                            <input type="text" id="person" name="person" class="form-control">
                        </div>
                        <input type="submit" value="登録" class="btn btn-primary">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection