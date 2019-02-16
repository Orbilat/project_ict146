@extends('layouts.clientapp')

@section('content')

<div class="wrapper">
<nav>
<div class="logo">USC WATER LABORATORY</div>
<ul>
  <li><a href="{{ url('/client-home') }}">Home</a></li>
  <li><a class="active" href="{{ url('/S&R') }}">Services & Rates</a></li>
  <li><a href="{{ url('/contact') }}">Contact Us</a></li>
  @guest
  <li><a href="{{ route('login') }}">{{ __('Login') }}</a>  </li>
  @endguest
</ul>
  </nav>
<br><br>
@endsection