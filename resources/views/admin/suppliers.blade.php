@extends('layouts.admin_app')

@section('content')
{{-- SUCCESS MESSAGE OF ADDING SUPPLIER --}}
    @if(Session::has('flash_supplier_added'))
        <div class="alert alert-info offset-md-1 col-md-10">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Notification:</strong> {!!Session::get('flash_supplier_added')!!}
        </div>
    @endif
{{-- SUCCESS MESSAGE OF DELETING SUPPLIER --}}
    @if(Session::has('flash_supplier_deleted'))
        <div class="alert alert-info offset-md-1 col-md-10">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Notification:</strong> {!!Session::get('flash_supplier_deleted')!!}
        </div>
    @endif
{{-- SUCCESS MESSAGE OF UPDATING SUPPLIER --}}
    @if(Session::has('flash_supplier_updated'))
        <div class="alert alert-info offset-md-1 col-md-10">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Notification:</strong> {!!Session::get('flash_supplier_updated')!!}
        </div>
    @endif
{{-- VALIDATION CHECKS --}}
    @if ($errors->any())
    <div class="alert alert-danger pb-0 offset-md-1 col-md-10">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
                <p>Please try again.</p>
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
                    Supplier
                    &nbsp;
                    <a href="#addSupplier" id="addNew" class="glyphicon glyphicon-plus" data-toggle="collapse" onclick="changeText()">Add new</a>
                    <form class="float-right" action="GET">
                        {{-- <input class="float-right" type="submit" value="Search"> --}}
                        <input class="float-right" type="text" name="searchBox" id="searchBox" placeholder="Search supplier...">
                    </form>
                <div id="addSupplier" @if($errors->any()) class="collapse.show" @else class="collapse" @endif>
                    <div class="card-body">
                            <form method="POST" action="{{ route('addSupplier-admin') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="companyName" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="companyName" type="text" class="form-control{{ $errors->has('companyName') ? ' is-invalid' : '' }}" name="companyName" value="{{ old('companyName') }}" required autofocus>
        
                                        @if ($errors->has('companyName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('companyName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="emailAddress" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="emailAddress" type="email" class="form-control{{ $errors->has('emailAddress') ? ' is-invalid' : '' }}" name="emailAddress" required>
        
                                        @if ($errors->has('emailAddress'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('emailAddress') }}</strong>
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
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-secondary">
                                            {{ __('Add Supplier') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="admin-table">Company Name</th>
                                <th class="admin-table">Email Address</th>
                                <th class="admin-table">Contact No.</th>
                                <th class="admin-table">Updated By</th>
                                <th class="admin-table">Updated At</th>
                                <th class="admin-table">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                            <tr>
                                <td class="admin-table">{{ $supplier->companyName }}</td>
                                <td class="admin-table">{{ $supplier->emailAddress }}</td>
                                <td class="admin-table">{{ $supplier->contactNumber }}</td>
                                <td class="admin-table">{{ $supplier->managedBy }}</td>
                                <td class="admin-table">{{ $supplier->managedDate }}</td>
                                <td class="admin-table">
                                    {{-- EDIT BUTTON --}}
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editSupplier{{ $count }}">Edit</button>
                                    <div id="editSupplier{{ $count }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header editModal">
                                                    <h5 class="modal-title">Edit Supplier</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form method="POST" action="{{ route('updateSupplier-admin', [$supplier->supplierId])}}">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="companyName" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <input id="companyName" type="text" class="form-control{{ $errors->has('companyName') ? ' is-invalid' : '' }}" name="companyName" value="{{ $supplier->companyName }}" required autofocus>
                                
                                                                @if ($errors->has('companyName'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('companyName') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row">
                                                            <label for="emailAddress" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <input id="emailAddress" type="email" class="form-control{{ $errors->has('emailAddress') ? ' is-invalid' : '' }}" name="emailAddress" value="{{ $supplier->emailAddress }}" required autofocus>
                                
                                                                @if ($errors->has('emailAddress'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('emailAddress') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row">
                                                            <label for="contactNumber" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <input id="contactNumber" type="text" class="form-control{{ $errors->has('contactNumber') ? ' is-invalid' : '' }}" name="contactNumber" value="{{ $supplier->contactNumber }}" required autofocus>
                                
                                                                @if ($errors->has('contactNumber'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('contactNumber') }}</strong>
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
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteSupplier{{ $count }}">Delete</button>
                                    <div id="deleteSupplier{{ $count }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header deleteModal">
                                                    <h5 class="modal-title">Delete Supplier</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                <p>Are you sure you want to delete supplier: {{ $supplier->companyName }}?</p>                          
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('deleteSupplier-admin', [$supplier->supplierId]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                            
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{-- COUNT INCREMENTS --}}
                            <?php $count++; ?>
                            @endforeach
                        </tbody>
                    </table>           
                </div>
            </div>
            <div class="offset-md-5 mt-3">
                    {{ $suppliers->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
