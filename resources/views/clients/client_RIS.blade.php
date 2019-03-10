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
@endsection