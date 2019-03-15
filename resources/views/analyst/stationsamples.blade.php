@extends('layouts.app')

@section('content')
<h3 class="hblue pull-left ">Station {{ $station }}</h3> 
 <button type="button" class="btn btn-info btn-lg pull-right margintop" data-toggle="modal" data-target="#completescan">Complete</button>
 <button type="button" class="btn btn-info btn-lg pull-right margintop" data-toggle="modal" data-target="#scanmodal">Receive</button>
<br>
    <table id="sampledata" class="display sampledata" style="width:100%">
        <thead>
            <tr>
                <th>Sample Id</th>
                <th>RIS Number</th>
                <th>Status </th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($stationssample))
                @foreach($stationssample as $data)
                    <tr>
                        <td><a href="/analyst/{{ $data->stationId}}/sample/{{ $data->sampleCode }}">{{ $data->sampleCode }}</a></td>
                        <td>{{ $data->risNumber }}</td>
                        <td>{{ $data->status}} </td>
                        
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div id="completescan" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <h3>Complete?</h3>
                <form action="/analyst/complete/sample/{{ $station }}" method="post" class="bookingInput">
                    {{ csrf_field() }}
                    <input type="text" id="scanid2" name="scanid" autofocus>
                    <input type="submit" class="accept" value="Proceed">
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
                <form action="/analyst/receive/sample/{{ $station }}" method="post" class="bookingInput">
                    {{ csrf_field() }}
                    <input type="text" id="scanid" name="scanid" autofocus>
                    <input type="submit" class="accept" value="Proceed">
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
    });
</script>
@endsection
