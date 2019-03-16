@extends('layouts.clientapp')

@section('content')

  <div class="w3-container" style="margin-top:5%;" id="contact">
<!--Section heading-->
<h3 class="w3-center">CONTACT</h3>
<!--Section description-->
<p class="w3-center w3-large">Lets get in touch. Send us a message:</p>


<div class="row">

  <!--Grid column-->
  <div class="col-lg-5 mb-4">

    <!--Form with header-->
    <div class="card">

      <div class="card-body">
        <!--Header-->
        <div class="form-header blue accent-1 w3-center">
          <h2><i class="fa fa-pencil"></i> Write to us:</h2>
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
          <input type="text" class="form-control" name="name">
            @if ($errors->has('name'))
            <small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
            @endif
        </div>

        <div class="md-form">
          <i class="fa fa-envelope"></i>
          <label for="form-email">Your email</label>
          <input type="email" class="form-control" name="email">
            @if ($errors->has('email'))
            <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
            @endif
        </div>

        <div class="md-form">
          <i class="fa fa-comment"></i>
          <label for="form-Subject">Message</label>
            <textarea name="message" class="form-control"></textarea>
            @if ($errors->has('message'))
            <small class="form-text invalid-feedback">{{ $errors->first('message') }}</small>
            @endif        
        </div>

        <button class="w3-button w3-info " type="submit">
          <i class="glyphicon glyphicon-send"></i> SEND MESSAGE
        </button>
      </div>
    </div>
    </form>
    <!--Form with header-->

  </div>
  <!--Grid column-->

  <!--Grid column-->
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
        <address>Room 320, 3rd Floor Bunzel Building,
    University of San Carlos Talamban Campus, Nasipit Talamban
    <address> Cebu City Philippines 6000</address>
      </div>
      
      <div class="col-md-3">
        <i class="glyphicon glyphicon-earphone fa-fw w3-xxlarge w3-text-red"></i>
        <p>(63 32)345 3811</p>
        <p>Mon - Fri, 8:00-22:00</p>
      </div>

      <div class="col-md-2">
        <i class="glyphicon glyphicon-phone fa-fw w3-xxlarge w3-text-red"></i>
        <p>(63 32)230 0100 </p>
        <p>loc 110</p>
      </div>

      <div class="col-md-3">
        <i class="glyphicon glyphicon-envelope fa-fw w3-xxlarge w3-text-red"></i>
        <p>waterlab@usc.edu.ph</p>
      </div>
    </div>

  </div>
  <!--Grid column-->
</div>
</div>

<footer class="w3-center w3-black w3-padding-16">
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>


  @endsection