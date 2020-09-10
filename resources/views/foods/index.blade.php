@extends('layouts.app')　

@section('content')
<div class="container">
  <input type="search" name="area" placeholder="地域を検索する">
  <button type="submit" class="area-search">検索</button>
  <a href="{{ route('foods.create') }}">新規投稿</a>
  <div class="row mb-5">
    @foreach ($foods as $food)
    <div class="col-md-4 mb-5">
	    <div class="card text-center">
			  <div class="card-header">
				  〇〇店
			  </div>
			  <div class="card-body">
				  <img src="" alt="商品写真">
				  <p class="card-text">商品名：{{ $food->name }}</p>
				  <p class="card-text">引取時間：{{ $food->trading_time }}</p>
				  <p class="card-text">{{ $food->price }}円→{{ $food->discount_price }}円</p>
				  <p class="card-text">クーポン{{ $food->coupon }}枚</p>
			  </div>
        
		  </div>
      
    </div>
    @endforeach
  </div>
</div>
@endsection