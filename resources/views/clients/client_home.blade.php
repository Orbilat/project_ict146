@extends('layouts.clientapp')

@section('content')

<form class="example" action="/action_page.php">
  <input type="text" placeholder="Type your RIS number" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
<br>
<ul class="client-page">
  <li><a class="active" href="{{ url('/client-home') }}">Home</a></li>
  <li><a href="{{ url('/S&R') }}">Services & Rates</a></li>
  <li><a href="#contact">Contact Us</a></li>
</ul>
<br><br>
<h2>News</h2>
<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%233366ff&amp;src=ffle2n18re70mc0l80oqkku6a4%40group.calendar.google.com&amp;color=%23B1440E&amp;ctz=Asia%2FManila" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
@endsection