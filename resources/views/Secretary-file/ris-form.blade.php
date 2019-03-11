<!DOCTYPE html>
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
<style>
hr {
  border: 0;
  clear:both;
  display:block;
  width: 96%;               
  background-color:black;
  height: 5px;
}

table, th, td {
  border: 2px solid black;
  border-collapse: collapse;
}
div.test
{
width: 115  px;
padding: 10px;
border: 2px solid #000;
border-radius: 15px;
-moz-border-radius: 15px;
}
#border1{
width: 500px;
padding: 10px;
border: 2px solid #000;
border-radius: 15px;
-moz-border-radius: 15px;
}
th,td{
    padding: 10px;
}
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"> </div>
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
            <div class="col-md-1"> </div>
            <div class="col-md-6">
                <p>Room 320, 3rd Floor Bunzel Building, University of San Carlos Talamban Campus, Nasipit, Talamban Cebu City Philippines 6000
                                Email: waterlab@usc.edu.ph     Phone no.: (63 32) 230 0100 loc. 110 Telefax no.: (032) 345-3811</p>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3"> </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div></div>
            <div class="col-md-10">
                <hr>
            </div>
            <div class="col-md-1"></div>    
        </div>
        
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6 test">       
                  <h3> <b>REQUESTED BY:</b></h3>
                   <br>
                   <h5><b>Name of Person:</b><br>
                   <b>Name of Entity:</b><br>
                   <b>Address:</b> </h5>
            </div>
            <div class="col-md-4">  
                  <h5 id="border1"><b> Sample <br>Submitted:</b>&emsp;&emsp; Date:___________  Time:____hrs.</h5>
                  <h5 id="border1"><b> PAYMENT MADE:</b>  &emsp;&emsp; Total Amount Charged: <br> <br> Deposit:_____________ &emsp;&emsp;OR #:</h5>       
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 ">
                <table style="width:95%">
                <col>
                <col>
                <col>
                <colgroup span="4"></colgroup>
                <col>
                <col>
                <col>
                <col>
                <col>
                    <tr>
                        <th>Laboratory Code</th>
                        <th>Client's Code</th>
                        <th>Telephone</th>
                        <th colspan="4" scope="colgroup">SAMPLE TYPE/METRIX</th>
<!--                             
                            <tr>
                            <th>Drinking Water
                            </th>
                            <th>Ground Water</th>
                            <th>Waste Water</th>
                            <th>Other Type</th>
                            </tr> -->
                            
                        
                        <th>Sample Collection</th>
                        <th>Sample Preservation</th>
                        <th>Parameter(s) Requested</th>
                        <th>Purpose of Analysis</th>
                        <th>Sample Source <br>
                            (Location/Address)
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">Drinking Water</th>

                        <th scope="col">Drinking Water</th>
                        <th scope="col">Drinking Water</th>
                        <th scope="col">Drinking Water</th>
                    </tr>
                    <tr>
                        <td>Bill GatesSDSFSDFSDFSDFSDFSDFSD</td>
                        <td>55577854</td>
                        <td>555772423423423855</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
        



    </div>
    
</body>
</html>