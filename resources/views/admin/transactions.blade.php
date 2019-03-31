@extends('layouts.admin_app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Transactions</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                {{-- TABLE HEADER --}}
                                <th class="admin-table">RIS</th>
                                <th class="admin-table">Name of Person</th>
                                <th class="admin-table">Name of Entity</th>
                                <th class="admin-table">Discount</th>
                                <th class="admin-table">Deposit</th>
                                <th class="admin-table">Test Result</th>
                                <th class="admin-table">Reclaim Sample</th>
                                <th class="admin-table">Remarks</th>
                                <th class="admin-table">Managed By</th>
                                <th class="admin-table">Date Submitted</th>
                                {{-- TABLE HEADER END --}}
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($transactions as $transaction)
                                <tr class="collapsible">
                                    {{-- TABLE BODY --}}
                                    <td class="admin-table">{{ $transaction->risNumber }}</td>
                                    <td class="admin-table">{{ $transaction->nameOfPerson }}</td>
                                    <td class="admin-table">{{ $transaction->nameOfEntity }}</td>
                                    <td class="admin-table">
                                        @php
                                            if($transaction->discount < 1){
                                                echo "0%";
                                            }
                                            else {
                                                echo $transaction->discount.'%';
                                            }
                                        @endphp
                                    </td>
                                    <td class="admin-table">
                                            @php
                                            if($transaction->deposit < 1){
                                                echo "0";
                                            }
                                            else {
                                                echo $transaction->deposit;
                                            }
                                        @endphp
                                    </td>
                                    <td class="admin-table">{{ $transaction->testResult }}</td>
                                    <td class="admin-table">
                                        @php
                                            if ($transaction->reclaimSample >= 1){
                                                echo "Yes";
                                            }
                                            else {
                                                echo "No";
                                            }
                                        @endphp
                                    </td>
                                    <td class="admin-table">{{ $transaction->remarks }}</td>
                                    <td class="admin-table">{{ $transaction->managedBy }}</td>
                                    <td class="admin-table">{{ date("F jS, Y g:m A", strtotime($transaction->managedDate)) }}</td>
                                    <tr>
                                        <td class="content">
                                            Hello
                                        </td>
                                    </tr>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
