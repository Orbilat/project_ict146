@extends('layouts.clientapp')

@section('content')
<div class="wrapper">
<nav>
<div class="logo">USC WATER LABORATORY</div>
<ul>
  <li><a class="active" href="{{ url('/client-home') }}">Home</a></li>
  <li><a href="{{ url('/S&R') }}">Services & Rates</a></li>
  <li><a href="{{ url('/contact') }}">Contact Us</a></li>
  @guest
  <li><a href="{{ route('login') }}">{{ __('Login') }}</a>  </li>
  @endguest
</ul>
  </nav>
<br>
<div class="cover">
<form class="example" action="/action_page.php">
  <input type="text" placeholder="Type your RIS number" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
<br>
<h2>News</h2>
<div class="panel panel-primary">
              <div class="panel-heading">MY Event Details</div>
              <div class="panel-body" >
                  {!! $calendar_details->calendar() !!}
              </div>
            </div>
            </div>
<div class="foot">
				<a href="https://www.facebook.com/warriorsturf" target="blank">
					<i class="fa fa-facebook-square" style="font-size:25px"></i>
				</a>
				<a href="https://twitter.com/warriors_turf" target="blank">
					<i class="fa fa-twitter" style="font-size:25px"></i>
				</a>
				<a href="https://www.instagram.com/warriorsturf" target="blank">
					<i class="fa fa-instagram" style="font-size:25px"></i>
				</a>
<div>
@endsection
