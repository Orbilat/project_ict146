@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<<<<<<< HEAD:resources/views/home.blade.php
                     CJ IS DEPRESSED
=======
                   <p> You are logged in! </p>
    
>>>>>>> 1c75a23dcb90496cf6d0c61c8bc89ee03dcd43c8:resources/views/admin/home.blade.php
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
