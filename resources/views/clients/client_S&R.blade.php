@extends('layouts.clientapp')

@section('content')
<br><br>
<br><br>

<div class="container" style="margin-bottom:30%;">
<div class="card-body"> 

                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th class="border SRheader">Analysis</th>
                                <th class="border SRheader">Method</th>
                                <th class="border SRheader">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parameters as $parameter)
                            <tr>
                                <td class="border">{{ $parameter->analysis }}</td>
                                <td class="border">{{ $parameter->method }}</td>
                                <td class="border"></td>
                                @endforeach
                            </tr>    
                        </tbody>
                    </table>
                    
        </div>
 
</div>

<footer class="w3-center w3-black w3-padding-16">
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
  </div>


@endsection