@extends('layouts.app')

@section('content')

<div class="duplicate-food">
    <img class="duplicate-food1 d-none  d-xl-inline-block" src="../../images/duplicate-food1.png">
    <img class="duplicate-food2 d-none  d-xl-inline-block" src="../../images/duplicate-food2.png">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <img class="duplicate-food3 d-none  d-xl-inline-block" src="../../images/sign-up1.png">
                @include('layouts.flash')
                <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <h1 class="text-center py-5">duplicate post</h1>
                    <div class="card text-center py-5">
                        <div class="row justify-content-center">
                            <div class="form-group">
                                <p>商品画像</p>
                                <img src="{{ $food->image_name }}">
                                <input type="hidden" name="image_name" value="{{ $food->image_name }}">
                                <input type="hidden" name="public_id" value="{{ $food->public_id }}">
                            </div>
                        </div>

                        <div class="row justify-content-center text-center">
                            <div class="card-name col-md-8">
                              <label for="name" class="col-md-4 col-form-label">商品名</label>
                                <input type="text" name="name" value="{{ $food->name }}">
                            </div>

                            <div class="card-trading_date col-md-8">
                                <label for="trading_date" class="col-md-4 col-form-label">取引日</label>
                                <input class="trading_date" type="date" name="trading_date" max="9999-12-31" value="{{ $food->trading_date }}">
                            </div>

                            <div class="card-trading_time col-md-8">
                                <label for="trading_time" class="col-md-4 col-form-label">取引終了時間</label>
                                <input class="trading_time" type="time" name="trading_time" value="{{ $food->trading_time }}">
                            </div>

                            <div class="card-price col-md-8">
                                <label for="price" class="col-md-4 col-form-label">定価</label>
                                <input type="number" name="price" value="{{ $food->price }}">
                            </div>

                            <div class="card-discount_price col-md-8">
                                <label for="discount_price" class="col-md-4 col-form-label">割引き価格</label>
                                <input type="number" name="discount_price" value="{{ $food->discount_price }}">
                            </div>

                            <div class="card-coupon col-md-8">
                                <label for="discount_price" class="col-md-4 col-form-label">クーポン枚数</label>
                                <input type="number" name="coupon" value="{{ $food->coupon }}">
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary">商品を複製する</button>
                    </div>

                    <div class="row justify-content-center">
                        <a class="btn btn-secondary" href="{{ route('foods.index') }}">戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
