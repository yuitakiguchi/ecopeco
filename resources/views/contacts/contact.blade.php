@extends('layouts.app')

@section('content')
<section class="page-section text-center" id="contact">
    <img class="contact2 d-none d-xl-inline-block" src="image/contact2.png">
    <img class="contact1 d-none d-xl-inline-block" src="image/contact1.png">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h1>Contact</h1>
          <img class="contact-image d-none d-xl-inline-block" src="image/sign-up1.png">
        {{-- </div> --}}
      
        {{-- <div class="col-lg-12" id="formWrapper"> --}}
          <div class="card-body">
            <form id="contactForm"
                action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSd6ail7k2oJlRMUApv4aaAEwEKSJAGTZR9A_tLJcIwgriMS4w/formResponse"
                target="dummyIframe" name="myForm" novalidate="novalidate">
                {{-- <div class="row"> --}}
                    {{-- <div class="col-md-6"> --}}
                        <div class="form-group row">
                            <input class="form-control" name="entry.1054758800" id="name" type="text"
                                placeholder="お名前 *" required="required"
                                data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group row">
                            <input class="form-control" name="entry.249037719" id="email" type="email"
                                placeholder="メールアドレス *" required="required"
                                data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>

                    {{-- </div> --}}
                    {{-- <div class="col-md-6"> --}}
                        <div class="form-group row">
                            <textarea class="form-control" name="entry.249037719" id="message"
                                placeholder="メッセージ *" required="required"
                                data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    {{-- </div> --}}


                    <div class="col-lg-12 text-center">
                        <div id="success"></div>
                        <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit"
                            onclick="sendGform()">送信</button>
                    </div>
                {{-- </div> --}}
            </form>
          </div>
          <iframe name="dummyIframe" style="display:none;"></iframe>
            <div id="thxMessage" style="display:none;">お問い合わせありがとうございました。</div>
          <script>
            function sendGform() {
                document.myForm.submit();
                document.getElementById('formWrapper').style.display = 'none';
                document.getElementById('thxMessage').style.display = 'block';
            }
          </script>
        </div>
      </div>
    </div>
</section>
@endsection
