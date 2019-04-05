@extends('layouts.clientapp')

@section('content')
<br>
      <div class="w3-container" style="margin:5%;">
          <div class="container"> 
              <div class="row">
                  <div class="col-md-6">
                      <h2 class="titleText">ABOUT US</h2>
                      <br>
                      <p>The University of San Carlos Water Laboratory offers analytical services for water, soil, ore, and other special samples. The Water Laboratory is accredited as a 
                      testing laboratory by the Department of Environment and Natural Resources (DENR) and the Department of Health (DOH).Construction and Materials Testing Laboratory</p>
                      <p>The USC Water Laboratory, which accepts third-party analysis and samples from the public for a fee, is attached to the Department of Chemistry.</p>
                  </div>
                  <div class="col-md-6">
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
              <div class="col-md-12 col-xs-12 col-centered w3-black">
                <div class=" text-center titleText" style="font-size: 15px; align-content: center;" >Connect with us:
                    <a href="https://www.facebook.com/pages/USC-Water-Laboratory/618035434997379" style="color: #fff; font-size:20px;"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
                </div>
          </div>
      </footer>


              <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
              {!! $calendar_details->script() !!}
@endsection
