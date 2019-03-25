@extends('layouts.admin_app')

@section('content')
{{-- SUCCESS MESSAGE OF ADDING ITEM --}}
@if(Session::has('flash_item_added'))
<div class="alert alert-info offset-md-1 col-md-10">
    <a class="close" data-dismiss="alert">×</a>
    <strong>Notification:</strong> {!!Session::get('flash_item_added')!!}
</div>
@endif
{{-- SUCCESS MESSAGE OF DELETING ITEM --}}
@if(Session::has('flash_item_deleted'))
<div class="alert alert-info offset-md-1 col-md-10">
    <a class="close" data-dismiss="alert">×</a>
    <strong>Notification:</strong> {!!Session::get('flash_item_deleted')!!}
</div>
@endif
{{-- SUCCESS MESSAGE OF UPDATING ITEM --}}
@if(Session::has('flash_item_updated'))
<div class="alert alert-info offset-md-1 col-md-10">
    <a class="close" data-dismiss="alert">×</a>
    <strong>Notification:</strong> {!!Session::get('flash_item_updated')!!}
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
                <div class="card-header">Inventory - Glassware &nbsp; &nbsp;
                <a href="#addItem" id="addNew" class="glyphicon glyphicon-plus" data-toggle="collapse" onclick="changeText()">Add new</a>
                <form class="float-right" action="GET">
                    <input class="float-right" type="text" name="searchBox" id="searchBox" placeholder="Search analysis...">
                </form>
                <div id="addItem" @if($errors->any()) class="collapse.show" @else class="collapse" @endif>
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
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th class="admin-table">Name of Item</th>
                            <th class="admin-table">Container Type</th>
                            <th class="admin-table">Volume Capacity</th>
                            <th class="admin-table">Quantity</th>
                            <th class="admin-table">Supplier</th>
                            <th class="admin-table">Functions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
