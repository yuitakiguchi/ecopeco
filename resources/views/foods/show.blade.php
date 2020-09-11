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
            <a class="btn btn-primary btn-lg btn-block" href="{{ route('foods.edit', $food->id) }}">商品の編集</a>
            <button type="button" class="btn btn-secondary btn-lg btn-block">商品の削除</button>
        </div>
    </div>
</div>
@endsection