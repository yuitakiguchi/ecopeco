@extends('layouts.app')

@section('content')

<div class="histories-user-purchase">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
          <a class="nav-link" href="{{ route('users.histories', Auth::user()->id) }}">TOP</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('users.histories.reservation', Auth::user()->id) }}">予約中</a>
      </li>
      <li class="nav-item">
          <a class="nav-link active" href="{{ route('users.histories.purchase', Auth::user()->id) }}">購入履歴</a>
      </li>
    </ul> 

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ Auth::user()->name }}さんの購入済み商品</h1>
                @foreach ($purchaseHistories as $purchaseHistory)
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card history">
                            <div class="card-header">{{ $purchaseHistory->food->user->name }}</div>
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <img src="{{ $purchaseHistory->food->image_name }}" alt="商品の写真">
                                </div>
                                <div class="col-md-5">
                                    <p class="card-name">{{ $purchaseHistory->food->name }}</p>
                                    <p class="card-text">
                                        {{ \Carbon\Carbon::parse($purchaseHistory->food->updated_at)->format("Y年n月j日") }}
                                    </p>
                                    <p class="card-text">{{ $purchaseHistory->food->price }}円→{{ $purchaseHistory->food->discount_price }}円</p>
                                    <p class="card-text">クーポン使用数：{{ $purchaseHistory->count }}</p>
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
@endsection