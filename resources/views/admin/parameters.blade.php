@extends('layouts.admin_app')

@section('content')

{{-- DECLARING OF COUNTER VARIABLE FOR MULTIPLE MODALS --}}
<?php $count = 0; ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Analyses
                    &nbsp;
                    <a href="#addParameter" id="addNew" class="glyphicon glyphicon-plus" data-toggle="collapse" onclick="changeText()">Add new</a>
                    <form class="float-right" action="GET">
                        {{-- <input class="float-right" type="submit" value="Search"> --}}
                        <input class="float-right" type="text" name="searchBox" id="searchBox" placeholder="Search analysis...">
                    </form>
                <div id="addParameter" @if($errors->any()) class="collapse.show" @else class="collapse" @endif>
                    <div class="card-body">
                            <form method="POST" action="{{ route('addParameter-admin') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="analysis" class="col-md-4 col-form-label text-md-right">{{ __('Analysis') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="analysis" type="text" class="form-control{{ $errors->has('analysis') ? ' is-invalid' : '' }}" name="analysis" value="{{ old('analysis') }}" required autofocus>
        
                                        @if ($errors->has('analysis'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('analysis') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="method" class="col-md-4 col-form-label text-md-right">{{ __('Method') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="method" type="textbox" class="form-control{{ $errors->has('method') ? ' is-invalid' : '' }}" name="method" value="{{ old('method') }}" placeholder="Optional" autofocus>
        
                                        @if ($errors->has('method'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('method') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="0.00" autofocus>
        
                                        @if ($errors->has('price'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="station" class="col-md-4 col-form-label text-md-right">{{ __('Station') }}</label>
        
                                    <div class="col-md-6">
                                        <select id="station" type="text" class="form-control{{ $errors->has('station') ? ' is-invalid' : '' }}" name="station">
                                            <option value="Station 1">Station 1</option>
                                            <option value="Station 2">Station 2</option>
                                            <option value="Station 3">Station 3</option>                                    
                                        </select>
                                        @if ($errors->has('station'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('station') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-secondary">
                                            {{ __('Add Parameter') }}
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
                                <th class="admin-table">Analysis</th>
                                <th class="admin-table">Method</th>
                                <th class="admin-table">Price</th>
                                <th class="admin-table">Station</th>
                                <th class="admin-table">Managed By</th>
                                <th class="admin-table">Managed At</th>
                                <th class="admin-table">Functions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parameters as $parameter)
                            <tr>
                                <td class="admin-table">{{ $parameter->analysis }}</td>
                                <td class="admin-table">{{ $parameter->method }}</td>
                                <td class="admin-table">{{ $parameter->price }}</td>
                                <td class="admin-table">{{ $parameter->stationName }}</td>
                                <td class="admin-table">{{ $parameter->managedBy }}</td>
                                <td class="admin-table">{{ date("F jS, Y H:m", strtotime($parameter->managedDate)) }}</td>
                                <td>
                                    {{-- EDIT BUTTON --}}
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editAccount{{ $count }}">Edit</button>
                                    <div id="editAccount{{ $count }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header editModal">
                                                    <h5 class="modal-title">Edit Parameter</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form method="POST" action="{{ route('updateParameter-admin', [$parameter->parameterId]) }}">
                                                    @method('PATCH')
                                                    @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label for="analysis" class="col-md-4 col-form-label text-md-right">{{ __('Analysis') }}</label>
                            
                                                        <div class="col-md-6">
                                                            <input id="analysis" type="text" class="form-control{{ $errors->has('analysis') ? ' is-invalid' : '' }}" name="analysis" value="{{ $parameter->analysis }}"  autofocus>
                            
                                                            @if ($errors->has('analysis'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('analysis') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                            
                                                    <div class="form-group row">
                                                        <label for="method" class="col-md-4 col-form-label text-md-right">{{ __('Method') }}</label>
                            
                                                        <div class="col-md-6">
                                                            <input id="method" type="textbox" class="form-control{{ $errors->has('method') ? ' is-invalid' : '' }}" name="method" value="{{ $parameter->method }}" autofocus>
                            
                                                            @if ($errors->has('method'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('method') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
                            
                                                        <div class="col-md-6">
                                                            <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $parameter->price }}" autofocus>
                            
                                                            @if ($errors->has('price'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('price') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div> 

                                                    <div class="form-group row">
                                                        <label for="station" class="col-md-4 col-form-label text-md-right">{{ __('Station') }}</label>
                            
                                                        <div class="col-md-6">
                                                            <select id="station" type="text" class="form-control{{ $errors->has('station') ? ' is-invalid' : '' }}" name="station">
                                                                <option value="Station 1" @if($parameter->stationName == 'Station 1') selected @endif>Station 1</option>
                                                                <option value="Station 2" @if($parameter->stationName == 'Station 2') selected @endif>Station 2</option>
                                                                <option value="Station 3" @if($parameter->stationName == 'Station 3') selected @endif>Station 3</option>                                    
                                                            </select>
                                                            @if ($errors->has('station'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('station') }}</strong>
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
                                </div>
                                    &nbsp;&nbsp; 
                                {{-- DELETE BUTTON --}}
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAccount{{ $count }}">Delete</button>
                                <div id="deleteAccount{{ $count }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header deleteModal">
                                                <h5 class="modal-title">Delete Parameter</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete {{ $parameter->analysis }} Analysis?</p>                   
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('deleteParameter-admin', [$parameter->parameterId])}}" method="post">
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
                    {{ $parameters->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
