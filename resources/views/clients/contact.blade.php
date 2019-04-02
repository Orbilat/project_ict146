@extends('layouts.clientapp')

@section('content')

<div class="w3-container" style="margin-top:5%;" id="contact">
      <!--Section heading-->
    <h3 class="w3-center">
        CONTACT
    </h3>
      <!--Section description-->
    <p class="w3-center w3-large">
        Lets get in touch. Send us a message:
    </p>
  <div class="row">
    <!--Grid column-->
      <div class="col-lg-5 mb-4">
        <!--Form with header-->
          <div class="card">
              <div class="card-body">
                  <!--Header-->
                    <div class="form-header blue accent-1 w3-center">
                        <h2>
                          <i class="fa fa-pencil"></i> 
                            Write to us:
                        </h2>
                    </div>
                        <p class="w3-center">Got a question? We'd love to hear from you.</p>
                        <p class="w3-center">Send us a message and we'll respond as soon as possible</p>
                          <!--Body-->
                        <form id="contact" method="post" action="{{ route('contact.store')}}">
                          {{ csrf_field() }}
                          @if (Session::has('flash_message'))
                            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                          @endif
                    <div class="md-form">
                        <i class="fa fa-user"></i>
                        <label for="form-name">Your name</label>
                        <input type="text" class="form-control" name="name" required>
                          @if ($errors->has('name'))
                            <small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
                          @endif
                    </div>
                    <div class="md-form">
                        <i class="fa fa-envelope"></i>
                        <label for="form-email">Your email</label>
                        <input type="email" class="form-control" name="email" required>
                          @if ($errors->has('email'))
                            <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
                          @endif
                    </div>
                    <div class="md-form">
                        <i class="fa fa-comment"></i>
                        <label for="form-Subject">Message</label>
                        <textarea name="message" class="form-control" required></textarea>
                          @if ($errors->has('message'))
                            <small class="form-text invalid-feedback">{{ $errors->first('message') }}</small>
                          @endif        
                    </div>
                        <button class="w3-button w3-info " type="submit">
                          <i class="glyphicon glyphicon-send"></i> SEND MESSAGE
                        </button>
             </div>
          </div>
      </div>
      <div class="col-lg-7">
        <!--Google map-->
        <div>
          <img src="/img/map.PNG" style="height: 400px; width: 720px;">   
        </div>
        <br>
        <!--Buttons-->
        <div class="row text-center">
            <div class="col-md-4">
                <i class="glyphicon glyphicon-map-marker fa-fw w3-xxlarge w3-text-red"></i>
                <address>
                  Room 320, 3rd Floor Bunzel Building,
                  University of San Carlos Talamban Campus, Nasipit Talamban
                  Cebu City Philippines 6000
                </address>
            </div>
            <div class="col-md-3">
                <i class="glyphicon glyphicon-earphone fa-fw w3-xxlarge w3-text-red"></i>
                <p>(63 32)345 3811</p>
                <p>Mon - Fri, 8:00-22:00</p>
            </div>
            <div class="col-md-2">
                <i class="glyphicon glyphicon-phone fa-fw w3-xxlarge w3-text-red"></i>
                <p>(63 32)230 0100</p>
                <p>loc 110</p>
            </div>
            <div class="col-md-3">
                <i class="glyphicon glyphicon-envelope fa-fw w3-xxlarge w3-text-red"></i>
                <p>waterlab@usc.edu.ph</p>
            </div>
        </div>
      </div>
  </div>
</div>
      <footer class="w3-center w3-black w3-padding-32">
          <div class="w3-section">
              <div class="col-md-4 text-center"> <h2 class="titleText">Address</h2>
                  <p class="text-center">Room 320, 3rd Floor Bunzel Building,<br> University of San Carlos Talamban Campus, <br>
                  Nasipit Talamban Cebu City Philippines 6000</p>
              </div>
              <div class="col-md-4 text-center"> <h2 class="titleText">Contacts</h2>
                  <p class="text-center">Email:waterlab@usc.edu.ph<br>
                  Phone: (63 32)345 3811<br>
                  Fax: (63 32)230 0100 loc 110</p>
              </div>
              <div class="col-md-4 text-center"> <h2 class="titleText">Feedbacks</h2>
                  <p class="text-center">Please send us your ideas, bug reports, suggestions! <br>
                  Any feedback would be appreciated.</p>
                  <br>
              </div>
              <div class=" text-center titleText" style="font-size: 25px;">Connect with us:
                  <a href="https://www.facebook.com/pages/USC-Water-Laboratory/618035434997379" style="color: #fff; font-size:30px;"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
              </div>
          </div>
      </footer>


  @endsection