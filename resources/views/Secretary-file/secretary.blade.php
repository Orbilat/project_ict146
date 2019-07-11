@extends('layouts.secretary_app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            
                    @foreach ($user->unreadNotifications()->paginate(10) as $notification)
                    {{-- @php
                        dd($notification)
                    @endphp --}}
                        <div class="alert alert-info m-1" role="alert">
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
                                Due Date: {{ $notification->data['dueDate'] }}
                            </p>
                            <hr>
                            <form action="{{ route('notif-read', ['id' => $notification->notifiable_id]) }}" method="get">
                                    <button type="submit" class="mb-0 btn btn-secondary">Mark as read</button>
                            </form>
                        </div>
                    @endforeach
    
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center m-2">
        {{ $user->unreadNotifications()->paginate(10)->links() }}
    </div>
</div>
@endsection