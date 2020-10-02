@extends('layouts.app')

@section('content')
<section class="page-section" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Contact</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12" id="formWrapper">
        <form id="contactForm" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSd6ail7k2oJlRMUApv4aaAEwEKSJAGTZR9A_tLJcIwgriMS4w/formResponse" target="dummyIframe" name="myForm" novalidate="novalidate">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" name="entry.1054758800" id="name" type="text" placeholder="Your Name *" required="required"
                  data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" name="entry.249037719" id="email" type="email" placeholder="Your Email *" required="required"
                  data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" name="entry.249037719" id="message" placeholder="Your Message *" required="required"
                  data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
          
            
            <div class="col-lg-12 text-center">
              <div id="success"></div>
              <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit" onclick="sendGform()">Send
                Message</button>
            </div>
          </div>
        </form>
        <iframe name="dummyIframe" style="display:none;"></iframe>
      </div>
      <div id="thxMessage" style="display:none;">お問い合わせありがとうございました。</div>
      <script>
        function sendGform(){
          document.myForm.submit();
          document.getElementById('formWrapper').style.display = 'none';
          document.getElementById('thxMessage').style.display = 'block';
        }
        </script>
    </div>
  </div>
</section>
@endsection