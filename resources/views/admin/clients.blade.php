@extends('layouts.admin_app')

@section('content')
{{-- SUCCESS MESSAGE OF DELETING CLIENT --}}
@if(Session::has('flash_client_deleted'))
    <div class="alert alert-info offset-md-1 col-md-10">
        <a class="close" data-dismiss="alert">×</a>
        <strong>Notification:</strong> {!!Session::get('flash_client_deleted')!!}
    </div>
@endif
{{-- SUCCESS MESSAGE OF UPDATING CLIENT --}}
@if(Session::has('flash_client_updated'))
    <div class="alert alert-info offset-md-1 col-md-10">
        <a class="close" data-dismiss="alert">×</a>
        <strong>Notification:</strong> {!!Session::get('flash_client_updated')!!}
    </div>
@endif
{{-- VALIDATION CHECKS --}}
@if ($errors->any())
<div class="alert alert-danger pb-0 offset-md-1 col-md-10">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
            <p>&nbsp;Please try again.</p>
    </ul>
</div>
@endif
{{-- DECLARING OF COUNTER VARIABLE FOR MULTIPLE MODALS --}}
<?php $count = 0; ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Clients
                    &nbsp;
                    <a href="#addClient" id="addNew" class="glyphicon glyphicon-plus" data-toggle="collapse" onclick="changeText()">Add new</a>
                    <form class="float-right" action="GET">
                        {{-- <input class="float-right" type="submit" value="Search"> --}}
                        <input class="float-right" type="text" name="searchBox" id="searchBox" placeholder="Search client...">
                    </form>
                <div id="addClient" @if($errors->any()) class="collapse.show" @else class="collapse" @endif>
                    <div class="card-body">
                            {{-- FORM FOR ADDING CLIENT HERE --}}
                            <form method="POST" action="{{ route('addClient-admin') }}">
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
                                        <input id="contactNumber" type="text" class="form-control{{ $errors->has('contactNumber') ? ' is-invalid' : '' }}" name="contactNumber" value="{{ old('contactNumber') }}" required autofocus>
        
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
                                        <input id="faxNumber" type="text" class="form-control{{ $errors->has('faxNumber') ? ' is-invalid' : '' }}" name="faxNumber" value="{{ old('faxNumber') }}" placeholder="Optional">
        
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
                                        <input id="emailAddress" type="email" class="form-control{{ $errors->has('emailAddress') ? ' is-invalid' : '' }}" name="emailAddress" value="{{ old('emailAddress') }}" placeholder="Optional" autofocus>
        
                                        @if ($errors->has('emailAddress'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('emailAddress') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="discount" type="number" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount" value="{{ old('discount') }}" placeholder="Optional">
        
                                        @if ($errors->has('discount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('discount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="addedCharges" class="col-md-4 col-form-label text-md-right">{{ __('Added Charges') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="addedCharges" type="number" class="form-control{{ $errors->has('addedCharges') ? ' is-invalid' : '' }}" name="addedCharges" value="{{ old('addedCharges') }}" placeholder="Optional">
        
                                        @if ($errors->has('addedCharges'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('addedCharges') }}</strong>
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
                                            {{ __('Add Client') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{-- END FORM --}}
                        </div>
                    </div>
                </div>
                {{-- TABLE FOR DISPLAYING CLIENTS --}}
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- TABLE HEADER --}}
                                <th>RIS #</th>
                                <th>Client Name</th>
                                <th>Entity Name</th>
                                <th>Address</th>
                                <th>Contact No.</th>
                                <th>Fax</th>
                                <th>Email</th>
                                <th>Date Submitted</th>
                                <th>Status</th>
                                {{-- TABLE HEADER END --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                {{-- TABLE BODY --}}
                                <td>{{ $client->risNumber }}</td>
                                <td>{{ $client->nameOfPerson }}</td>
                                <td>{{ $client->nameOfEntity }}</td>
                                <td>{{ $client->address }}</td>
                                <td>{{ $client->contactNumber }}</td>
                                <td>{{ $client->faxNumber }}</td>
                                <td>{{ $client->emailAddress }}</td>
                                <td>{{ date("F jS, Y", strtotime($client->dateOfSubmission)) }}</td>
                                <td>
                                    {{-- EDIT BUTTON --}}
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editClient{{ $count }}">Edit</button>
                                    <div id="editClient{{ $count }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header editModal">
                                                    <h5 class="modal-title">Edit Client Information</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form method="POST" action="{{ route('updateClient-admin', ['clientId' => $client->clientId]) }}">
                                                    @method('PATCH')
                                                    @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label for="nameOfPerson" class="col-md-4 col-form-label text-md-right">{{ __('Client Name') }}</label>
                            
                                                        <div class="col-md-6">
                                                            <input id="nameOfPerson" type="text" class="form-control{{ $errors->has('nameOfPerson') ? ' is-invalid' : '' }}" name="nameOfPerson" value="{{ $client->nameOfPerson }}" required autofocus>
                            
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
                                                            <input id="nameOfEntity" type="text" class="form-control{{ $errors->has('nameOfEntity') ? ' is-invalid' : '' }}" name="nameOfEntity" value="{{ $client->nameOfEntity }}" autofocus>
                            
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
                                                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $client->address }}" required autofocus>
                            
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
                                                            <input id="contactNumber" type="text" class="form-control{{ $errors->has('contactNumber') ? ' is-invalid' : '' }}" name="contactNumber" value="{{ $client->contactNumber }}" required autofocus>
                            
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
                                                            <input id="faxNumber" type="text" class="form-control{{ $errors->has('faxNumber') ? ' is-invalid' : '' }}" name="faxNumber" value="{{ $client->faxNumber }}">
                            
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
                                                            <input id="emailAddress" type="email" class="form-control{{ $errors->has('emailAddress') ? ' is-invalid' : '' }}" name="emailAddress" value="{{ $client->emailAddress }}" autofocus>
                            
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
                                                            <input type="date" name="dateOfSubmission" id="dateOfSubmission" class="form-control{{ $errors->has('dateOfSubmission') ? ' is-invalid' : '' }}" value="{{ date('dd-mm-yyyy', strtotime($client->address)) }}" required>
                                                            @if ($errors->has('dateOfSubmission'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('dateOfSubmission') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                            </div> 
                                        </div>
                                    </div>
                                    &nbsp;&nbsp; 
                                    {{-- DELETE BUTTON --}}
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccount{{ $count }}">Delete</button>
                                    <div id="deleteAccount{{ $count }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header deleteModal">
                                                    <h5 class="modal-title">Delete Client</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Deleting RIS: {{ $client->risNumber }} will remove other related data (samples, payments).
                                                        <br><br>
                                                        Do you wish to continue?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('deleteClient-admin', [$client->clientId])}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    {{-- DELETE BUTTON END --}}
                                </td>
                                {{-- TABLE BODY END --}}
                            </tr>
                            {{-- COUNT INCREMENTS --}}
                            <?php $count++; ?>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- TABLE END   --}}
                </div>
            </div>
            {{-- PAGINATION LINKS (PAGINATION:6) --}}
            <div class="offset-md-5 mt-3">
                    {{ $clients->links() }}
            </div>
            {{-- PAGINATION END --}}
        </div>
    </div>
</div>

@endsection
