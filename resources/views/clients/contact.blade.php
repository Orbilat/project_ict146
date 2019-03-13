@extends('layouts.clientapp')

@section('content')

    <div class="contactUs">Contact</div>

      <div class="wrapperContact">
        <div class="bg">
          <div class="container1 float-left">  
          <form id="contact" method="post" action="{{ route('contact.store')}}">
                  {{ csrf_field() }}
              <h4>Contact us today, and get reply with in 24 hours!</h4>
              @if (Session::has('flash_message'))
                  <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
              @endif
                
                  <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" class="form-control" name="name">
                    @if ($errors->has('name'))
                    <small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Email Address:</label>
                    <input type="text" class="form-control" name="email" require="required">
                    @if ($errors->has('email'))
                    <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Message:</label>
                    <textarea name="message" class="form-control"></textarea>
                    @if ($errors->has('message'))
                    <small class="form-text invalid-feedback">{{ $errors->first('message') }}</small>
                    @endif                
                  </div>

                  <button class="btn btn-primary">Submit</button>
                  </div>

    <div class="container2 float-left"> 
    <p>CONTACT INFORMATION</p>
    <i class="fa fa-map-marker" ></i>Room 320, 3rd Floor Bunzel Building,<br> University of San Carlos Talamban Campus, <br>Nasipit Talamban Cebu City Philippines 6000<br>
    <i class="fa fa-envelope"></i>waterlab@usc.edu.ph<br>
    <i class="fa fa-phone"></i>(63 32)345 3811<br>
    <i class="fa fa-mobile-phone"></i>(63 32)230 0100 loc 110
    </form>
    </div>
  </div>

  
  @endsection