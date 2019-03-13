<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

           <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Client Style -->
    @include('layouts/client_homestyle')
   
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
        <form class="example" method="post" action="{{ route('RIS') }}"> 
        @csrf
        <input type="number" placeholder="Type your RIS number" name="search" >
        <button type="submit"><i class="fa fa-search"></i></button>
        </form>
</ul>
  </nav>
        <main>
            @yield('content')
        </main>
        
</body>
</html>
