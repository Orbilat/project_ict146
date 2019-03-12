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
					<i class="fa fa-facebook-square" style="font-size:25px"></i>
				</a>
				<a href="https://twitter.com/warriors_turf" target="blank">
					<i class="fa fa-twitter" style="font-size:25px"></i>
				</a>
				<a href="https://www.instagram.com/warriorsturf" target="blank">
					<i class="fa fa-instagram" style="font-size:25px"></i>
				</a>
</div>
@endsection
