@extends('layouts.clientapp')

@section('content')
<div class="wrapper">
<nav>
<div class="logo">USC WATER LABORATORY</div>
<ul>
  <li><a href="{{ url('/client-home') }}">Home</a></li>
  <li><a href="{{ url('/S&R') }}">Services & Rates</a></li>
  <li><a class="active" href="{{ url('/contact') }}">Contact Us</a></li>
  @guest
  <li><a href="{{ route('login') }}">{{ __('Login') }}</a>  </li>
  @endguest
</ul>
  </nav>
<p><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d62798.011431118095!2d123.9138159!3d10.3518216!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a998eb60d8b98b%3A0x9e3addae4f0c49bc!2sUSC+Water+Laboratory!5e0!3m2!1sen!2sph!4v1549968692520" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></p>

  <form method="get" action="/suggestion">
    <button type="submit">Suggestions</button>
</form>
@endsection