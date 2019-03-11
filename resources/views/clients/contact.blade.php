@extends('layouts.clientapp')

@section('content')

<div class="wrapper">
<nav>
    <div class="logo">
    <i class="fa fa-flask" style="font-size:35px;color:white"></i>USC WATER LABORATORY
    </div>

      <ul>
        <li><a class="active" href="{{ url('/client-home') }}">Home</a></li>
        <li><a href="{{ url('/S&R') }}">Services & Rates</a></li>
        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
        <li><form class="example" action="{{ route('RIS') }}">
        <input type="text" placeholder="Type your RIS number" name="search" >
        <button type="submit"><i class="fa fa-search"></i></button>
        </form></li>
</ul>
  </nav>


    <div class=contactUs>Contact Us</div>
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
                  <input type="text" class="form-control" name="email">
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
  <i class="fa fa-map-marker" ></i> University of San Carlos Talamban Campus<br>
  <i class="fa fa-envelope"></i><br>
  <i class="fa fa-phone"></i><br>
  <i class="fa fa-mobile-phone"></i>
  </form>
  </div>
</div>
@endsection