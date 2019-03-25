@extends('layouts.analyst_app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Samples - Station {{ $station }}</div>
                <br>
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
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sampledata').DataTable();
    });
</script>
@endsection
