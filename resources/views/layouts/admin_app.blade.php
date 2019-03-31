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
    <link href="{{ asset('select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('select2/dist/js/select2.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('fontawesome/css/fontawesome.min.css') }}"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('custom_style')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="/img/logo.png" style="height: 22px;">
                    {{ 'USC WATER LABORATORY' }}
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
                                    <a class="nav-link" href="{{ route('transactions') }}">{{ __('Transactions') }}</a>
                                </li>
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Manage
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('samples-admin') }}">
                                            {{ __('Samples') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('clients-admin') }}">
                                                {{ __('Clients') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('stations-admin') }}">
                                                {{ __('Stations') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('parameters-admin') }}">
                                                {{ __('Parameters') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('accounts-admin') }}">
                                                {{ __('Accounts') }}
                                        </a>
                                    </div>
                                </li>
                            </li>
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Inventory
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('inventory-history-admin') }}">
                                            {{ __('History') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('inventory-glassware-admin') }}">
                                            {{ __('Glassware') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('suppliers-admin') }}">
                                                {{ __('Suppliers') }}
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
    
    <script type="text/javascript">

        var coll = document.getElementsByClassName("collapsible");
        console.log(coll);
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                console.log(content);
                if (content.style.maxHeight){
                content.style.maxHeight = null;
                } else {
                content.style.maxHeight = content.scrollHeight + "px";
                } 
            });
        }

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('.js-example-basic-single').select2();
        });

        $(document).ready(function() {
            $("tr").click(function (){
                var row = document.getElementById("showSamples");
                if(row.className == "collapse"){
                    row.className = "collapse.show";
                }
                else {
                    row.className = "collapse";
                }
            })
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
