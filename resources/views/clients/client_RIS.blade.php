@extends('layouts.clientapp')

@section('content')
   
<div class="container "  style="padding-top: 120px;margin-bottom:30px; ">
    <div class="row w3-padding-16" style="background-color:#A1CDA8">
        <div class="col-sm-12">
            <div class="text-dark TS">RIS NUMBER: 
                <div class="d-inline-block text-danger">
                    @foreach($clients as $client)
                    {{ $client-> risNumber}}
                </div>
                <div class="float-right TS">
                    Payment:   
                    @if ( $client->paid == "yes" || $client->paid == "Yes")
                    <div class="d-inline-block text-success float-right"> Done</div>   
                    @else 
                    <div class="d-inline-block text-danger float-right"> Pending</div>    
                    @endif
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
    <br>
    <div class="row" style="background-color:#e9ecef;">
        <div class="col-sm-3" >
            <h4 class="text-center text-dark TS" style="margin-top:15px;">Date</h3>
        </div>
        <div class="col-sm-3">
            <h4 class="text-center text-dark TS" style="margin-top:15px;">Lab-Code</h3>
        </div>
        <div class="col-sm-3">
            <h4 class="text-center text-dark TS" style="margin-top:15px;">Analysis</h3>
        </div>
        <div class="col-sm-3">
            <h4 class="text-center text-dark TS" style="margin-top:15px;">Status</h4>
        </div>
    </div>  
        @foreach($client->samples as $sample)
                <div class="row"> 
                    <div class="col-md-3 w3-border text-center TS" >{{ $sample->managedDate  }}</div>
                    <div class="col-md-3 w3-border text-center TS">{{ $sample->laboratoryCode  }}</div>
                    <div class="col-md-3 w3-border text-center TS" >
                    @foreach($sample->parameters as $parameter)
                    {{ $parameter->analysis }}<br>
                    @endforeach
                    </div>
                    <div class="col-md-3 w3-border text-center TS">{{ $parameter->pivot->status }}</div>
                </div>
        @endforeach

        @foreach($clients as $client)
            @if ( $client->readyForPickUp == "yes" || $client->paid == "Yes")
                <div class="p-5 alert alert-success text-center FontError">
                    <i class="glyphicon glyphicon-ok fa-1x"></i> 
                    <strong>Ready for Pick Up</strong>
                </div>
            @else
                <div class="p-5 alert alert-danger text-center FontError">
                    <i class="fa fa-exclamation-triangle fa-1x"></i> 
                    <strong>Please settle your account</strong>
                </div>
            @endif
        @endforeach
</div>
             




<div class="container "  style="padding-top: 120px;margin-bottom:30px; ">
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Lab-Code</th>
                <th>Analysis</th>
                <th>Status</th>
            </tr>
        </thead>  
        <tbody>
        @foreach($client->samples as $sample)
           
            <tr>

                    <td>{{ $sample->managedDate  }}</td>
                    <td>{{ $sample->laboratoryCode  }}</td><td>
                    @foreach($sample->parameters as $parameter)
                    {{ $parameter->analysis }}<br>
                    @endforeach</td>
                    <td>{{ $parameter->pivot->status }}</td>
                    
                    </tr>

           
        @endforeach
        </tbody>
        </table>
        @foreach($clients as $client)
            @if ( $client->readyForPickUp == "yes" || $client->paid == "Yes")
                <div class="p-5 alert alert-success text-center FontError">
                    <i class="glyphicon glyphicon-ok fa-1x"></i> 
                    <strong>Ready for Pick Up</strong>
                </div>
            @else
                <div class="p-5 alert alert-danger text-center FontError">
                    <i class="fa fa-exclamation-triangle fa-1x"></i> 
                    <strong>Please settle your account</strong>
                </div>
            @endif
        @endforeach
</div>


<footer class="w3-center w3-black w3-padding-32">
          <div class="row">
            <div class="col-md-1"></div>
              <div class="col-md-3 text-center"> <h2 class="titleText" style="font-size: 15px;">Address</h2>
                  <p class="text-center" style="font-size: 10px;">Room 320, 3rd Floor Bunzel Building, University of San Carlos Talamban Campus, 
                  Nasipit Talamban Cebu City Philippines 6000</p>
              </div>
              <div class="col-md-4 text-center"> <h2 class="titleText" style="font-size: 15px;">Contacts</h2>
                  <p class="text-center" style="font-size: 10px;">Email:waterlab@usc.edu.ph<br>
                  Phone: (63 32)345 3811<br>
                  Fax: (63 32)230 0100 loc 110</p>
              </div>
              <div class="col-md-3 text-center"> <h2 class="titleText" style="font-size: 15px;">Feedbacks</h2>
                  <p class="text-center" style="font-size: 10px;">Please send us your ideas, bug reports, suggestions! <br>
                  Any feedback would be appreciated.</p>
                  <br>
              </div>
          </div>
                <div class=" text-center titleText" style="font-size: 15px; align-content: center;" >Connect with us:
                    <a href="https://www.facebook.com/pages/USC-Water-Laboratory/618035434997379" style="color: #fff; font-size:20px;"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
                </div>
      </footer>


@endsection