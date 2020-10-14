@extends('layouts.app')

@section('content')

<div class="welcome-user containar">

    <div class="jumbotron jumbotron-extend row justify-content-center">
        <div class="col-md-8 text-center">
            <p class="title" style="font-family: 'sofia',cursive;">Food sharing platform</p>
            <h1>ecopeco</h1>
            <div class="row justify-content-center">
                <div class="col-8">
                    <img class=" img-fluid" src="../images/welcome-user2.png">
                </div>
            </div>
            <p class="message">廃棄予定の食料を手頃な価格でゲットしよう！</p>
        </div>
    </div>

    <div class="row justify-content-center how-to-use">
        <div class="col-md-8 ">
            <div class="title">
                <h1 class="pt-5" style="font-family: 'sofia',cursive;">How to use for users</h1>
                <p class="pb-5">一般ユーザーの方</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 pb-5">
                    <p class="display-3 mr-5 font-weight-bold">01</p>
                    <h2>店舗を検索</h2>
                    <p>トップページから地域を検索してクーポンを探そう！</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 pb-5">
                    <p class="display-3 mr-5 font-weight-bold">02</p>
                    <h2>クーポンを予約</h2>
                    <p>クーポン数を指定して予約をしたら、取引時間に指定されている時間までに商品を受取にいこう！</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 pb-5">
                    <p class="display-3 mr-5 font-weight-bold">03</p>
                    <h2>お会計</h2>
                    <p>お店のレジでマイページの予約中一覧を提示してください。※決済方法はお店によって異なります。</p>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-8">
                    <p class="display-4 mr-4 font-weight-bold">さっそく始めてみよう</p>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-3  justify-content-center pb-5">
                    <a href="{{ route('login') }}">
                        <div class="card">新規登録</div>
                    </a>
                </div>
            </div>

        </div>
        <img class="pb-5 img-fluid" src="../images/welcome-user3.jpg">
    </div>

    <div class="row justify-content-center how-to-company">

    </div>




</div>

@endsection
