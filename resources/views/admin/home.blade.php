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

                    @if ($user->notifications()->count() == 0)
                        <div class="alert alert-info m-0" role="alert">
                            <p>There are no notifications to be read.</p>
                        </div>
                    @endif
            
                    @foreach ($user->notifications()->paginate(10) as $notification)
                    {{-- @php
                        dd($notification)
                    @endphp --}}
                        <div @if($notification->read_at == NULL && $notification->data['days'] == 0) class="alert alert-danger m-1" @elseif($notification->read_at != NULL) class="alert alert-secondary m-1" @else class="alert alert-info m-1" @endif role="alert">
                            <h5 class="alert-heading">
                                {{ $notification->data['message'] }}
                                
                            </h5>
                            <p>
                                Laboratory Code: {{ $notification->data['labCode'] }} <br>
                                Created by: 
                                    @if (isset($notification->data['created_by']))
                                        {{ $notification->data['created_by'] }}
                                    @else 
                                        NULL
                                    @endif
                                <br>
                                Due Date: {{ date("F d, Y h:i A", strtotime($notification->data['dueDate'])) }}
                            </p>
                            <hr>
                            <form action="{{ route('notif-read-admin', ['id' => $notification->id]) }}" method="get">
                                    <button type="submit" class="mb-0 btn btn-secondary">Mark as read</button>
                            </form>
                        </div>
                    @endforeach
    
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center m-2">
        {{ $user->notifications()->paginate(10)->links() }}
    </div>
</div>
@endsection
