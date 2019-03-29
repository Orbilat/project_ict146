<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>USC Water Laboratory</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('secretary-file.secretary_style')

           
    <!-- Client Style -->
    {{-- @include('layouts/client_homestyle') --}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ 'Laboratory Information Management System' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('notification-secretary') }}">{{ __('Notifications') }}</a>
                            </li>
                           
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('createClient') }}">{{ __('Create Client') }}</a>
                                </li>
                                
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('form') }}">{{ __('Create Client Forms') }}</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('addSecretary') }}">{{ __('Manage Clients') }}</a>
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
            {{-- SUCCESS MESSAGE OF INSERTING SAMPLE --}}
            @if(Session::has('flash_sample_added'))
            <div class="alert alert-info offset-md-1 col-md-10">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Notification:</strong> {!!Session::get('flash_sample_added')!!}
            </div>
            @endif
            
            {{-- SUCCESS MESSAGE OF ADDING CLIENT --}}
            @if(Session::has('flash_client_added'))
            <div class="alert alert-info offset-md-1 col-md-10">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Notification:</strong> {!!Session::get('flash_client_added')!!}
            </div>
            @endif
            
            {{-- VALIDATION CHECKS --}}
            @if ($errors->any())
            <div class="alert alert-danger pb-0 offset-md-1 col-md-10">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                    <p>Please try again.</p>
            </ul>
            </div>
            @endif
            @yield('content')
        </main>
    
    <script type="text/javascript">

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

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
