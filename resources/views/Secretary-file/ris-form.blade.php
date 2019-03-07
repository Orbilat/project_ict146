<!<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('secretary-file.secretary_style')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-8">
                <div class="float-left mt-4">
                <img src="/img/logo_clean.png" height="150px" width="500px"/>
                </div>
                <div class="float-left margin">
                <p class="a" style="font-size:25px;">USC - Water Laboratory</p>
                </div>
            </div>
            <div class="col-md-3" style="margin-top:100px"> 
                <b style="font-size:17px;">REQUEST INFORMATION
                <br><br>
                SHEET # _________________
                </b>
            </div>        
        </div>
        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-6">
        <p>Room 320, 3rd Floor Bunzel Building, University of San Carlos Talamban Campus, Nasipit, Talamban Cebu City Philippines 6000
                             Email: waterlab@usc.edu.ph     Phone no.: (63 32) 230 0100 loc. 110 Telefax no.: (032) 345-3811</p>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3">
        
        </div>
        </div>
        



    </div>
    
</body>
</html>