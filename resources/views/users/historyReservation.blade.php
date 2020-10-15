@extends('layouts.app')

@section('content')

<div class="histories-user-reservation">
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.histories', Auth::user()->id) }}">TOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('users.histories.reservation', Auth::user()->id) }}">予約中</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.histories.purchase', Auth::user()->id) }}">購入履歴</a>
                    </li>
                </ul> 
                <h1>{{ Auth::user()->name }}さんの予約中商品</h1>
                @foreach ($reservationHistories as $reservationHistory)
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="{{ route('foods.show',$reservationHistory->food->id) }}">
                            <div class="card reservation">
                                <div class="card-header">{{ $reservationHistory->food->user->name }}</div>
                                <div class="row justify-content-center">
                                    <div class="col-md-5">
                                        <img src="{{ $reservationHistory->food->image_name }}" alt="商品の写真">
                                    </div>
                                    <div class="col-md-5">
                                        <p class="card-name">{{ $reservationHistory->food->name }}</p>
                                        <p class="card-text">
                                            取引日：{{ \Carbon\Carbon::parse($reservationHistory->food->updated_at)->format("Y年n月j日") }}
                                        </p>
                                        <p class="card-text">取引時間：{{ \Carbon\Carbon::parse($reservationHistory->food->trading_time)->format("H時i分") }}</p>
                                        <p class="card-text">{{ $reservationHistory->food->price }}円→{{ $reservationHistory->food->discount_price }}円</p>
                                        <p class="card-text">クーポン使用数：{{ $reservationHistory->count }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection