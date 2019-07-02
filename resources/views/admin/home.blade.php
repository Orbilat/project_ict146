@extends('layouts.admin_app')

@section('content')
{{-- SUCCESS MESSAGE OF ADDING EVENT --}}
@if(Session::has('flash_event_added'))
<div class="alert alert-info offset-md-1 col-md-10">
    <a class="close" data-dismiss="alert">×</a>
    <strong>Notification:</strong> {!!Session::get('flash_event_added')!!}
</div>
@endif
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            
                    @foreach ($user->notifications as $notification)
                    @php
                        dd($notification)
                    @endphp
                        <div class="alert alert-info" role="alert">
                            <h5 class="alert-heading">{{ $notification->data['message'] }}</h5>
                            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                            <hr>
                            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                        </div>
                    @endforeach
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
