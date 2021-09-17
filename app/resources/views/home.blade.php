@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('errors'))
                <div class="alert alert-danger" role="alert">
                    {{ session('errors') }}
                </div>
            @endif
            <form action="{{ route('search') }}" method="post" class="form-group form-inline">
                @csrf
                <select name="title" id="" class="form-control">
                    <option value="">選択してください</option>
                    <option value="夏野菜スペシャル">夏野菜スペシャル</option>
                    <option value="ヨーロッパ・リベンジ">ヨーロッパ・リベンジ</option>
                    <option value="マレーシアジャングル探検">マレーシアジャングル探検</option>
                    <option value="東北２泊３日生き地獄ツアー">東北２泊３日生き地獄ツアー</option>
                    <option value="四国八十八ヶ所Ⅱ">四国八十八ヶ所Ⅱ</option>
                    <option value="原付東日本縦断ラリー">原付東日本縦断ラリー</option>
                    <option value="リヤカーで喜界島一周">リヤカーで喜界島一周</option>
                    <option value="ヨーロッパ２０カ国完全制覇">ヨーロッパ２０カ国完全制覇</option>
                    <option value="原付日本列島制覇">原付日本列島制覇</option>
                    <option value="ヨーロッパ２０カ国完全制覇">ヨーロッパ２０カ国完全制覇</option>
                    <option value="日本全国絵はがきの旅２">日本全国絵はがきの旅２</option>
                    <option value="ジャングル・リベンジ">ジャングル・リベンジ</option>
                    <option value="ヨーロッパ２１カ国完全制覇">ヨーロッパ２１カ国完全制覇</option>
                </select>
                <select name="person" id="" class="form-control">
                    <option value="">選択してください</option>
                    <option value="大泉洋">大泉洋</option>
                    <option value="鈴井貴之">鈴井貴之</option>
                    <option value="藤村忠寿">藤村忠寿</option>
                    <option value="嬉野雅道">嬉野雅道</option>
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
