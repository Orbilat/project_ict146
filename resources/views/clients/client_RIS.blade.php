@extends('layouts.clientapp')

@section('content')


<div class="container "  style="padding:130px;margin-bottom:80px; ">
    <div class="row bg-dark w3-padding-16 border border-light">
        <div class="col-sm-12 text-info">
            <div class="titleText">RIS NUMBER: 
                <h3 class="d-inline-block text-danger">
                    @php
                      $year = substr($ris->risNumber,  0, 4);
                      $id = substr($ris->risNumber, 4);
                      echo $year.'-'.$id;
                    @endphp
                </h3>
            </div>
        </div>
    </div>
    <div class="row border border-dark">
        <div class="col-sm-3 bg-dark ">
            <h4 class="text-center titleText" style="margin-top:15px;">Date</h3>
        </div>
        <div class="col-sm-3 bg-dark">
            <h4 class="text-center titleText" style="margin-top:15px;">Lab-Code</h3>
        </div>
        <div class="col-sm-3 bg-dark">
            <h4 class="text-center titleText" style="margin-top:15px;">Analysis</h3>
        </div>
        <div class="col-sm-3 bg-dark">
            <h4 class="text-center titleText" style="margin-top:15px;">Status</h4>
        </div>
  
        @foreach($ris->samples as $sample)
          <div class="col-md-3 w3-border text-center">{{ $sample->managedDate }}</div>
          <div class="col-md-3 w3-border text-center">{{ $sample->laboratoryCode }}</div>
          <div class="col-md-3 w3-border text-center">{{ $sample->analysis }}</div>
          <div class="col-md-3 w3-border text-center">{{ $sample->status }}</div>
        @endforeach
    </div>
</div>


                                                              
      <footer class="w3-center w3-black w3-padding-32">
          <div class="w3-section">
              <div class="col-md-4 text-center"> <h2 class="titleText">Address</h2>
                  <p class="text-center">Room 320, 3rd Floor Bunzel Building,<br> University of San Carlos Talamban Campus, <br>
                  Nasipit Talamban Cebu City Philippines 6000</p>
              </div>
              <div class="col-md-4 text-center"> <h2 class="titleText">Contacts</h2>
                  <p class="text-center">Email:waterlab@usc.edu.ph<br>
                  Phone: (63 32)345 3811<br>
                  Fax: (63 32)230 0100 loc 110</p>
              </div>
              <div class="col-md-4 text-center"> <h2 class="titleText">Feedbacks</h2>
                  <p class="text-center">Please send us your ideas, bug reports, suggestions! <br>
                  Any feedback would be appreciated.</p>
                  <br>
              </div>
              <div class=" text-center titleText" style="font-size: 25px;">Connect with Us:
                  <a href="https://www.facebook.com/pages/USC-Water-Laboratory/618035434997379" style="color: #fff; font-size: 25px;"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
              </div>
          </div>
      </footer>


@endsection