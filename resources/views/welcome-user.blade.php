@extends('layouts.app')

@section('content')

<div class="welcome-user">

    <div class="jumbotron jumbotron-extend row justify-content-center">
        <div class="col-md-8 text-center">
            <p class="title mt-4" style="font-family: 'sofia',cursive;">Food sharing platform</p>
            <h1>ecopeco</h1>
            <div class="row justify-content-center">
                <div class="col-8">
                    <img class=" img-fluid" src="../images/welcome-user2.png">
                </div>
            </div>
            <p class="message">廃棄予定の食料を手頃な価格でゲットしよう！</p>
        </div>
    </div>

    <div class="row justify-content-center how-to-use mx-0">
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

    <div class="row justify-content-center how-to-company mx-0">
        <div class="col-md-8 ">
            <div class="title">
                <h1 class="pt-5" style="font-family: 'sofia',cursive;">How to use for companys</h1>
                <p class="pb-5">事業者の方</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 pb-5">
                    <p class="display-3 mr-5 font-weight-bold">01</p>
                    <h2>アカウント設定</h2>
                    <p>ログインをしたらアカウント設定で店舗情報を入力しよう。(※入力情報は一般ユーザーの商品ページ等に掲載されます。)</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 pb-5">
                    <p class="display-3 mr-5 font-weight-bold">02</p>
                    <h2>商品を投稿しよう</h2>
                    <p>TOPページであなたの投稿した商品の一覧、商品ごとのクーポン予約者一覧を見ることができます。</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 pb-5">
                    <p class="display-3 mr-5 font-weight-bold">03</p>
                    <h2>お会計</h2>
                    <p>お客さまはクーポン画面をレジに持ってきます。商品の引き渡しが完了したらTOPページの予約者一覧の予約中ボタンを購入済に切り替えてください。</p>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-8">
                    <p class="display-4 mr-4 font-weight-bold">さっそく始めてみよう</p>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-3  justify-content-center pb-5">
                    <a href="{{ route('registercompany') }}">
                        <div class="card">新規登録</div>
                    </a>
                </div>
            </div>
        </div>
        <img class="pb-5 img-fluid" src="../images/welcome-user4.jpg">

        </div>
    </div>

</div>

@endsection
