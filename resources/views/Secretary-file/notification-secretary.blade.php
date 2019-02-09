@extends('layouts.app')

<body>


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <ul class="secretary-page">
                  <li class="active"><a  href="{{url('/notification')}}">Notification</a></li>
                  <li><a href="{{url('/inventory')}}">Inventory</a></li>
                  <li><a href="{{url('/view')}}">View Status</a></li>
                  <li><a href="{{url('/add')}}">Add & View Status</a></li>
                  <li><a href="{{url('/create')}}">Create Report</a></li>
                </ul>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                  
                </div>
            Notification
            </div>
        </div>
    </div>
</div>
</body>

@endsection