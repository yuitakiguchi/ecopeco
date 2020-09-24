@extends('layouts.app')　

@section('content')
@if (Auth::user()->authority_id === 1)
  <div class="container">
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
  </div>
@else
<div class="container">
  <p>予約中商品</p>
  @foreach ($reservationHistorys as $reservationHistory)
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
    @foreach ($purchaseHistorys as $purchaseHistory)
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
@endif
@endsection