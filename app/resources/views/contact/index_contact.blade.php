@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">お問い合わせ</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('confirm_contact') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-9">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-md-3 col-form-label text-md-right">カテゴリー</label>

                            <div class="col-md-9">
                                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">選択してください</option>
                                    <option value="DoudesyouSelectionの内容について">DoudesyouSelectionの内容について</option>
                                    <option value="不具合について">不具合について</option>
                                    <option value="その他">その他</option>
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-md-3 col-form-label text-md-right">お問い合わせ内容</label>
                            <div class="col-md-9">
                                <textarea id="contact" class="form-control  @error('contact') is-invalid @enderror" name="contact" cols="30" rows="10"></textarea>

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    お問い合わせ内容の確認へ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
