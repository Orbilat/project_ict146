@extends('layouts.app')

@section('content')
<div class="container">
    <table id="historytable" class="display sampledata" style="width:100%">
        <thead>
            <tr>
                <th>Inventory</th>
                <th>Date of Use</th>
                <th>Item Type</th>
                <th>Container Type</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($history as $data)
                <tr>
                    <td>{{ $data->inventoryId }}</td>
                    <td>{{ $data->dateofuse }}</td>
                    <td>{{ $data->itemType }}</td>
                    <td>{{ $data->containerType }}</td>
                    <td>{{ $data->qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#historytable').DataTable();
    });
</script>
@endsection
