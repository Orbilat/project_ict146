@extends('layouts.clientapp')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <form class="float-right" action="{{ route('searchParameter-client') }}" method="GET">
                            @csrf
                            <select class="js-example-responsive" id="search" name="search">
                                  <option selected>Search Analysis</option>
                                @foreach ($params as $param)
                                  <option value="{{ $param->analysis }}">{{ $param->analysis }}</option>
                                @endforeach
                            </select>
                            
                            <input class="float-right" type="submit" value="Search">
                        </form>
        </div>
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
                </tr>  
                @endforeach  
            </tbody>
        </table>  
        </div>         
    </div>
         <div class="d-flex justify-content-center mt-3">
                    {{ $parameters->links() }}
            </div>
    </div>
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