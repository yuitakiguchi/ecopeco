@extends('layouts.app')　

@section('content')
@if (Auth::user()->authority_id === 2)
<div class="container">
    <input type="search" name="area" placeholder="地域を検索する">
    <button type="submit" class="area-search">検索</button>
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
@else
<div class="container">
  <a href="{{ route('foods.create') }}">新規投稿</a>
  @foreach ($companyFoods  as $companyFood)
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-md-4">
            <img src="{{ $companyFood->image_name }}" alt="商品の写真">
            <p class="card-text">商品名：{{ $companyFood->name }}</p>
            </div>
            <div class="col-md-6 ">
              <div class="row justify-content-center">
                <div class="card text-center" >
                  <div class="card-body">
                    <p class="card-text">予約者名　クーポン利用〇枚　予約時刻</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <a class="btn btn-primary" href="#">予約中</a>
              <a class="btn btn-primary" href="#">購入済</a>
            </div>
            <a class="btn btn-primary btn-lg btn-block" href="{{ route('foods.edit', $companyFood->id) }}">この商品の情報を編集する</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @endif
</div>

{{-- 企業マイページ --}}
{{-- <div class="container">
  @foreach ($companyFoods as $companyFood)
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-md-4">
            <img src="{{ $companyFood->image_name }}" alt="商品の写真">
            </div>
            <div class="col-md-4">
              <p class="card-text">商品名：{{ $companyFood->name }}</p>
              <p class="card-text">{{ \Carbon\Carbon::parse($companyFood->updated_at)->format("Y年n月j日") }}</p>
            </div>
            <div class="col-md-4">
              <a class="btn btn-primary" href="{{ route('foods.edit', $companyFood->id) }}">商品の編集</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div> --}}
@endsection
