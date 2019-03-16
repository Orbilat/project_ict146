@extends('layouts.clientapp')

@section('content')




<br>
<br>
<div class="w3-container" style="margin:5%;">
        <div class="container"> 

          <div class="row">
            <div class="col-md-6">
            <h2 class="titleText">ABOUT US</h2>
            <br><br>
            <p>The University of San Carlos Water Laboratory offers analytical services for water, soil, ore, and other special samples. The Water Laboratory is accredited as a testing laboratory by the Department of Environment and Natural Resources (DENR) and the Department of Health (DOH).
                Construction and Materials Testing Laboratory</p>
            <p>The USC Water Laboratory, which accepts third-party analysis and samples from the public for a fee, is attached to the Department of Chemistry.</p>
            </div>
            <div class="col-md-6 ">
            <h2 class="w3-center titleText">News</h2>
            <div class="panel panel-primary">
              <div class="panel-body" >
              {!! $calendar_details->calendar() !!}
            </div>
            </div>
          </div>
        </div>
 </div>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  {!! $calendar_details->script() !!}
@endsection
