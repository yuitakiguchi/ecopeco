@extends('layouts.app')　
@section('content')
@if (Auth::user()->authority_id === 1)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('companies.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="card text-center">

                <div class="card-image">
                    <label for="exampleFormControlFile1"></label>
                    <input type="file" class="form-control-file" id="image-name" name="image-name" value="画像を変更する">
                </div>

                <div class="card-name">
                    <p>店舗名</p>
                    <input type="text" name="name" value="{{ $user->name }}">
                </div>

                <div class="card-phone-number">
                    <p>電話番号</p>
                    <input type="text" name="phone_number" value="{{ $user->phone_number }}">
                </div>

                <div class="card-email">
                    <p>メールアドレス</p>
                    <input type="text" name="email" value="{{ $user->email }}">
                </div>

                <div class="card-address">
                    <p>住所</p>
                    <input type="text" name="address" value="{{ $user->address }}">
                </div>

                <div class="card-hp_url">
                  <p>ホームページ</p>
                  <input type="text" name="hp_url" value="{{ $user->hp_url }}">
                </div>

                <div class="card-area_id">
                    <p>最寄駅</p>
                    <p><small>※最大３駅まで登録可能です。</small></p>
                      <input type="text" list="names-list" id="authors" value="" size="50" name="areas[]" placeholder="〇〇駅" required>
                      <datalist id="names-list">
                        @foreach($areas as $area)
                            <option value="{{ $area->name }}">
                        @endforeach
                      </datalist>
                      <input type="text" list="names-list" id="authors" value="" size="50" name="areas[]" placeholder="〇〇駅">
                      <input type="text" list="names-list" id="authors" value="" size="50" name="areas[]" placeholder="〇〇駅">


                </div>

                <div class="card-introduction">
                    <p>店舗紹介文</p>
                    <textarea name="introduction" cols="30" rows="10" maxlength="150">{{ $user->introduction }}</textarea>
                </div>

                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">更新</button>
                </div>

            </div>
          </form>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="card text-center">

                <div class="card-name">
                    <p>名前</p>
                    <input type="text" name="name" value="{{ $user->name }}">
                </div>

                <div class="card-email">
                    <p>メールアドレス</p>
                    <input type="text" name="email" value="{{ $user->email }}">
                </div>
                </div>

                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">更新</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endif
@endsection
