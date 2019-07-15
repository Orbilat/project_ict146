{{-- @extends('layouts.admin_app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Inventory - History</div>
                @php $count = 0; @endphp
                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="admin-table">Date of Use</th>
                                <th class="admin-table">Item Used</th>
                                <th class="admin-table">Used By</th>
                                <th class="admin-table">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $list)
                            <tr>
                                
                                    <td class="admin-table">{{ date("F j, Y g:m A", strtotime($list->user[$count]->pivot->updated_at)) }}</td>
                                    <td class="admin-table">{{ $list->itemName }}</td>
                                    <td class="admin-table">{{ $list->user[$count]->employeeName }}</td>
                                    <td class="admin-table">{{ $list->quantity }}</td>
                                    @php $count++; @endphp
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
