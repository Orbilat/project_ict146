@extends('layouts.analyst_app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Notifications</div>
                

    <br>
    <table id="sampledata" class="display sampledata" style="width:100%">
        <thead>
            <tr>
                <th>Due Date</th>
                <th>Date Received</th>
                <th>Laboratory Code</th>
                <th>RIS Number</th>
                <th>Collection Time</th>
                <th>Purpose of Analysis</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sampledatas as $data)
                <tr>
                    <td>{{ $data->dueDate }}</td>
                    <td>{{ $data->created_at}}</td>
                    <td>{{ $data->laboratoryCode }}</td>
                    <td>{{ $data->risNumber }}</td>
                    <td>{{ $data->sampleCollection }}</td>
                    <td>{{ $data->purposeOfAnalysis }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sampledata').DataTable(); // to use the datatable jquery (datables.min.js)
    });
</script>
@endsection
