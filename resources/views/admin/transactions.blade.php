@extends('layouts.admin_app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Transactions</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
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
                                </tr>
                                <tr class="samples"><td id="collapse-td" class="admin-table" colspan="10">
                                    <div class="sample-parameter">
                                        @if($transaction->samples->isEmpty())
                                            The client has no samples!
                                        @else
                                            <h5 class="sample-header">Samples:</h5>                                    
                                            @foreach($transaction->samples as $sample)
                                                <h6 class="sample-code">{{ $sample->laboratoryCode }}</h6>
                                                @foreach($sample->parameters as $parameter)
                                                    <ol class="params">
                                                        <li>
                                                            <h6 class="param-item">{{ $parameter->analysis }}</h6>
                                                            <h6 class="param-item">{{ $parameter->pivot->status }}</h6>
                                                            <h6 class="param-item">Start Time: {{ date("F jS, Y g:m A", strtotime($parameter->managedDate)) }}</h6>
                                                            @if($parameter->pivot->timecompleted != NULL)
                                                                <h6 class="param-item">End Time: {{ date("F jS, Y g:m A", strtotime($parameter->pivot->timecompleted)) }}</h6>
                                                            @else
                                                                <h6 class="param-item">End Time: Not available</h6>
                                                            @endif
                                                        </li>
                                                    </ol>
                                                @endforeach
                                            @endforeach
                                            
                                        @endif
                                    </div>
                                </td></tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $("td[colspan=10]").find(".sample-parameter").hide();
        $('h5').click(false);
        $('h6').click(false);
        $('ol').click(false);   
        $("table").click(function(event) {
            event.stopPropagation();
            var $target = $(event.target);
            if ( $target.closest("td").attr("colspan") > 1 ) {
                $target.slideUp();
            } else {
                $target.closest("tr").next().find(".sample-parameter").slideToggle();
            }                    
        });
    });
</script>

@endsection



