@extends('layouts.app')

@section('content')
<h3 class="hblue pull-left ">Samples</h3> 
<table id="sampledata" class="display sampledata" style="width:100%">
    <thead>
        <tr>
            <th>Sample Id </th>
            <th>Parameters</th>
            <th>Date and Time Received</th>
            <th>Status</th>
            <th>Date and Time Completed</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($details as $data)
            <tr>
                <td>{{ $data->sampleCode}} </td>
                <td>{{ $data->method }}</td>
                <td>{{ $data->collectionTime }}</td>
                <td>{{ $data->status }}</a></td>
                <td>{{ $data->timecompleted }}</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sampledata').DataTable();
    });
</script>
@endsection
