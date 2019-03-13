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
                            <label for="clientsCode" class="col-md-4 col-form-label text-md-right">{{ __('Client Code') }}</label>

                            <div class="col-md-6">
                                <input id="clientsCode" type="text" class="form-control{{ $errors->has('clientsCode') ? ' is-invalid' : '' }}" name="clientsCode" value="{{ old('clientsCode') }}" placeholder="Optional" autofocus>

                                @if ($errors->has('clientsCode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('clientsCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sampleMatrix" class="col-md-4 col-form-label text-md-right">{{ __('Sample Matrix') }}</label>

                            <div class="col-md-6">
                                <input id="sampleMatrix" type="text" class="form-control{{ $errors->has('sampleMatrix') ? ' is-invalid' : '' }}" name="sampleMatrix" value="{{ old('sampleMatrix') }}" required autofocus>

                                @if ($errors->has('sampleMatrix'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sampleMatrix') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="collectionTime" class="col-md-4 col-form-label text-md-right">{{ __('Collection Time') }}</label>

                            <div class="col-md-6">
                                <input id="collectionTime" type="time" class="form-control{{ $errors->has('collectionTime') ? ' is-invalid' : '' }}" name="collectionTime" value="{{ old('collectionTime') }}" required autofocus>

                                @if ($errors->has('collectionTime'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('collectionTime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="samplePreservation" class="col-md-4 col-form-label text-md-right">{{ __('Sample Preservation') }}</label>

                            <div class="col-md-6">
                                <input id="samplePreservation" type="text" class="form-control{{ $errors->has('samplePreservation') ? ' is-invalid' : '' }}" name="samplePreservation" value="{{ old('samplePreservation') }}" required autofocus>

                                @if ($errors->has('samplePreservation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('samplePreservation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                                <label for="samplePreservation" class="col-md-4 col-form-label text-md-right">{{ __('Sample Preservation') }}</label>
    
                                <div class="col-md-6">
                                    <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                            <option value="AL">Alabama</option>
                                              ...
                                            <option value="WY">Wyoming</option>
                                    </select>
                                    @if ($errors->has('samplePreservation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('samplePreservation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="purposeOfAnalysis" class="col-md-4 col-form-label text-md-right">{{ __('Purpose of Analysis') }}</label>

                            <div class="col-md-6">
                                <input id="purposeOfAnalysis" type="text" class="form-control{{ $errors->has('purposeOfAnalysis') ? ' is-invalid' : '' }}" name="purposeOfAnalysis" value="{{ old('purposeOfAnalysis') }}" required autofocus>

                                @if ($errors->has('purposeOfAnalysis'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('purposeOfAnalysis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sampleSource" class="col-md-4 col-form-label text-md-right">{{ __('Sample Source') }}</label>

                            <div class="col-md-6">
                                <input id="sampleSource" type="text" class="form-control{{ $errors->has('sampleSource') ? ' is-invalid' : '' }}" name="sampleSource" value="{{ old('sampleSource') }}" required autofocus>

                                @if ($errors->has('sampleSource'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sampleSource') }}</strong>
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
                                        <strong>{{ $errors->first('dueDate') }}</strong>
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
