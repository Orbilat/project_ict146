@extends('layouts.admin_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Accounts</div>

                <div class="card-body">
                    <table class="table table-condensed">
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
                                <td>{{ $account->employeeName }}</td>
                                <td>{{ $account->username }}</td>
                                <td>{{ $account->position }}</td>
                                <td>{{ $account->idNumber }}</td>
                                <td>{{ $account->licenseNumber }}</td>
                                <td>{{ $account->managedBy }}</td>
                                <td>{{ date("F jS, Y", strtotime($account->managedDate)) }}</td>
                            @endforeach
                                <td><button type="button" class="btn btn-info">Edit</button>&nbsp;&nbsp;<button type="button" class="btn btn-danger">Delete</button></td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
