@extends('layouts.admin_app')

@section('content')
<div class="container">
<<<<<<< HEAD:resources/views/admin/home.blade.php
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

                   <p> You are logged in! </p>
    
                </div>
            </div>
        </div>
    </div>
=======
    <p>WELCOME PAGE!</p>
>>>>>>> e51d4fa04dfc2826df049dfe41e781e2c55b173a:resources/views/home.blade.php
</div>
@endsection
