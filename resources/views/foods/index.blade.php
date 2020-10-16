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
                                <div class="col">
                                    <img class="product-image" src="{{ $food->image_name }}" alt="商品画像">
                                </div>
                                <h5 class="card-title">{{ $food->name }}</h5>
                                <p class="card-text">引取日：{{ \Carbon\Carbon::parse($food->trading_date)->format("Y年n月j日") }}</p>
                                <p class="card-text">引取時間：{{ \Carbon\Carbon::parse($food->trading_time)->format("H時i分") }}</p>
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
        <div class="row pb-5 justify-content-center">
            @foreach ($foods as $food)
            <div class="col-md-6 col-xl-3 mb-5 text-center mx-auto">
                <a href="{{ route('foods.show',$food->id) }}">
                    <div class="card">
                        <div class="card-header">{{ $food->user->name }}</div>
                        <div class="card-body">
                            <div class="col">
                                <img src="{{ $food->image_name }}" class="product-image" alt="商品画像">
                            </div>
                            <h5 class="card-title">{{ $food->name }}</h5>
                            <p class="card-text">引取日：{{ \Carbon\Carbon::parse($food->trading_date)->format("Y年n月j日") }}</p>
                            <p class="card-text">引取時間：{{ \Carbon\Carbon::parse($food->trading_time)->format("H時i分") }}</p>
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
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('foods.create') }}">
                        <div class="card">投稿</div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('foods.index') }}">TOP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.histories.company', Auth::user()->id) }}">出品履歴</a>
                        </li>
                    </ul>
                    @include('layouts.flash')
                    <h1>{{ Auth::user()->name }}出品中商品一覧</h1>
                    @foreach ($companyFoods as $companyFood)
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <nav class="navbar navbar-expand-md shadow-sm">
                                    <div class="container">
                                        <h2 class="navbar-brand">{{ $companyFood->name }}</h2>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                    
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <!-- Left Side Of Navbar -->
                                            <ul class="navbar-nav mr-auto"></ul>
                                            <!-- Right Side Of Navbar -->
                                            <ul class="navbar-nav ml-auto">
                                                <!-- Authentication Links -->
                                                <li class="nav-item dropdown">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        <i class="fas fa-edit"></i> <span class="caret"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="{{ route('foods.edit', $companyFood->id) }}">編集</a>
                                                        <form class="dropdown-item" action='{{ route('foods.destroy', $companyFood->id) }}' method='post'>
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <input type='submit' value='削除' class="delete" onclick='return confirm("削除しますか？？");'>
                                                        </form> 
                                                    </div> 
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>

                                <div class="card-body">
                                    <h3 crass="text-center">予約者一覧</h3>
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <img class="img-fluid" src="{{ $companyFood->image_name }}" alt="商品の写真">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row justify-content-center">
                                                @foreach ($companyFood->bookings as $booking)
                                                <div class="card col-md-8 text-center">
                                                    <div class="reservation-card-body">
                                                        <div class="row justify-content-center">
                                                            <p>{{ $booking->user->name }}</p>
                                                            <p class="coupon">{{ $booking->count }}枚</p>
                                                        </div>
                                                        <p>予約時刻{{ \Carbon\Carbon::parse($booking->created_at)->format("H時i分") }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{ route('bookings.update', $booking) }}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        @if($booking -> is_sold === 0)
                                                        <input type="submit" value="予約中" class="btn btn-secondary mt-4">
                                                        @else
                                                        <input type="submit" value="購入済み" class="btn purchased mt-4">
                                                        @endif
                                                    </form>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
