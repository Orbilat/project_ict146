@extends('layouts.secretary_app')


@section('content')


<div class="container">
<a href="{{route('form')}}"><button class="btn">  Back</button></a>
<table class="table">
<thead class="thead-light">

  <tr>
    <th>RIS Number</th>
    <th>Client Code</th>
    <th>Client Name</th>
    <th>Name Of Entity</th>
    <th>Address</th>
    <th>Contact Number</th>
    <th>Email Address</th>
    <th></th>
  </tr>
 
  @foreach($clients as $client)
  <tr>
    <td>{{$client->risNumber}}</td>
    <td>{{$client->clientId}}</td>
    <td>{{$client->nameOfPerson}}</td>
    <td>{{$client->nameOfEntity}}</td>
    <td>{{$client->address}}</td>
    <td>{{$client->contactNumber}}</td>
    <td>{{$client->emailAddress}}</td>
  <td>
 
  
 
  <a href="{{route('barcode',[$client->clientId])}}"><button class="button button3">  Print</button></a>
 
  </td>
  
  </tr>
  @endforeach
  </thead>  
</table>

</div>


</body>

@endsection