@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>〇〇店</h5>
            </div>
            <div class="card-body">
                <img src="" alt="商品の写真">
                <p class="card-text">商品名：{{ $food->name }}</p>
                <p class="card-text">引取終了時間：{{ $food->trading_time }}</p>
                <p class="card-text">{{ $food->price }}円→{{ $food->discount_price }}円</p>
                <p class="card-text">クーポン：{{ $food->coupon }}枚</p>
            </div>
        </div>
    </div>
</div>
@endsection