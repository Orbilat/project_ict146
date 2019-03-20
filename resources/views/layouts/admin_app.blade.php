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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('custom_style')

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

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        function clickableRows() {
            var table = document.getElementById('tableId');
            var rows = table.getElementsByTagName('tr');
            for (i = 0; i < rows.length; i++){
                var currentRow = table.rows[i];
                var clickHandler = function(row) {
                    return function() {
                        var cell = row.getElementsByTagName("td")[0];
                        var id = cell.innerHTML;
                        alert("id:" + id);
                    };
                };
                currentRow.onclick = clickHandler(currentRow);
            }
        }

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
