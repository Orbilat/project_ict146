@extends('layouts.secretary_app')


@section('content')

<div class="container">
  <a href="{{url('secretary/samples')}}">Sample</a>
  <div class="float-right">
    <form method="POST" action="{{ route('search-barcode') }}">
      @csrf
      <input type="text" placeholder="Search client RIS" name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

<table class="table">
<thead class="thead-light">
  <tr>
    <th>RIS Number</th>
    <th>Client Name</th>
    <th>Name Of Entity</th>
    <th>Address</th>
    <th>Print</th>
  </tr>
  @foreach($clients as $client)


  <tr>
  <td>{{$client->risNumber}}</td>
  <td>{{$client->nameOfPerson}}</td>
  <td>{{$client->nameOfEntity}}</td>
  <td>{{$client->address}}</td>
  <td>
 
  
 
  <a href="{{route('barcode',[$client->clientId])}}"  class="btn btn-primary"> <i class="mdi mdi-printer"></i> Print</a>
 
  </td>
  
  </tr>
  @endforeach
  </thead>
</table>

<div class="row justify-content-center">
{{$clients->links()}}
</div>



</div>

</body>

@endsection