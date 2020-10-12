@extends('layouts.app')

@section('content')

<div class="histories-user-top">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('users.histories', Auth::user()->id) }}">TOP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.histories.reservation', Auth::user()->id) }}">予約中</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.histories.purchase', Auth::user()->id) }}">購入履歴</a>
        </li>
    </ul> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card-top">
                <h1>{{ Auth::user()->name }}さんの利用履歴</h1>
                @isset(Auth::user() -> history)
                <div class="row justify-content-center">
                    <div class="col-md-4 brown">
                        <p>今月の利用回数</p>
                        <img class="histories-user1 d-none d-xl-inline-block" src="../../images/histories-user1.png">
                        <p>{{ Auth::user() -> history -> count }}回</p>
                    </div>
                    <div class="col-md-4 white">
                        <p>総合利用回数</p>
                        <img class="histories-user1 d-none d-xl-inline-block" src="../../images/histories-user1.png">
                        <p>{{ Auth::user() -> history -> this_month_count }}回</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4 white">
                        <p>今月の節約金</p>
                        <img class="histories-user1 d-none  d-xl-inline-block" src="../../images/histories-user1.png">
                        <p>{{ Auth::user() -> history -> this_month_saving_price }}円</p>
                    </div>
                    <div class="col-md-4 brown">
                        <p>総合節約金</p>
                        <img class="histories-user1 d-none  d-xl-inline-block" src="../../images/histories-user1.png">
                        <p>{{ Auth::user() -> history -> saving_price }}円</p>
                    </div>
                </div>
                @else
                <div class="row justify-content-center">
                    <div class="col-md-4 brown">
                        <p>今月の利用回数</p>
                        <img class="histories-user1 d-none  d-xl-inline-block" src="../../images/histories-user1.png">
                        <p> 0 回</p>
                    </div>
                    <div class="col-md-4 white">
                        <p>総合利用回数</p>
                        <img class="histories-user1 d-none  d-xl-inline-block" src="../../images/histories-user1.png">
                        <p> 0 回</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4 white">
                        <p>今月の節約金</p>
                        <img class="histories-user1 d-none  d-xl-inline-block" src="../../images/histories-user1.png">
                        <p> 0 円</p>
                    </div>
                    <div class="col-md-4 brown">
                        <p>総合節約金</p>
                        <img class="histories-user1 d-none  d-xl-inline-block" src="../../images/histories-user1.png">
                        <p> 0 円</p>
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection
