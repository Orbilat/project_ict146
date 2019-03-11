<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD:resources/views/layouts/admin_app.blade.php
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<<<<<<< HEAD:resources/views/layouts/admin_app.blade.php
    {{-- @include('secretary-file.secretary_style') --}}

    {{-- CSS Table Style --}}
    @include('custom_style')
=======
    <!-- Client Style -->
    @include('layouts/client_homestyle')
>>>>>>> b2b9750c82d3c1729e80c94d483fa2036209f237:resources/views/layouts/app.blade.php

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin') }}">{{ __('Notifications') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('samples') }}">{{ __('Samples') }}</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('clients') }}">{{ __('Clients') }}</a>
                                </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('accounts') }}">{{ __('Accounts') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Inventory
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('inventory-glassware') }}">
                                            {{ __('Glassware') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('inventory-chemicals') }}">
                                            {{ __('Chemicals') }}
                                        </a>
                                    </div>
                                </li>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); 
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
=======
    <title>Capstone</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/datatables.min.css" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/capstone.css" />
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/datatables.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div id="content">
        <!--nav class="nav nav-pills flex-column flex-sm-row">
          <a class="flex-sm-fill text-sm-center nav-link" href="/analyst/notification">Notification</a>
          <a class="flex-sm-fill text-sm-center nav-link" href="/analyst/inventory">Inventory</a>
          <button class="flex-sm-fill text-sm-center nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Station</button> 
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @foreach(Session::get('stations') as $station)
                <a class="flex-sm-fill text-sm-center nav-link" href="/analyst/sample">{{ $station->stationname }}</a>
              @endforeach
          </div>
        </nav-->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="/analyst/notification">Notification</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/analyst/inventory">Inventory</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Station</a>
            <div class="dropdown-menu">
                @foreach(Session::get('stations') as $station)
                    <a class="dropdown-item" href="/analyst/sample/station/{{ $station->stationId }}">{{ $station->stationname }}</a>
                @endforeach
          </li>
        </ul>
        @yield('content')
        <div class="footer">
          <div class="container">
            <a href="https://mdbootstrap.com/education/bootstrap/">USC Chemistry 2018</a>
          </div>
        </div>
>>>>>>> e51d4fa04dfc2826df049dfe41e781e2c55b173a:resources/views/layouts/app.blade.php
    </div>
    
    <script type="text/javascript">

    function changeText() {
        var text = document.getElementById("addNew");

        if(text.innerHTML === "Add new"){
            text.innerHTML = "Close";
        }
        else {
            text.innerHTML = "Add new";
        }
    }

    </script>
</body>
</html>
