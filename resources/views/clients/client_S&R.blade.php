@extends('layouts.clientapp')

@section('content')
<br><br>
<br><br>

<div class="container" style="margin-bottom:30%;">
    <div class="card-body"> 
        <table class="table">
            <thead>
                <tr class="text-center">
                  <th class="text-light bg-secondary TS">Analysis</th>
                  <th class="text-light bg-secondary TS">Method</th>
                  <th class="text-light bg-secondary TS">Price</th>
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
              <div class=" text-center titleText" style="font-size: 25px;">Connect with us:
                  <a href="https://www.facebook.com/pages/USC-Water-Laboratory/618035434997379" style="color: #fff; font-size:30px;"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
              </div>
          </div>
      </footer>
@endsection