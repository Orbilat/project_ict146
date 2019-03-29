@extends('layouts.secretary_app')

<body>


@section('content')
<div class="container">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>RIS Number</th>
      <th>Client ID</th>
      <th>Client Name</th>
      <th>Contact Number</th>
      <th> Ready for Pick Up </>
      <th></th>
    </tr>
    
  @foreach($status as $p)


    <tr>
      <td>{{$p->risNumber}}</td>
      <td>{{$p->clientId}}</td>
      <td>{{$p->nameOfPerson}}</td>
      <td>{{$p->contactNumber}}</td>
      <td>{{$p->readyForPickUp}}</td>
      <td><form method="POST" action="{{ route('paidSecretary', [$p->clientId]) }}">
        @csrf
        <button type="submit" class="btn @if($p->paid == 'yes') btn-success @else btn-alert @endif">Paid</button>
      </form>
      </td>
    </tr>
</thead>


@endforeach
</table>
</div>
</body>

@endsection