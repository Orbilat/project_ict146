@extends('layouts.clientapp')

@section('content')

<head>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    {!! $calendar_details->script() !!}
</head>

<body>
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
<br>
<br>
<h2>News</h2>
      
        <div class="container">
            <div class="panel panel-primary">
              <div class="panel-heading">MY Event Details</div>
              <div class="panel-body" >
              {!! $calendar_details->calendar() !!}
            </div>
            </div>
 
            </div>

<div class="foot">
				<a href="https://www.facebook.com/warriorsturf" target="blank">
					<i class="fa fa-facebook-square" style="font-size:35px"></i>
				</a>
				<a href="https://twitter.com/warriors_turf" target="blank">
					<i class="fa fa-twitter" style="font-size:35px"></i>
				</a>
				<a href="https://www.instagram.com/warriorsturf" target="blank">
					<i class="fa fa-instagram" style="font-size:35px"></i>
				</a>
<div>
</body>
@endsection
