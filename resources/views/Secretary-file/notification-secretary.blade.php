@extends('layouts.app')

<body>


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <ul class="secretary-page">
                  <li class="active"><a  href="{{url('/notification-secretary')}}">Notification</a></li>
                  <li><a href="{{url('/notification')}}">Inventory</a></li>
                  <li><a href="Inventory">View Status</a></li>
                  <li><a href="View Status">Add & View Status</a></li>
                  <li><a href="Add & View Status">Create Report</a></li>
                </ul>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                  
                </div>
               
            </div>
        </div>
    </div>
</div>
</body>

@endsection