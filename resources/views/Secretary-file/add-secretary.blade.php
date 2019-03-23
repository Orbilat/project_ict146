@extends('layouts.secretary_app')

<body>


@section('content')

<table id="customers">
  <tr>
    <th>RIS Number</th>
    <th>Client ID</th>
    <th>Client Name</th>
    <th>Contact Number</th>
    <th>Ready For Pickup</th>
  </tr>
  @foreach($status as $p)


<tr>
<td>{{$p->risNumber}}</td>
<td>{{$p->clientId}}</td>
<td>{{$p->nameOfPerson}}</td>
<td>{{$p->contactNumber}}</td>
<td>{{$p->readyForPickUp}}</td>


</tr>
@endforeach
</table>
</body>

@endsection