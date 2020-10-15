@extends('layouts.app')

@section('content')

<div class="histories-user-company">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('foods.index') }}">TOP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('users.histories.company', Auth::user()->id) }}">出品履歴</a>
        </li>
    </ul>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ Auth::user()->name }}出品履歴</h1>
                @foreach ($companyFoods as $purchaseHistories)
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <nav class="navbar navbar-expand-md shadow-sm">
                                <div class="container">
                                    <h2 class="navbar-brand">{{ $purchaseHistories->name }}</h2>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <!-- Left Side Of Navbar -->
                                        <ul class="navbar-nav mr-auto"></ul>
                                        <!-- Right Side Of Navbar -->
                                        <ul class="navbar-nav ml-auto">
                                        <!-- Authentication Links -->
                                            <li class="nav-item dropdown">
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
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    <i class="fas fa-edit"></i> <span class="caret"></span>
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
                                    </div>
                                </div>
                            </nav>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <img src="{{ $purchaseHistories->image_name }}" alt="商品の写真">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text">
                                            取引日：{{ \Carbon\Carbon::parse($purchaseHistories->updated_at)->format("Y年n月j日") }}
                                        </p>
                                        <p class="card-text">取引時間：{{ \Carbon\Carbon::parse($purchaseHistories->trading_time)->format("H時i分") }}</p>
                                        <p class="card-text">{{ $purchaseHistories->price }}円→{{ $purchaseHistories->discount_price }}円</p>
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
    </div>
</div>
@endsection