<head>
    
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
border: 1.5px solid #000;
}
div.div1{
  width: 450px;
  height: 240px;
  border: 2px solid black;
}

div.div2{
  width: 100x;
  height: 200px;  
  border: 2px solid black;
  padding: 10px;
}
h4{
    margin:2px;
}
p{
    margin:2px;
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
            
        }
        .col-12{
            padding: 0px;
        }
        .col-4{
            padding: 0px;
        }
        .col-6{
            padding: 0px;
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
    
<button id="printbtn" onclick="history.go(-1);">Back </button>
<input id ="printbtn" type="button" value="Print this page" onclick="window.print();">
 @foreach($client as $clients)
 @foreach($clients ->samples as $p)
    <div class="row">
        <div class="col-3">
            <br><br>
            <div>{!! DNS1D::getBarcodeHTML ($p->laboratoryCode, 'C128A',1,60) !!}</div>
            <br>
            <h2 class="header">{{ $p->laboratoryCode}}
            @if($p->remarks == "rush" || $p->remarks == "Rush")
                <br>
                Rush
            @endif
            </h2>        
        </div>
        <div class="col-1"></div>    
        <div class="col-7 div1">
            <span class="logo-lg">
                    <img src="{{asset('img/logo_clean.png')}}" alt="" height="30px">
             </span>
            <br>
            <p> <b> USC WATER LABORATORY &emsp; &emsp; RIS#:</b> {{ $clients->risNumber }}
            </p>
            <br>
            
            <p><b> CHAIN OF CUSTODY SLIP</b>
            
                <br>
                <b> LabCode:</b> {{ $p->laboratoryCode }}
                <br>
                <div class="col-6">
                    <b> Client's Code:</b> {{ $p->clientsCode }}
                </div>
                <div class="col-6"><b> Sample Type:</b> {{ $p->sampleType }}</div>
                
                <br>
                <b> Date Submitted:</b> {{  date("F j, Y g:m A", strtotime($p->created_at)) }}
                <br>
                <b> Date Collected:</b> {{  date("F j, Y g:m A", strtotime($p->sampleCollection)) }}
                <br>
                <b> Analysis Requested: </b>
                
                        @foreach($p->parameters as $para)
                            {{$para->analysis}}
                        @endforeach
                  
            </p>   
        </div> 
    </div>
    <br>
    @endforeach  
    @endforeach

    
    <div class="row">
    @foreach($client as $s)
    <br> <br>
    <div class="div2 row">
        <div class="row">
            <span class="logo-lg">
                    <img src="{{asset('img/logo_clean.png')}}" alt="" height="30px">
             </span>
             <br>
        </div>
        <div class= "row"> 
            <div class="col-6"><h3 style="padding:0px; margin:0px">CLAIM SLIP</h3> </div>
            <div class="col-6"><b>Date:</b>
                @php
                echo date("Y-m-d");
                
                @endphp
            </div>
            <br><br>
        </div>
        <div class= "row"> 
            <div class="col-6"><b> RIS #:</b> {{$s->risNumber}}</div>
            <div class="col-6"> <b> Total Charge: </b></div>
        </div>
        <div class= "row"> 
            <div class="col-12"> <b> Name of Representative:</b> {{$s->nameOfPerson}}</div>
        </div>
        <div class= "row"> 
            <div class="col-12"><b> Name of Company: </b> {{$s->nameOfEntity}}</div>
        </div>
        <div class="row">
            <div class="col-4"><b> Amount Paid: </b></div>
            <div class="col-4"> <b>Balance:</b> </div>
            <div class="col-4"><b>Official Receipt No:</b> </div>
        </div>
        <div class="row">
            <div class="col-6"><b>Please Follow Up On:</b> {{$s->followUp}}</div>
            <div class="col-6"><b>Issued By:</b> {{$s->managedBy}}</div>
        </div>
        <div class="row">
        <b><u>Call us 3453811/2300100 local 110 for confirmation. Test results will not be released without this claim slip.</u> </b>
        </div>
    </div>



    <!-- <div class="col-1"></div>

        <div class= "col-11 div2">
            <div class="col-6" style="padding:0px;">
                <h3 style="margin:0px;">CLAIM SLIP</h3>
            </div>
            
            <div class="col-6" style="padding:0px;">
            <b> Date: </b>
             </div>
            <br>
            <br>
            <p>
                <div class="col-6" style="padding:0px;">
                    <b> RIS #: </b>{{$s->risNumber}}
                </div>
                <div class="col-6" style="padding:0px;"> 
                   <b> Total Charge:</b>
                </div>
                <br>
                <div class="col-6" style="padding:0px;"> 
                <b> Name of Representative: </b>{{$s->nameOfPerson}}  
                </div>
                <div class="col-3" style="padding:0px;"> 
                   <b> Amount Paid:</b>
                </div>
                <div class="col-3" style="padding:0px;"> 
                   <b> Balance:</b>
                </div>
                <br>
                <div class="col-6" style="padding:0px;"> 
                <b> Name of Company: </b>{{$s->nameOfEntity}}
                </div>
                <div class="col-6" style="padding:0px;">
                 <b> Official Receipt No.: </b>
                </div>
                <br>
                <div class="col-6" style="padding:0px;">
                <b> Please follow up on:</b> {{$s->followUp}}
                </div>
                <div class="col-6" style="padding:0px;">
                    <b>Issued By:</b>
                </div>
                <br>
            
                <b> <u> Call us 3453811/2300100 local 110 for confirmation. Test results will not be released without this claim slip.</u> </b>
                </p> -->
           @php break;
           @endphp
        </div>
        
        @endforeach   
    </div>  
      
   

<script>
function myFunction() {
  window.print();
}
</script>
</html>