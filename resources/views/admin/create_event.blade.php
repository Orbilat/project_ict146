@extends('layouts.admin_app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Create Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">View Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
        
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <form action="{{ route('addEvent-admin') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="eventName" class="offset-md-1 col-md-2 col-form-label">{{ __('Event Name') }}</label>
                    
                                        <div class="col-md-8">
                                            <input id="eventName" type="text" class="form-control{{ $errors->has('eventName') ? ' is-invalid' : '' }}" name="eventName" value="{{ old('eventName') }}" required>
                    
                                            @if ($errors->has('eventName'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('eventName') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="startDate" class="offset-md-1 col-md-2 col-form-label">{{ __('Start Date') }}</label>
                    
                                        <div class="col-md-8">
                                            <input id="startDate" type="datetime-local" class="form-control{{ $errors->has('startDate') ? ' is-invalid' : '' }}" name="startDate" required>
                    
                                            @if ($errors->has('startDate'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('startDate') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="endDate" class="offset-md-1 col-md-2 col-form-label">{{ __('End Date') }}</label>
                    
                                        <div class="col-md-8">
                                            <input id="endDate" type="datetime-local" class="form-control{{ $errors->has('endDate') ? ' is-invalid' : '' }}" name="endDate" required>
                    
                                            @if ($errors->has('endDate'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('endDate') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="offset-md-3 col-md-2">
                                            <button type="submit" class="btn btn-secondary btn-sm">
                                                {{ __('Add Event') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection