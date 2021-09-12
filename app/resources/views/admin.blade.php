@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">管理画面</div>
                <div class="card-body form-group">
                    <form action="" method="post">
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
                        <input type="submit" value="登録" class="btn btn-primary">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection