@extends('layouts.clientapp')

@section('content')
<br><br>
<br><br>

<div class="container" style="margin-bottom:25%;">
    <div class="card-body"> 
        <table class="table">
            <thead style="background-color:#A1CDA8;">
                <tr class="text-center">
                  <th class="text-dark TS">Analysis</th>
                  <th class="text-dark TS">Method</th>
                  <th class="text-dark TS">Price</th>
                </tr>
            </thead>
            <tbody>
              @foreach($parameters as $parameter)
                <tr class="text-center">
                  <td class="border">{{ $parameter->analysis }}</td>
                  <td class="border">{{ $parameter->method }}</td>
                  <td class="border">{{ $parameter->price }}</td>
              @endforeach
                </tr>    
            </tbody>
        </table>           
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

@endsection