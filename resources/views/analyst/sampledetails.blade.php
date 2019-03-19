@extends('layouts.analyst_app')

@section('content')
<h3 class="hblue pull-left ">Samples</h3> 
<table id="sampledata" class="display sampledata" style="width:100%">
    <thead>
        <tr>
            <th>Laboratory Code </th>
            <th>Parameters</th>
            <th>Collection Time</th>
            <th>Date Received</th>
            <th>Status</th>
            <th>Date and Time Completed</th>
        </tr>
    </thead>
    <tbody>
        @foreach($details as $data)
            <tr>
                <td>{{ $data->laboratoryCode}} </td>
                <td>{{ $data->parametername }}</td>
                <td>{{ $data->sampleCollection }}</td>
                <td>{{ $data->created_at}} </td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->timecompleted }}</td>
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
