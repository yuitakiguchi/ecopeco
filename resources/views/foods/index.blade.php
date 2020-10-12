@extends('layouts.app')

@section('content')
@if (Auth::user()->authority_id === \App\User::AUTHORITY_USER)
<div class="index-food-user">
    <div class="container">
        <form action="{{ url('/foods') }}" method="GET">
            <input class="w-50 p-2" type="text" name="keyword" placeholder="地域を検索する" value="{{ $keyword }}">
            <button type="submit" class="area-search btn btn-primary">検索</button>
        </form>
        @if ($keyword)
        @if($area && $area->users())
        <p class="search-results">検索結果</p>
        <div class="row mb-5 justify-content-center">
            @foreach ($area->users as $user)
            @foreach ($user->foods as $food)
            @if($food->trading_date <= \Carbon\Carbon::today())
            @continue
            @endif
            <div class="col-md-6 col-xl-3 mb-5 text-center mx-auto">
                <a href="{{ route('foods.show',$food->id) }}">
                    <div class="card">
                        <div class="card-header">{{ $food->user->name }}</div>
                        <div class="card-body">
                            <img src="{{ $food->image_name }}" class="card-img-top" alt="商品画像">
                            <h5 class="card-title">{{ $food->name }}</h5>
                            <p class="card-text">引取日：{{ $food->trading_date }}</p>
                            <p class="card-text">引取時間：{{ $food->trading_time }}</p>
                            <p class="card-text">{{ $food->price }}円→{{ $food->discount_price }}円</p>
                            <p class="card-text">クーポン{{ $food->coupon }}枚</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endforeach
        </div>
        @else
        <p class="not-found">見つかりませんでした。</p>
        @endif
        @else
        <div class="row mb-5 justify-content-center">
            @foreach ($foods as $food)
            <div class="col-md-6 col-xl-3 mb-5 text-center mx-auto">
                <a href="{{ route('foods.show',$food->id) }}">
                    <div class="card">
                        <div class="card-header">{{ $food->user->name }}</div>
                        <div class="card-body">
                            <img src="{{ $food->image_name }}" class="card-img-top" alt="商品画像">
                            <h5 class="card-title">{{ $food->name }}</h5>
                            <p class="card-text">引取日：{{ $food->trading_date }}</p>
                            <p class="card-text">引取時間：{{ $food->trading_time }}</p>
                            <p class="card-text">{{ $food->price }}円→{{ $food->discount_price }}円</p>
                            <p class="card-text">クーポン{{ $food->coupon }}枚</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@else
<div class="index-food-company">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('foods.index') }}">TOP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.histories.company', Auth::user()->id) }}">出品履歴</a>
        </li>
    </ul>
    <div class="container">
        <a href="{{ route('foods.create') }}">新規投稿</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.flash')
            </div>
        </div>
        <h5>出品中商品一覧</h5>
        @foreach ($companyFoods as $companyFood)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <a href="{{ route('foods.show', $companyFood->id) }}"><img
                                        src="{{ $companyFood->image_name }}" alt="商品の写真"></a>
                                <p class="card-text">商品名：{{ $companyFood->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-center">
                                    @foreach ($companyFood->bookings as $booking)
                                    <div class="card col-md-8 text-center">
                                        <div class="card-body">
                                            <p class="card-text">
                                                {{ $booking->user->name }}<br>クーポン利用{{ $booking->count }}枚<br>予約時刻{{ $booking->created_at }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <form action="{{ route('bookings.update', $booking) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            @if($booking -> is_sold === 0)
                                            <input type="submit" value="予約中" class="btn btn-primary ">
                                            @else
                                            <input type="submit" value="購入済み" class="btn btn-danger ">
                                            @endif
                                        </form>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <a class="btn btn-primary btn-lg btn-block"
                                href="{{ route('foods.edit', $companyFood->id) }}">この商品の情報を編集する</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
