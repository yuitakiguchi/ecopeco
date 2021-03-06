@extends('layouts.app')
@section('content')
@if (Auth::user()->authority_id === \App\User::AUTHORITY_COMPANY)
<div class="wrapper">
    <div class="edit-user-company">
        <img class="edit-user-company2 d-none  d-xl-inline-block" src="../../images/edit-user-company2.png">
        <img class="edit-user-company1 d-none  d-xl-inline-block" src="../../images/edit-user-company1.png">
        <div class="container">
            <div class="row justify-content-center">
                <h1>account setting</h1>
                <div class="col-md-7">
                    <img class="edit-user3  d-xl-inline-block" src="../../images/edit-user3.png">
                    @include('layouts.flash')
                    <form action="{{ route('companies.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="card text-center py-5">
                            <h2>※入力情報は商品ページ等に掲載されます。</h2>
                            <div class="card-image form-group mx-auto my-5">
                                <label for="exampleFormControlFile1"></label>
                                <input type="file" class="form-control-file" id="image-name" name="image-name" value="画像を変更する">
                            </div>

                            <div class="row justify-content-center text-center">
                                <div class="card-name col-md-8">
                                    <label for="name" class="col-md-4 col-form-label">店舗名</label>
                                    <input type="text" name="name" value="{{ $user->name }}">
                                </div>

                                <div class="card-phone-number col-md-8">
                                    <label for="phone-number" class="col-md-4 col-form-label">電話番号</label>
                                    <input type="text" name="phone_number" value="{{ $user->phone_number }}">
                                </div>

                                <div class="card-email col-md-8">
                                    <label for="email" class="col-md-4 col-form-label">メールアドレス</label>
                                    <input type="text" name="email" value="{{ $user->email }}">
                                </div>

                                <div class="card-address col-md-8">
                                    <label for="address" class="col-md-4 col-form-label">住所</label>
                                    <input type="text" name="address" value="{{ $user->address }}">
                                </div>

                                <div class="card-hp_url col-md-8">
                                    <label for="hp_url" class="col-md-4 col-form-label">ホームページ</label>
                                    <input type="text" name="hp_url" value="{{ $user->hp_url }}">
                                </div>
                            </div>

                            <div class="card-area_id mt-5">
                                <p>最寄駅<br><small>※最大３駅まで登録可能です。</small></p>
                                <input type="text" list="names-list" id="authors" value="" size="20" name="areas[]" placeholder="〇〇駅" required>
                                <datalist id="names-list">
                                    @foreach($areas as $area)
                                        <option value="{{ $area->name }}">
                                    @endforeach
                                </datalist>
                                <input type="text" list="names-list" id="authors" value="" size="20" name="areas[]" placeholder="〇〇駅">
                                <input type="text" list="names-list" id="authors" value="" size="20" name="areas[]" placeholder="〇〇駅">
                            </div>

                            <div class="card-introduction mt-5">
                                <p>店舗紹介文</p>
                                <textarea name="introduction" cols="50" rows="5" maxlength="150">{{ $user->introduction }}</textarea>
                            </div>
                            
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="edit-user">
            <img class="edit-user2 d-none  d-xl-inline-block" src="../../images/edit-user2.png">
            <img class="edit-user1 d-none  d-xl-inline-block" src="../../images/edit-user1.png">
            <div class="container">
                <div class="row justify-content-center">
                    <h1 class="text-center">account setting</h1>
                    <div class="col-md-6">
                        <img class="edit-user3  d-xl-inline-block" src="../../images/edit-user3.png">
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
                                <button type="submit" class="btn btn-primary">更新</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endif
@endsection

