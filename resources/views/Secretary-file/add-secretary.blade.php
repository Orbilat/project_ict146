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
        <button type="submit" class="btn smol btn-sm @if($p->paid == 'yes') btn-success @else btn-danger @endif">@if($p->paid == 'yes') PAID @else UNPAID @endif</button>
      </form>
      <form method="POST" action="{{ route('send', [$p->clientId]) }}">
      <button type="submit" class="btn smol btn-sm @if($p->paid == 'yes') btn-success @else btn-danger @endif">@if($p->paid == 'yes') SEND @else SENT @endif</button>
      </form>
      </td>
    </tr>
</thead>


@endforeach
</table>
</div>
</body>

@endsection