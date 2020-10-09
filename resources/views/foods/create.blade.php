@extends('layouts.app')

@section('content')
<div class="create-food">
    <img class="create-food1 d-none  d-xl-inline-block" src="../../images/create-food1.png">
    <img class="create-food2 d-none  d-xl-inline-block" src="../../images/create-food2.png">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <img class="create-food3  d-xl-inline-block" src="../../images/sign-up1.png">
                @include('layouts.flash')
                <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <h1 class="text-center py-5">create post</h1>
                    <div class="card text-center py-5">
                        <h2>商品の情報を入力</h2>
                        <div class="row justify-content-center text-center">
                            <div class="form-group">
                                <label for="exampleFormControlFile1" class="col-md-4 col-form-label">商品画像</label>
                                <input required type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </div>

                        <div class="row justify-content-center text-center">
                            <div class="card-name col-md-8">
                                <label for="name" class="col-md-4 col-form-label">商品名</label>
                                <input type="text" name="name">
                            </div>

                            <div class="card-trading_date col-md-8">
                                <label for="trading_date" class="col-md-4 col-form-label">取引日</label>
                                <input class="trading_date" type="date" name="trading_date" max="9999-12-31">
                            </div>

                            <div class="card-trading_time col-md-8">
                                <label for="trading_time" class="col-md-4 col-form-label">取引終了時間</label>
                                <input class="trading_time" type="time" name="trading_time">
                            </div>

                            <div class="card-price col-md-8">
                                <label for="price" class="col-md-4 col-form-label">定価</label>
                                <input type="number" name="price">
                            </div>

                            <div class="card-discount_price col-md-8">
                                <label for="discount_price" class="col-md-4 col-form-label">割引き価格</label>
                                <input type="number" name="discount_price">
                            </div>

                            <div class="card-coupon col-md-8">
                                <label for="discount_price" class="col-md-4 col-form-label">クーポン枚数</label>
                                <input type="number" name="coupon">
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary">商品を掲載する</button>
                    </div>

                    <div class="row justify-content-center">
                        <button action="{{ route('foods.index') }}" type="button" class="btn btn-secondary">戻る</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
