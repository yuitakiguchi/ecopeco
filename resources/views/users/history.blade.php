@extends('layouts.app')　

@section('content')
@if (Auth::user()->authority_id === \App\User::AUTHORITY_COMPANY)
    <div class="container">
      @foreach ($companyFoods as $purchaseHistories)
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-4">
                <img src="{{ $purchaseHistories->image_name }}" alt="商品の写真">
                </div>
                <div class="col-md-4">
                  <p class="card-text">商品名：{{ $purchaseHistories->name }}</p>
                  <p class="card-text">商品投稿日：{{ \Carbon\Carbon::parse($purchaseHistories->updated_at)->format("Y年n月j日") }}</p>
                </div>
                <div class="col-md-4">
                  @if($purchaseHistories->trading_date >= \Carbon\Carbon::today() && $purchaseHistories->trading_time >= \Carbon\Carbon::now()->toTimeString())
                    <a class="btn btn-primary" href="{{ route('foods.edit', $purchaseHistories->id) }}">商品の編集</a>
                  @endif
                  <a class="btn btn-primary" href="{{ route('foods.duplicate', $purchaseHistories->id) }}">商品を複製して投稿</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  @else
    {{-- <ul class="nav"> --}}
      {{-- <li class="nav-item"> --}}
        {{-- <a class="nav-link active" href="#">TOP</a> --}}
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  @isset(Auth::user() -> history)
                    <p>今月の利用回数{{ Auth::user() -> history -> count }}回</p>
                    <p>総合利用回数{{ Auth::user() -> history -> this_month_count }}回</p>
                    <p>今月の節約金{{ Auth::user() -> history -> this_month_saving_price }}円</p>
                    <p>総合節約金{{ Auth::user() -> history -> saving_price }}円</p>
                  @else
                    <p>今月の利用回数 0 回</p>
                    <p>総合利用回数 0 回</p>
                    <p>今月の節約金 0 円</p>
                    <p>総合節約金 0 円</p>
                  @endisset
                </div>
              </div>
            </div>
          </div>
        </div>
      {{-- </li> --}}

      {{-- <li class="nav-item"> --}}
        {{-- <a class="nav-link active" href="#">購入履歴</a> --}}
        <div class="container">
        <p>予約中商品</p>
        @foreach ($reservationHistories as $reservationHistory)
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-md-4">
                    <img src="{{ $reservationHistory->food->image_name }}" alt="商品の写真">
                    </div>
                    <div class="col-md-4">
                      <p class="card-text">商品名：{{ $reservationHistory->food->name }}</p>
                      <p class="card-text">{{ \Carbon\Carbon::parse($reservationHistory->food->updated_at)->format("Y年n月j日") }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>

        <div class="container">
          <p>購入済み商品</p>
          @foreach ($purchaseHistories as $purchaseHistory)
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-md-4">
                    <img src="{{ $purchaseHistory->food->image_name }}" alt="商品の写真">
                    </div>
                    <div class="col-md-4">
                      <p class="card-text">商品名：{{ $purchaseHistory->food->name }}</p>
                      <p class="card-text">{{ \Carbon\Carbon::parse($purchaseHistory->food->updated_at)->format("Y年n月j日") }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    {{-- </li> --}}
  {{-- </ul> --}}
@endif
@endsection
