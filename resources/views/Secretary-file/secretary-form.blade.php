@extends('layouts.secretary_app')


@section('content')

<div class="container">
  <div class="float-right">
    <form method="POST" action="{{ route('search-barcode') }}">
      @csrf
      <input type="number" placeholder="Search client ID" name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

<table class="table">
<thead class="thead-light">
  <tr>
    <th>RIS Number</th>
    <th>Client ID</th>
    <th>Client Name</th>
    <th>Name Of Entity</th>
    <th>Address</th>
    <th></th>
  </tr>
  @foreach($clients as $client)


  <tr>
  <td>{{$client->risNumber}}</td>
  <td>{{$client->clientId}}</td>
  <td>{{$client->nameOfPerson}}</td>
  <td>{{$client->nameOfEntity}}</td>
  <td>{{$client->address}}</td>
  <td>
 
  
 
  <a href="{{route('barcode',[$client->clientId])}}"><button class="button button3">  Forms</button></a>
 
  </td>
  
  </tr>
  @endforeach
  </thead>
</table>

</div>

</body>

@endsection