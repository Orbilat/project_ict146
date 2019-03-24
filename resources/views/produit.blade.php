<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barcode</title>
    
    
    <style type="text/css">
@media print {
    #printbtn {
        display :  none;
    }
}
</style> 
    <style>
        div.test1
{
border: 2px solid #000;
}

.row::after {
    content: "";
    clear: both;
    display: table;
  }
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
            
        .row{
            margin:5px;
        }
        h2{
            margin-top:60px;
        }
        b.thicker {
            font-weight: 900;
        }
        .header {
            margin: 5px;
        }
    </style>
</head>
<body>
    
        
        @foreach($samples as $p)
    <div class="row">
        <div class="col-3">
        <br><br>
            <div>{!! DNS1D::getBarcodeHTML ($p->laboratoryCode, 'C128A',1.5,60) !!}</div>
            <h2 class="header">{{ $p->laboratoryCode}}
            @if($p->remarks == "rush" || $p->remarks == "Rush")
                <br>
                Rush
            @endif
            </h2>        
        </div>
        <div class="col-1"></div>
        <div class="col-6 test1"> 
            <h4>USC WATER LABORATORY &emsp; <br> RIS#: 
                @php
                    $year = substr($p->ris,  0, 4);
                    $id = substr($p->ris, 4);
                    echo $year.'-'.$id;
                @endphp
            </h4>
            <p>
            <b> CHAIN OF CUSTODY SLIP</b>
            
            <br>
            <b> LabCode:</b> 
            @php
                $year = substr($p->laboratoryCode,  0, 4);
                $IDclient = substr($p->laboratoryCode, 4, 4);
                $IDsample = substr($p->laboratoryCode, 8);
                echo $year.'-'.$IDclient.'-'.$IDsample;
            @endphp
            <br>
            <b> Client's Code:</b> {{ $p->clientsCode }}
            <br>
            <b> Sample Type:</b> {{ $p->sampleType }}
            <br>
            <b> Date/Time Sample Submitted:</b> {{  date("F j, Y g:m A", strtotime($p->created_at)) }}
            <br>
            <b> Date/Time Sample Collected:</b> {{  date("F j, Y g:m A", strtotime($p->sampleCollection)) }}
            <br>
            <b> Analysis Requested: </b> @foreach($parameters as $parameter) {{ $parameter->analysis }} @endforeach
            </p>   
              </div> 
    </div>
        <br><br><br><br>

        @endforeach

        
    <div class="row">
    @foreach($slip as $s)
        <div class= "test1">
            <h3> CLAIM SLIP</h3>
            <h4> RIS #: {{$s->risNumber}}
            <br>
             Name of Representative: {{$s->nameOfPerson}}
            <br>
             Name of Company: {{$s->nameOfEntity}}
            <br>
             Please follow up on:
            <br>
            <u> Call us 3453811/2300100 local 110 for confirmation. Test results will not be released without this claim slip.</u>
            </h4>
        </div>
        @endforeach
    </div>            
       
    <input id ="printbtn" type="button" value="Print this page" onclick="window.print();" >
</body>
<script>
function myFunction() {
  window.print();
}
</script>
</html>