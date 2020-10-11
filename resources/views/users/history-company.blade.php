@extends('layouts.app')

@section('content')

<div class="histories-user-company">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('foods.index') }}">TOP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.histories.company', Auth::user()->id) }}">出品履歴</a>
        </li>
    </ul>
    <div class="container">
        @foreach ($companyFoods as $purchaseHistories)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if($purchaseHistories->trading_date >= \Carbon\Carbon::today() &&
                                    $purchaseHistories->trading_time >= \Carbon\Carbon::now()->toTimeString())
                                        <a class="dropdown-item"
                                            href="{{ route('foods.edit', $purchaseHistories->id) }}">編集</a>
                                    @endif
                                        <a class="dropdown-item"
                                            href="{{ route('foods.duplicate', $purchaseHistories->id) }}">複製して投稿する</a>
                                </div>
                            </li>
                        </ul>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <img src="{{ $purchaseHistories->image_name }}" alt="商品の写真">
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $purchaseHistories->name }}</h2>
                                <p class="card-text">
                                    商品投稿日：{{ \Carbon\Carbon::parse($purchaseHistories->updated_at)->format("Y年n月j日") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection