@extends('layouts.secretary_app')

<body>


@section('content')

<form method="POST" action="{{ route('addClient-secretary') }}">
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

                                
                                <div class="form-group row">
                                    <label for="clientCode" class="col-md-4 col-form-label text-md-right">{{ __('Client Code') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="clientCode" type="text" class="form-control{{ $errors->has('clientCode') ? ' is-invalid' : '' }}" name="clientCode" required autofocus>
        
                                        @if ($errors->has('clientCode'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('contactNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sampleMatrix" class="col-md-4 col-form-label text-md-right">{{ __('Sample Matrix') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="sampleMatrix" type="text" class="form-control{{ $errors->has('sampleMatrix') ? ' is-invalid' : '' }}" name="sampleMatrix" required autofocus>
        
                                        @if ($errors->has('sampleMatrix'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('contactNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="collectionTime" class="col-md-4 col-form-label text-md-right">{{ __('Collection Time') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="collectionTime" type="text" class="form-control{{ $errors->has('collectionTime') ? ' is-invalid' : '' }}" name="collectionTime" required autofocus>

                                        @if ($errors->has('collectionTime'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('contactNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <!-- <div class="form-group row">
                                    <label for="samplePreservation" class="col-md-4 col-form-label text-md-right">{{ __('Sample Preservation') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="samplePreservation" type="text" class="form-control{{ $errors->has('samplePreservation') ? ' is-invalid' : '' }}" name="samplePreservation" value="{{ old('samplePreservation') }}" required autofocus>
        
                                        @if ($errors->has('samplePreservation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('samplePreservation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div> -->
<!--                                 
                                <div class="form-group row">
                                    <label for="samplePreservation" class="col-md-4 col-form-label text-md-right">{{ __('Sample Preservation') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="samplePreservation" type="text" class="form-control{{ $errors->has('samplePreservation') ? ' is-invalid' : '' }}" name="samplePreservation" required autofocus>
        
                                        @if ($errors->has('samplePreservation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('contactNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                
                                

                                <div class="form-group row">
                                    <label for="sampleSource" class="col-md-4 col-form-label text-md-right">{{ __('Sample Source') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="sampleSource" type="text" class="form-control{{ $errors->has('sampleSource') ? ' is-invalid' : '' }}" name="sampleSource" required autofocus>
        
                                        @if ($errors->has('sampleSource'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('contactNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="dueDate" class="col-md-4 col-form-label text-md-right">{{ __('Due Date') }}</label>
        
                                    <div class="col-md-6">
                                        <input type="date" name="dueDate" id="dueDate" class="form-control{{ $errors->has('dueDate') ? ' is-invalid' : '' }}" required>
                                        @if ($errors->has('dueDate'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dateOfSubmission') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                
        -->
                                <div class="form-group row">
                                    <label for="dueDate" class="col-md-4 col-form-label text-md-right">{{ __('Due Date') }}</label>
        
                                    <div class="col-md-6">
                                        <input type="date" name="dueDate" id="dueDate" class="form-control{{ $errors->has('dueDate') ? ' is-invalid' : '' }}" required>
                                        @if ($errors->has('dueDate'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dateOfSubmission') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-secondary">
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </div> 
                            </form>
</body>

@endsection