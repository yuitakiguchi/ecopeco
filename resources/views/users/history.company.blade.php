@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($companyFoods as $purchaseHistories)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <img src="{{ $purchaseHistories->image_name }}" alt="商品の写真">
                        </div>
                        <div class="col-md-4">
                            <p class="card-text">商品名：{{ $purchaseHistories->name }}</p>
                            <p class="card-text">
                                商品投稿日：{{ \Carbon\Carbon::parse($purchaseHistories->updated_at)->format("Y年n月j日") }}</p>
                        </div>
                        <div class="col-md-4">
                            @if($purchaseHistories->trading_date >= \Carbon\Carbon::today() &&
                            $purchaseHistories->trading_time >= \Carbon\Carbon::now()->toTimeString())
                            <a class="btn btn-primary"
                                href="{{ route('foods.edit', $purchaseHistories->id) }}">商品の編集</a>
                            @endif
                            <a class="btn btn-primary"
                                href="{{ route('foods.duplicate', $purchaseHistories->id) }}">商品を複製して投稿</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection