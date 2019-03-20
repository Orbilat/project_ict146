@extends('layouts.secretary_app')




@section('content')

<div class="w3-container">
<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
    <form method="POST" action="{{ route('search-barcode') }}">
    @csrf
    <input type="number" placeholder="Search client ID" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </div>
    </form>
</div>

<table id="customers">
  <tr>
    <th>RIS Number</th>
    <th>Client ID</th>
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