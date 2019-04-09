@extends('layouts.analyst_app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ $station->stationName }}
                    <button type="button" class="btn btn-info btn-lg pull-right analystbtn" style="margin-left: 10px;" data-toggle="modal" data-target="#completescan">Complete</button>
                    <button type="button" class="btn btn-info btn-lg pull-right analystbtn" data-toggle="modal" data-target="#scanmodal">Receive</button>
                </div> 
                <br>
                <table id="sampledata" class="display sampledata table table-hover" style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th class="admin-table">Laboratory Code</th>
                            <th class="admin-table">Due Date</th>
                            <th class="admin-table">Status </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($stationssample))
                            @foreach($stationssample as $data)
                                <tr>
                                    <td><a href="/analyst/{{ $station->stationId }}/sample/{{ $data->laboratoryCode }}">{{ $data->laboratoryCode }}</a></td>
                                    <td>{{ $data->dueDate }}</td>
                                    <td>{{ $data->status}} </td>
                                    
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <div id="completescan" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <h3>Complete?</h3>
                <form action="/analyst/complete/sample/{{ $station->stationId }}" method="post" class="bookingInput">
                    {{ csrf_field() }}
                    <input type="text" id="scanid2" name="scanid" autofocus>
                    <input id="acceptbtn" type="submit" class="accept" value="Proceed">
                </form>
              </div>
            </div>
        </div>
    </div>

    <div id="scanmodal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <h3>Receive?</h3>
                <form action="/analyst/receive/sample/{{ $station->stationId }}" method="post" class="bookingInput">
                    {{ csrf_field() }}
                    <input type="text" id="scanid" name="scanid" autofocus>
                    <input id="receivebtn" type="submit" class="accept" value="Proceed">
                </form>
              </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sampledata').DataTable({
            "ordering": false
        });
        $('#scanid2').focus();
        $('#scanid').focus();

        $('#receivebtn').click(function(e){
            if($('#scanid').val() == ""){
                e.preventDefault();
                alert('Input the laboratory Code');  
            }
        });

        $('#acceptbtn').click(function(e){
            if($('#scanid2').val() == ""){
                e.preventDefault();
                alert('Input the laboratory Code');  
            }
        });
    });
</script>
@endsection
