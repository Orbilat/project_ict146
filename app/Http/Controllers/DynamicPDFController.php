<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Client;
use App\Sample;

class DynamicPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('dynamic_pdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = DB::table('samples')
         ->limit(10)
         ->get();
     return $customer_data;
    }

    function pdf()
    {
     $data = Client::all();
     $pdf = \App::make('dompdf.wrapper');
<<<<<<< HEAD
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->setPaper('A3', 'landscape')->stream();
=======
     $pdf = \PDF::loadView('produit', $data);
     return $pdf->setPaper('Letter', 'landscape')->stream();
>>>>>>> 7eceea1245baaaa79dd91182cac893168885981d
    }

    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '
     <head>
  <title>Laravel - How to Generate Dynamic PDF from HTML using DomPDF</title>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config(\'app.name\', \'Laravel\') }}</title>

    <!-- Scripts -->
    <script src="{{ asset(\'js/app.js\') }}" defer></script>

    <!-- Fonts -->

    
  
    <!-- Styles -->
    <link href="{{ asset(\'css/app.css\') }}" rel="stylesheet">
    @include(\'secretary-file.secretary_style\')

  <style type="text/css">
  * {
    box-sizing: border-box;
  }
  .secretary-page {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #4d4dff;
  }
  
  li {
    float: left;
  }
  
  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
  
  li a:hover:not(.active) {
    background-color: #111;
  }
  
  .active {
    background-color: #4CAF50;
  }
  .bckg{
    background-image: url("/img/RIS.png"); 
    
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    
  }
  p.a {
    font-family: "Times New Roman", Times, serif;
  }
  .margin{
    margin-top: 100px;
    margin-left:70px;
  }
  
  .header {
    border: 1px;
    padding: 15px;
  }
  
  .row::after {
    content: "";
    clear: both;
    display: table;
  }

//   .float-left{   
//         float: left;     
//   }
  
  [class*="col-"] {
    float: left;
    padding: 15px;
    border: 1px;
  }

  
  
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
  
   .box{
    width:600px;
    margin:0 auto;
   }
   
hr{border: 0;
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
 </head>
     
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-8">
                <div class="float-left mt-4">
                    <img src="C:/Users/daryne/project_ict146/public/img/logo_clean.png" height="150px" width="500px"/>
                </div>
                <div class="float-left margin">
                    <p class="a" style="font-size:25px;">USC - Water Laboratory</p>
                </div>
            </div>

            <div class="col-md-3" style="margin-top:100px">
                
                <br>
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
                    <tr>
                        <th>Laboratory Code</th>
                        <th>Client\'s Code</th>
                        
                        <th>Sample Type/Metrix</th>            
                        <th>Sample Collection</th>
                        <th>Sample Preservation</th>
                        <th>Parameter(s) Requested</th>
                        <th>Purpose of Analysis</th>
                        <th>Sample Source <br>
                            (Location/Address)
                        </th>
                    </tr>
                    
                    
                        
                        .';
                        foreach($customer_data as $sample);
                        $output .='
                        <tr>
                            <td>'.$sample->sampleId.'</td>
                            <td>'.$sample->clientsCode.'</td>
                            <td>'.$sample->sampleMatrix.'</td>
                            <td>'.$sample->collectionTime.'</td>
                            <td>'.$sample->samplePreservation.'</td>
                            <td>'.$sample->purposeOfAnalysis.'</td>
                            
                            <td>'.$sample->samplePreservation.'</td>
                            <td>'.$sample->sampleSource.'</td>
                            </tr>';     
     $output .= '</table>';
     
    $output .= '
            
            </div>
            <div class="col-md-1"></div>
            </div>




            </div>

            </body>
    ';
    return $output;
    }
}