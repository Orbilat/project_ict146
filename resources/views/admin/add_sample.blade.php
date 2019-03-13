@extends('layouts.admin_app')

@section('content')
{{-- SUCCESS MESSAGE OF ADDING CLIENT --}}
@if(Session::has('flash_client_added'))
<div class="alert alert-info offset-md-1 col-md-10">
    <a class="close" data-dismiss="alert">×</a>
    <strong>Notification:</strong> {!!Session::get('flash_client_added')!!}
</div>
@endif
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Add Samples to Client
                    <a href="{{ route('clients-admin') }}" class="glyphicon glyphicon-plus float-right">Back</a>
                </div>   
                <div class="card-body">
                    <form action="{{ route('addSample-admin') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="nameOfPerson" class="col-md-4 col-form-label text-md-right">{{ __('Client Name') }}</label>

                            <div class="col-md-6">
                                <input id="nameOfPerson" type="text" class="form-control{{ $errors->has('nameOfPerson') ? ' is-invalid' : '' }}" name="nameOfPerson" value="{{ old('nameOfPerson') }}" required autofocus>

                                @if ($errors->has('nameOfPerson'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nameOfPerson') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nameOfEntity" class="col-md-4 col-form-label text-md-right">{{ __('Entity Name') }}</label>

                            <div class="col-md-6">
                                <input id="nameOfEntity" type="text" class="form-control{{ $errors->has('nameOfEntity') ? ' is-invalid' : '' }}" name="nameOfEntity" value="{{ old('nameOfEntity') }}" placeholder="Optional" autofocus>

                                @if ($errors->has('nameOfEntity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nameOfEntity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contactNumber" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="contactNumber" type="text" class="form-control{{ $errors->has('contactNumber') ? ' is-invalid' : '' }}" name="contactNumber" required autofocus>

                                @if ($errors->has('contactNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contactNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="faxNumber" class="col-md-4 col-form-label text-md-right">{{ __('Fax') }}</label>

                            <div class="col-md-6">
                                <input id="faxNumber" type="text" class="form-control{{ $errors->has('faxNumber') ? ' is-invalid' : '' }}" name="faxNumber">

                                @if ($errors->has('faxNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('faxNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emailAddress" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="emailAddress" type="email" class="form-control{{ $errors->has('emailAddress') ? ' is-invalid' : '' }}" name="emailAddress" value="{{ old('emailAddress') }}" autofocus>

                                @if ($errors->has('emailAddress'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emailAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dateOfSubmission" class="col-md-4 col-form-label text-md-right">{{ __('Date Submitted') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="dateOfSubmission" id="dateOfSubmission" class="form-control{{ $errors->has('dateOfSubmission') ? ' is-invalid' : '' }}" required>
                                @if ($errors->has('dateOfSubmission'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dateOfSubmission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Add Sample') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
