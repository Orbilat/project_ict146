<!DOCTYPE html>
<html>
 <head>
  <title>Laravel - How to Generate Dynamic PDF from HTML using DomPDF</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

  <style type="text/css">
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
width: 115px;
padding: 10px;
border: 2px solid #000;
border-radius: 15px;
-moz-border-radius: 15px;
}
div.test1
{
border: 2px solid #000;
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
                    <img src="/img/logo_clean.png" height="150px" width="500px"/>
                </div>
                <div class="float-left margin">
                    <p class="a" style="font-size:25px;">USC - Water Laboratory</p>
                </div>
            </div>

            <div class="col-md-3" style="margin-top:100px">
                <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Convert into PDF</a> 
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
                        <th>Client's Code</th>
                        
                        <th>Sample Type/Metrix</th>            
                        <th>Sample Collection</th>
                        <th>Sample Preservation</th>
                        <th>Parameter(s) Requested</th>
                        <th>Purpose of Analysis</th>
                        <th>Sample Source <br>
                            (Location/Address)
                        </th>
                    </tr>
                                              
                        @foreach($samples as $sample)
                      <tr>
                            <td>{{$sample->sampleId}}</td>
                            <td>{{$sample->clientsCode}}</td>
                            <td>{{$sample->sampleMatrix}}</td>
                            <td>{{$sample->collectionTime}}</td>
                            <td>{{$sample->samplePreservation}}</td>
                            <td>{{$sample->purposeOfAnalysis}}</td> 
                            <td>{{$sample->samplePreservation}}</td>
                            <td>{{$sample->sampleSource}}</td>
                     </tr>   
                         @endforeach   
                    
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>


        
        <div class="row" style="margin-top:10px">
           
                <div class="col-md-1"></div>
                <div class="col-md-5 test1"><h3>SAMPLE COLLECTED BY:</h3></div>
                <div class="col-md-5 test1"><h3>SAMPLE SUBMITTED BY:</h3> </div>
            
        </div>
        <div class="row" > 
            <div class="col-md-1"></div>
            <div class="col-md-2 test1">  
                <br>     
                  <h5>Sample(s) placed at <br>
                    Micro Area
                       <br> ___________
                       <br>
                       Wet Lab Area
                  </h5>
            </div>
            <div class="col-md-3 test1">
                <br>
                <h5>
                Reclaim sample/bottle:   _______Yes      ________No
                <br>
                <br>
                Test result: ______E-mail   ______Fax   _______LBC
                </h5>
            </div>
        </div>



    </div>
    
</body>
  
</html>
