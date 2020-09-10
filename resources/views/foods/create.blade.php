@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <form>
        <div class="form-group">
          <label for="exampleFormControlFile1">商品画像</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
      </form>
    </div>
    <div class="row justify-content-center">
    <p>商品名</p>
    <input type="text" name="name">
    </div>
    <div class="row justify-content-center">
    </div>
</div>
@endsection