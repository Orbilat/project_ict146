<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

           <!-- Scripts -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>     -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    
<script src="{{ asset('js/app.js')}}"></script>

    <!-- Client Style -->
    @include('layouts/client_homestyle')
   
</head>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top ">
    <div class="w3-bar w3-white w3-card">
  
      <a href="{{ url('/client-home') }}" class="w3-bar-item w3-button w3-wide">   <img src="/img/logo.png" style="height: 22px;">  
USC WATER LABORATORY</a>
      <!-- Right-sided navbar links -->
      <div class="w3-right">
        <a href="{{ url('/client-home') }}" class="w3-bar-item w3-button" ><i class="fa fa-home"></i> HOME</a>
        <a href="{{ url('/S&R') }}" class="w3-bar-item w3-button" ><i class="fa fa-user"></i> SERVICE & RATES</a>
        <a href="{{ url('/contact') }}" class="w3-bar-item w3-button" ><i class="fa fa-envelope"></i> CONTACT</a>
        <form class="w3-bar-item search" method="post" action="{{ route('RIS') }}" > 
          @csrf
          <input type="text" class="SearchRis" placeholder="Type your RIS number" name="search" >
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>

  
        <main>
            @yield('content')
        </main>
        
</body>
</html>
