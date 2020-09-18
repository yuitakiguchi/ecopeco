@extends('layouts.app')

@section('content')
@if (Auth::user()->authority_id === 1)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>〇〇店</h5>
            </div>
            <div class="row justify-content-center">
                <div class="card-body">
                    <div class="col-md-4">
                        <img src="{{ $food->image_name }}" alt="商品の写真">
                    </div>
                </div>
                    <div class="col-md-4">
                        <p class="card-text">商品名：{{ $food->name }}</p>
                        <p class="card-text">引取終了時間：{{ $food->trading_time }}</p>
                        <p class="card-text">{{ $food->price }}円→{{ $food->discount_price }}円</p>
                        <p class="card-text">クーポン：{{ $food->coupon }}枚</p>
                    </div>
                </div>
            <a class="btn btn-primary btn-lg btn-block" href="{{ route('foods.edit', $food->id) }}">商品の編集</a>
            <form action='{{ route('foods.destroy', $food->id) }}' method='post'>
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type='submit' value='削除' class="btn btn-secondary btn-lg btn-block" onclick='return confirm("削除しますか？？");'>
            </form>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>〇〇店</h5>
            </div>
            <div class="row justify-content-center">
                <div class="card-body">
                    <div class="col-md-4">
                        <img src="{{ $food->image_name }}" alt="商品の写真">
                    </div>
                </div>
                    <div class="col-md-4">
                        <p class="card-text">商品名：{{ $food->name }}</p>
                        <p class="card-text">引取終了時間：{{ $food->trading_time }}</p>
                        <p class="card-text">{{ $food->price }}円→{{ $food->discount_price }}円</p>
                        <p class="card-text">クーポン：{{ $food->coupon }}枚</p>
                    </div>
            </div>
            <a class="btn btn-primary btn-lg btn-block" href="#">クーポンを使用する</a>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <img src="{{ $food->user->image_name }}" alt="店舗写真">
                    <img src="" alt="GoogleMap">
                </div>
                <div class="col-md-4">
                    <table class="item-detail-table">
                        <tbody>
                            <tr>
                                <th>店舗紹介</th>
                                <td>{{ $food->user->introduction }}</td>
                            </tr>
                            <tr>
                                <th>最寄駅</th>
                                <td>
                                    @foreach($food->user->areas as $area)
                                    {{ $area->name }}
                                    
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>店舗HP</th>
                                <td>{{ $food->user->hp_url }}</td>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <td>{{ $food->user->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>住所</th>
                                <td>{{ $food->user->address }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection