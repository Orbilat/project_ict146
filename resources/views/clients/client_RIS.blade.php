@extends('layouts.clientapp')

@section('content')


  <div class="container "  style="padding:130px;margin-bottom:80px; ">
    <div class="row bg-white w3-padding-16 w3-border">
        @if(isset($ris))
      <div class="col-sm-12 text-info">
        <h3>RIS NUMBER:</h3> 
        <h3 class="float-left text-danger">{{ $ris->risNumber }} </h3>
      </div>
    </div>
      <div class="row">
        <div class="col-sm-4 text-center w3-border">
           <h4 style="margin-top:20px;">Date</h3>
        </div>
        <div class="col-sm-4 text-center w3-border">
            <h4 style="margin-top:20px;">Lab-Code</h3>
        </div>
        <div class="col-sm-4 text-center w3-border">
            <h4 style="margin-top:10px;">Status</h4>
          <div class="row">
            <div class="col-sm-6 w3-border">
              <h5>Ongoing</h5>
            </div>
            <div class="col-md-6 w3-border">
              <h5>Ready for Pick-up</h5>
            </div>
          </div>
        </div>
        
        <div class="col-md-4 w3-border">{{ $ris->dateOfSubmission }}</div>
          <div class="col-md-4 w3-border">Labcode</div>
          <div class="col-md-2 w3-border">ongoing</div>
          <div class="col-md-2 w3-border"> Ready</div>

    </div>
    </div>

    @else
                 
<br><br><br>
<div class="container">
<div class="alert alert-danger w3-padding-64">
  <strong>Danger! YOUR RIS NUMBER DOES NOT EXIST.</strong> 
</div>
</div>

@endif
</div>
</div>
<footer class="w3-center w3-black w3-padding-16">
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>

@endsection