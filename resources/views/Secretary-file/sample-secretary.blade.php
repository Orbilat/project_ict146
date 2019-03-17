@extends('layouts.secretary_app')




@section('content')
{
    <form method="POST" action="{{ route('createSample-secretary') }}">

        
        
        @csrf
        
        <input type="hidden" name="clientId" value="{{$clientId}}">
        <input type="hidden" name="risNumber" value="{{$risNumber}}">

        <div class="form-group row">
            <label for="clientsCode" class="col-md-4 col-form-label text-md-right">{{ __('Client Code') }}</label>

            <div class="col-md-6">
                <input id="clientsCode" type="text" class="form-control{{ $errors->has('clientsCode') ? ' is-invalid' : '' }}" name="clientsCode" value="{{ old('clientsCode') }}" required autofocus>

                @if ($errors->has('clientsCode'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('clientsCode') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="sampleType" class="col-md-4 col-form-label text-md-right">{{ __('Sample Type') }}</label>

            <div class="col-md-6">
                <input id="sampleType" type="text" class="form-control{{ $errors->has('sampleType') ? ' is-invalid' : '' }}" name="sampleType" value="{{ old('sampleType') }}" required autofocus>

                @if ($errors->has('sampleType'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sampleType') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group row">
            <label for="sampleCollection" class="col-md-4 col-form-label text-md-right">{{ __('Collection Time') }}</label>

            <div class="col-md-6">
                <input id="sampleCollection" type="date" class="form-control{{ $errors->has('sampleCollection') ? ' is-invalid' : '' }}" name="sampleCollection" required autofocus>

                @if ($errors->has('sampleCollection'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sampleCollection') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        
        <div class="form-group row">
            <label for="sampleCollection" class="col-md-4 col-form-label text-md-right">{{ __('Collection Time') }}</label>

            <div class="col-md-6">
                <input id="sampleCollection" type="date" class="form-control{{ $errors->has('sampleCollection') ? ' is-invalid' : '' }}" name="sampleCollection" required autofocus>

                @if ($errors->has('sampleCollection'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sampleCollection') }}</strong>
                    </span>
                @endif
            </div>
        </div>



        <div class="form-group row">
            <label for="samplePreservation" class="col-md-4 col-form-label text-md-right">{{ __('Sample Preservation') }}</label>

            <div class="col-md-6">
                <input id="samplePreservation" type="text" class="form-control{{ $errors->has('samplePreservation') ? ' is-invalid' : '' }}" name="samplePreservation" value="{{ old('samplePreservation') }}" placeholder="Optional" autofocus>

                @if ($errors->has('samplePreservation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('samplePreservation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="purposeOfAnalysis" class="col-md-4 col-form-label text-md-right">{{ __('Purpose Of Analysis') }}</label>

            <div class="col-md-6">
                <input id="purposeOfAnalysis" type="text" class="form-control{{ $errors->has('purposeOfAnalysis') ? ' is-invalid' : '' }}" name="purposeOfAnalysis" value="{{ old('samplePreservation') }}" placeholder="Optional" autofocus>

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
                <input id="dueDate" type="date" class="form-control{{ $errors->has('dueDate') ? ' is-invalid' : '' }}" name="dueDate" required autofocus>

                @if ($errors->has('sampleCollection'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sampleCollection') }}</strong>
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
}

@endsection