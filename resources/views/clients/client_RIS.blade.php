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
            <br>
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
       <!-- Footer -->
<footer class="page-footer font-small indigo w3-black text-white">

<!-- Footer Links -->
<div class="container text-center text-md-left">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-3 mx-auto">

      <!-- Links -->
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4 titleText">About</h5>
          <p>The Water Laboratory is accredited as a testing laboratory by the Department of Environment and Natural Resources (DENR) and the Department of Health (DOH).</p>
    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none">

    <!-- Grid column -->
    <div class="col-md-3 mx-auto">

      <!-- Links -->
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4 titleText">Address</h5>

      <p>Room 320, 3rd Floor Bunzel Building, University of San Carlos Talamban Campus, 
                  Nasipit Talamban Cebu City Philippines 6000</p>
    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none">

    <!-- Grid column -->
    <div class="col-md-3 mx-auto">

      <!-- Links -->
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4 titleText">Contact Us </h5>

      <p>Email:waterlab@usc.edu.ph<br>
         Phone: (63 32)345 3811<br>
         Fax: (63 32)230 0100 loc 110</p>
    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none">

    <!-- Grid column -->
    <div class="col-md-3 mx-auto">

      <!-- Links -->
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4 titleText">Feedbacks</h5>

      <p>Please send us your ideas, bug reports, suggestions! <br>
                  Any feedback would be appreciated.</p>
      <ul class="list-unstyled">
        <li>
          <a href="{{ url('/contact') }}">Message Us<i class="glyphicon glyphicon-envelope fa-fw "></i></a>
        </li>
      </ul>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->
<h5 class="text-center"  style="font-size:25px; border-radius: 35px;">Follow us:
    <a href="https://www.facebook.com/pages/USC-Water-Laboratory/618035434997379"><i class="fa fa-facebook-official w3-hover-opacity " style=" font-size:25px; border-radius: 35px;"></i></a> 
</h5>
<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2019 Copyright:
  <a href="https://mdbootstrap.com/education/bootstrap/">uscwaterlab.tech</a>- All rights served
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

    
@endsection