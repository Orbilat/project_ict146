@extends('layouts.secretary_app')




@section('content')

<a href="{{route('form')}}"><button class="button button3">  Back</button></a>

<table id="customers">
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
</table>



</body>

@endsection