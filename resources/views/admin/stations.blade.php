@extends('layouts.admin_app')

@section('content')

{{-- DECLARING OF COUNTER VARIABLE FOR MULTIPLE MODALS --}}
<?php $count = 0; ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Stations
                    &nbsp;
                    <a href="#addStation" id="addNew" class="glyphicon glyphicon-plus" data-toggle="collapse" onclick="changeText()">Add new</a>
                    <form class="float-right" action="GET">
                        {{-- <input class="float-right" type="submit" value="Search"> --}}
                        <input class="float-right" type="text" name="searchBox" id="searchBox" placeholder="Search station...">
                    </form>
                <div id="addStation" @if($errors->any()) class="collapse.show" @else class="collapse" @endif>
                    <div class="card-body">
                            <form method="POST" action="{{ route('addStation-admin') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="stationName" class="col-md-4 col-form-label text-md-right">{{ __('Station Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="stationName" type="text" class="form-control{{ $errors->has('stationName') ? ' is-invalid' : '' }}" name="stationName" value="{{ old('stationName') }}" required autofocus>
        
                                        @if ($errors->has('stationName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('stationName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-secondary">
                                            {{ __('Add Station') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th class="admin-table">Station Name</th>
                                <th class="admin-table">Updated By</th>
                                <th class="admin-table">Updated At</th>
                                <th class="admin-table">Functions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stations as $station)
                            <tr>
                                <td class="admin-table">{{ $station->stationName }}</td>
                                <td class="admin-table">{{ $station->managedBy }}</td>
                                <td class="admin-table">{{ $station->managedDate }}</td>
                                <td class="admin-table">
                                    {{-- EDIT BUTTON --}}
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editSupplier{{ $count }}">Edit</button>
                                    <div id="editSupplier{{ $count }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header editModal">
                                                    <h5 class="modal-title">Edit Station</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form method="POST" action="{{ route('updateSupplier-admin', [$station->stationId])}}">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="modal-body">
                                                        
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
                                                    <h5 class="modal-title">Delete Station</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                <p>Are you sure you want to delete {{ $station->stationName }} account?</p>                          
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('deleteSupplier-admin', [$station->stationId]) }}" method="post">
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
                    {{ $stations->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
