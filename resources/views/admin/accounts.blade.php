@extends('layouts.admin_app')

@section('content')
{{-- SUCCESS MESSAGE OF ADDING ACCOUNT --}}
    @if(Session::has('flash_account_added'))
    <div class="alert alert-info offset-md-2 col-md-8">
        <a class="close" data-dismiss="alert">×</a>
        <strong>Notification</strong> {!!Session::get('flash_account_added')!!}
    </div>
    @endif
{{-- SUCCESS MESSAGE OF DELETING ACCOUNT --}}
    @if(Session::has('flash_account_deleted'))
        <div class="alert alert-info offset-md-2 col-md-8">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Notification:</strong> {!!Session::get('flash_account_deleted')!!}
        </div>
    @endif
{{-- SUCCESS MESSAGE OF DELETING ACCOUNT --}}
    @if(Session::has('flash_account_updated'))
    <div class="alert alert-info offset-md-2 col-md-8">
        <a class="close" data-dismiss="alert">×</a>
        <strong>Notification:</strong> {!!Session::get('flash_account_updated')!!}
    </div>
    @endif
{{-- VALIDATION CHECKS --}}
    @if ($errors->any())
    <div class="alert alert-danger pb-0 offset-md-2 col-md-8">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
                <p>Please try again.</p>
        </ul>
    </div>
    @endif

<?php $count = 0; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Accounts
                    &nbsp;
                    <a href="#addAccount" id="addNew" class="glyphicon glyphicon-plus" data-toggle="collapse" onclick="changeText()">Add new</a>
                    <form class="float-right" action="GET">
                        {{-- <input class="float-right" type="submit" value="Search"> --}}
                        <input class="float-right" type="text" name="searchBox" id="searchBox" placeholder="Search employee...">
                    </form>
                <div id="addAccount" @if($errors->any()) class="collapse.show" @else class="collapse" @endif>
                    <div class="card-body">
                            <form method="POST" action="{{ route('addAccount') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('name') }}" required autofocus>
        
                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="employeeName" class="col-md-4 col-form-label text-md-right">{{ __('Employee Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="employeeName" type="text" class="form-control{{ $errors->has('employeeName') ? ' is-invalid' : '' }}" name="employeeName" value="{{ old('employeeName') }}" required autofocus>
        
                                        @if ($errors->has('employeeName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('employeeName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="position" type="text" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" required autofocus>
        
                                        @if ($errors->has('position'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('position') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="idNumber" class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="idNumber" type="text" class="form-control{{ $errors->has('idNumber') ? ' is-invalid' : '' }}" name="idNumber" required>
        
                                        @if ($errors->has('idNumber'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('idNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="licenseNumber" class="col-md-4 col-form-label text-md-right">{{ __('License Number') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="licenseNumber" type="text" class="form-control{{ $errors->has('licenseNumber') ? ' is-invalid' : '' }}" name="licenseNumber" required>
        
                                        @if ($errors->has('licenseNumber'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('licenseNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="userType" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
        
                                    <div class="col-md-6">
                                        <select id="userType" type="text" class="form-control{{ $errors->has('userType') ? ' is-invalid' : '' }}" name="userType">
                                            <option value="administrator">Admin</option>
                                            <option value="analyst">Analyst</option>
                                            <option value="secretary">Secretary</option>                                    
                                        </select>
                                        @if ($errors->has('userType'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('userType') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-secondary">
                                            {{ __('Add Account') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Username</th>
                                <th>Position</th>
                                <th>ID No.</th>
                                <th>License No.</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accounts as $account)
                            <tr>
                                <td>{{ $account->employeeName }}</td>
                                <td>{{ $account->username }}</td>
                                <td>{{ $account->position }}</td>
                                <td>{{ $account->idNumber }}</td>
                                <td>{{ $account->licenseNumber }}</td>
                                <td>{{ $account->managedBy }}</td>
                                <td>{{ date("F jS, Y H:m", strtotime($account->managedDate)) }}</td>
                                <td>
                                    {{-- EDIT BUTTON --}}
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editAccount{{ $count }}">Edit</button>
                                    <div id="editAccount{{ $count }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header editModal">
                                                    <h5 class="modal-title">Edit Account</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('updateAccount', [$account->employeeId])}}">
                                                            @method('PATCH')
                                                            @csrf
                                                        <div class="form-group row">
                                                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $account->username }}" required autofocus>
                                
                                                                @if ($errors->has('username'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('username') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        {{-- <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                
                                                                @if ($errors->has('password'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row">
                                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                            </div>
                                                        </div> --}}
                                
                                                        <div class="form-group row">
                                                            <label for="employeeName" class="col-md-4 col-form-label text-md-right">{{ __('Employee Name') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <input id="employeeName" type="text" class="form-control{{ $errors->has('employeeName') ? ' is-invalid' : '' }}" name="employeeName" value="{{ $account->employeeName }}" required autofocus>
                                
                                                                @if ($errors->has('employeeName'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('employeeName') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row">
                                                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <input id="position" type="text" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ $account->position }}" required autofocus>
                                
                                                                @if ($errors->has('position'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('position') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="idNumber" class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <input id="idNumber" type="text" class="form-control{{ $errors->has('idNumber') ? ' is-invalid' : '' }}" name="idNumber" value="{{ $account->idNumber }}" required>
                                
                                                                @if ($errors->has('idNumber'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('idNumber') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row">
                                                            <label for="licenseNumber" class="col-md-4 col-form-label text-md-right">{{ __('License Number') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <input id="licenseNumber" type="text" class="form-control{{ $errors->has('licenseNumber') ? ' is-invalid' : '' }}" name="licenseNumber" value="{{ $account->licenseNumber }}" required>
                                
                                                                @if ($errors->has('licenseNumber'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('licenseNumber') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group row">
                                                            <label for="userType" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
                                
                                                            <div class="col-md-6">
                                                                <select id="userType" type="text" class="form-control{{ $errors->has('userType') ? ' is-invalid' : '' }}" name="userType">
                                                                    <option value="administrator">Admin</option>
                                                                    <option value="analyst">Analyst</option>
                                                                    <option value="secretary">Secretary</option>                                    
                                                                </select>
                                                                @if ($errors->has('userType'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('userType') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary float-right mr-2">Save</button>
                                                    </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                       
                                                    </div>
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
                                                    <h5 class="modal-title">Delete Account</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                <p>Are you sure you want to delete {{ $account->employeeName }} account?</p>                          
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('deleteAccount', [$account->employeeId])}}" method="post">
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
                            <?php $count++; ?>
                            @endforeach
                        </tbody>
                    </table>           
                </div>
            </div>
            <div class="offset-md-5 mt-3">
                    {{ $accounts->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
