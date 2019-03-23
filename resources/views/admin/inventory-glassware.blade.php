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
                <div class="card-header">Inventory - Glassware</div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
