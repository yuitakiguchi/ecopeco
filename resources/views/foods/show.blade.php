@extends('layouts.app')

@section('content')
@if (Auth::user()->authority_id === \App\User::AUTHORITY_COMPANY)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.flash')
                <div class="card-header">
                    <h5>{{ $food->user->name }}</h5>
                </div>
                <div class="row justify-content-center">
                    <div class="card-body">
                        <div class="col-md-4">
                            <img src="{{ $food->image_name }}" alt="商品の写真">
                        </div>
                    </div>
                        <div class="col-md-4">
                            <p class="card-text">商品名：{{ $food->name }}</p>
                            <p class="card-text">取引日：{{ $food->trading_date }}</p>
                            <p class="card-text">引取終了時間：{{ $food->trading_time }}</p>
                            <p class="card-text">{{ $food->price }}円→{{ $food->discount_price }}円</p>
                            <p class="card-text">クーポン：{{ $food->coupon }}枚</p>
                        </div>
                    </div>
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('foods.edit', $food->id) }}">商品の編集</a>
                <form action='{{ route('foods.destroy', $food->id) }}' method='post'>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type='submit' value='削除' class="btn btn-secondary btn-lg btn-block" onclick='return confirm("削除しますか？？");'>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="show-food-user">
        <img class="show-food-user2 d-none  d-xl-inline-block" src="../../images/show-food-user2.png">
        <img class="show-food-user3 d-none  d-xl-inline-block" src="../../images/show-food-user3.png">
        <img class="show-food-user4 d-none  d-xl-inline-block" src="../../images/show-food-user4.png">
        <img class="show-food-user5 d-none  d-xl-inline-block" src="../../images/show-food-user5.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    {{-- @include('layouts.flash') --}}
                        <h5>{{ $food->user->name }}</h5>
                    <div class="row justify-content-center">
                        <div class="card-body">
                            <img class="post-image" src="{{ $food->image_name }}" alt="商品の写真">
                            <img class="above-post-image d-none  d-xl-inline-block" src="../../images/show-food-user1.png">
                        </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th scope="row">商品名</th>
                                        <td>{{ $food->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">引取日</th>
                                        <td>{{ $food->trading_date }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">引取終了時間</th>
                                        <td>{{ $food->trading_time }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">定価：{{ $food->price }}円</th>
                                        <td>値引後：{{ $food->discount_price }}円</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">クーポン</th>
                                        <td>{{ $food->coupon }}枚</td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                    @if($isReserved)
                        <form class="text-center" action="{{ route('unreservations', $food) }}" method="POST">
                            @csrf
                            <p class="invisible">購入数を選択</p>
                            <div class="form-group invisible">
                                <select class="form-control mx-auto" name="count">
                                    @for ($i = 1; $i <= $food->coupon; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <input type="submit" value="クーポンを取り消す" class="btn btn-danger" onclick='return confirm("取り消しますか？");'>
                        </form>
                    @else
                        <form class="text-center" action="{{ route('reservations', $food) }}" method="POST">
                            @csrf
                            <p>購入数を選択</p>
                            <div class="form-group">
                                <select class="form-control mx-auto" name="count">
                                    @for ($i = 1; $i <= $food->coupon; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <input type="submit" value="クーポンを使用する" class="btn btn-primary" onclick='return confirm("クーポンを使用しますか？");'>
                        </form>
                    @endif
                    <h5>店舗詳細</h5>
                    <div class="row justify-content-center">
                        <div class="card-body">
                            <img class="shop-img" src="{{ $food->user->image_name }}" alt="店舗写真">
                            <img class="above-shop-img d-none  d-xl-inline-block" src="../../images/show-food-user1.png">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>店舗紹介</th>
                                        <td>{{ $food->user->introduction }}</td>
                                    </tr>
                                    <tr>
                                        <th>最寄駅</th>
                                        <td>
                                            @foreach($food->user->areas as $area)
                                                {{ $area->name }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>店舗HP</th>
                                        <td>{{ $food->user->hp_url }}</td>
                                    </tr>
                                    <tr>
                                        <th>電話番号</th>
                                        <td>{{ $food->user->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>住所</th>
                                        <td>{{ $food->user->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-center map">
                        <div class="col-md-12">
                            <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key={{ config('services.google-map.apikey') }}&amp;q={{ $food->user->address }}'
                                width='100%'
                                height='320'
                                frameborder='0'>
                            </iframe>
                        </div>
                    </div>
                    <h5>{{ $food->user->name }}その他クーポン</h5>
                    <div class="row justify-content-center">
                        @foreach ($companyFoods as $companyFood)
                            <div class="col-md-4 mb-5 text-center mx-auto">
                                <a href="{{ route('foods.show',$companyFood->id) }}">
                                    <div class="card">
                                        <img src="{{ $companyFood->image_name }}" class="card-img-top" alt="商品画像">
                                        <div class="card-body">
                                            <h4 class="card-name">{{ $companyFood->name }}</h4>
                                            <p class="card-text">引取日：{{ $companyFood->trading_date }}</p>
                                            <p class="card-text">引取時間：{{ $companyFood->trading_time }}</p>
                                            <p class="card-text">{{ $companyFood->price }}円→{{ $companyFood->discount_price }}円</p>
                                            <p class="card-text">クーポン{{ $companyFood->coupon }}枚</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

