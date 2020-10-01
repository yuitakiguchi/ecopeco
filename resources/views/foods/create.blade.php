@extends('layouts.app')

@section('content')
<div class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if(session()->has('message'))
    <div class="alert alert-info mb-3">
      {{session('message')}}
    </div>
  @endif
  <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
    <div class="row justify-content-center">
        <div class="form-group">
          <label for="exampleFormControlFile1">商品画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>
    </div>
    <div class="row justify-content-center text-center">
      <div class="col-12 mb-4">
        <p>商品名</p>
        <input type="text" name="name">
      </div>
      <div class="col-12 mb-4">
        <p>取引日</p>
        <input type="date" name="trading_date" max="9999-12-31">
      </div>
      <div class="col-12 mb-4">
        <p>取引終了時間</p>
        <input type="time" name="trading_time">
      </div>
      <div class="col-12 mb-4">
        <p>定価</p>
        <input type="number" name="price">
      </div>
      <div class="col-12 mb-4">
        <p>割引き価格</p>
        <input type="number" name="discount_price">
      </div>
      <div class="col-12 mb-4">
        <p>クーポン枚数</p>
        <input type="number" name="coupon">
      </div>
    </div>
    <div class="row justify-content-center">
      <button type="submit" class="btn btn-primary btn-lg btn-block">商品を掲載する</button>
      <button action="{{ route('foods.index') }}" type="button" class="btn btn-secondary btn-lg btn-block">戻る</button>
    </div>
  </form>
</div>
@endsection
