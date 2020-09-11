@extends('layouts.app')　

@section('content')
<div class="container">
    <input type="search" name="area" placeholder="地域を検索する">
    <button type="submit" class="area-search">検索</button>
    <a href="{{ route('foods.create') }}">新規投稿</a>
    <div class="row mb-5 justify-content-center">
        @foreach ($foods as $food)
        <div class="col-md-6 col-xl-3 mb-5 text-center mx-auto">
          <a href="{{ route('foods.show',$food->id) }}">
            <div class="card">
              <img src="{{ $food->image_name }}" class="card-img-top" alt="商品画像">
              <div class="card-body">
                <h5 class="card-title">商品名：{{ $food->name }}</h5>
                <p class="card-text">引取時間：{{ $food->trading_time }}</p>
                <p class="card-text">{{ $food->price }}円→{{ $food->discount_price }}円</p>
                <p class="card-text">クーポン{{ $food->coupon }}枚</p>
              </div>
            </div>

          </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
