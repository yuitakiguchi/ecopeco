@extends('layouts.app')

@section('content')
<div class="container">
  @include('layouts.flash')
  <form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  {{method_field('PATCH')}}
    <div class="row justify-content-center">
        <div class="form-group">
          <label for="exampleFormControlFile1">商品画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>
    </div>
    <div class="row justify-content-center text-center">
      <div class="col-12 mb-4">
        <p>商品名</p>
        <input type="text" name="name" value="{{ $food->name }}">
      </div>
      <div class="col-12 mb-4">
        <p>取引日</p>
        <input type="date" name="trading_date" max="9999-12-31" value="{{ $food->trading_date }}">
      </div>
      <div class="col-12 mb-4">
        <p>取引終了時間</p>
        <input type="time" name="trading_time" value="{{ $food->trading_time }}">
      </div>
      <div class="col-12 mb-4">
        <p>定価</p>
        <input type="number" name="price" value="{{ $food->price }}">
      </div>
      <div class="col-12 mb-4">
        <p>割引き価格</p>
        <input type="number" name="discount_price" value="{{ $food->discount_price }}">
      </div>
      <div class="col-12 mb-4">
        <p>クーポン枚数</p>
        <input type="number" name="coupon" value="{{ $food->coupon }}">
      </div>
    </div>
    <div class="row justify-content-center">
      <button type="submit" class="btn btn-primary btn-lg btn-block">商品を修正する</button>
      <a class="btn btn-secondary btn-lg btn-block" href="{{ route('foods.show', $food->id) }}">戻る</a>
    </div>
  </form>
</div>
@endsection
