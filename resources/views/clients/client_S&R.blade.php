@extends('layouts.clientapp')

@section('content')

<ul class="client-page">
  <li><a href="{{ url('/client-home')}}">Home</a></li>
  <li><a class="active" href="{{ url('/S&R') }}">Services & Rates</a></li>
  <li><a href="{{ url('/contact') }}">Contact Us</a></li>
</ul>
<br><br>
@endsection