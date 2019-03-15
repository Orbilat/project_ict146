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
    </style>
</head>
<body>
    
        
        @foreach($produits as $p)
        <div class="row">
        <div class="col-10">
            <div>{!! DNS1D::getBarcodeHTML ($p->risNumber, 'C128A') !!}</div><br>
            <h2>{{ $p->risNumber}}</h2>

            
        </div>
   
    
        <div class="col-2 test1"> 
        <h4>USC WATER LABORATORY &emsp;&emsp; RIS#_____</h4>
            <h5>CHAIN OF CUSTODY SLIP
            <br>
            Lab.Code:
            <br>
            Client's Code:
            <br>
            Sample Type:
            <br>
            Date/Time Sample Submitted:
            <br>
            Date/Time Sample Collected:
            <br>
            Analysis Requested:
            </h5>   
        </div> 
        
        </div>

        @endforeach
    
    <input id ="printbtn" type="button" value="Print this page" onclick="window.print();" >
</body>
<script>
function myFunction() {
  window.print();
}
</script>
</html>