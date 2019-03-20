@extends('layouts.admin_app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Samples
                    &nbsp;
                    <a href="#addSample" id="addSampleText" class="glyphicon glyphicon-plus" data-toggle="collapse" onclick="changeSampleText()">Add new</a>
                    <form class="float-right" action="GET">
                        {{-- <input class="float-right" type="submit" value="Search"> --}}
                        <input class="float-right" type="text" name="searchBox" id="searchBox" placeholder="Search sample...">
                    </form>
                    @if ($errors->any())
                    <div class="alert alert-danger pb-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                                <p>Please try again.</p>
                        </ul>
                    </div>
                    @endif
                </div>

                <div class="card-body">
                    <table id="sample-table" class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="admin-table">RIS</th>
                                <th class="admin-table">Lab Code</th>
                                <th class="admin-table">Client's Code</th>
                                <th class="admin-table">Sample Type</th>
                                <th class="admin-table">Sample Collection</th>
                                <th class="admin-table">Sample Preservation</th>
                                <th class="admin-table">Purpose of Analysis</th>
                                <th class="admin-table">Sample Source</th>
                                <th class="admin-table">Due Date</th>
                                <th class="admin-table">Functions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($samples as $sample)
                            <tr class="pointer">
                                <td class="admin-table">
                                    @php
                                        $year = substr($sample->ris,  0, 4);
                                        $id = substr($sample->ris, 4);
                                        echo $year.'-'.$id;
                                    @endphp
                                </td>
                                <td class="admin-table">
                                    @php
                                        $year = substr($sample->laboratoryCode,  0, 4);
                                        $IDclient = substr($sample->laboratoryCode, 4, 4);
                                        $IDsample = substr($sample->laboratoryCode, 8);
                                        echo $year.'-'.$IDclient.'-'.$IDsample;
                                    @endphp
                                </td>
                                <td class="admin-table">{{ $sample->clientsCode }}</td>
                                <td class="admin-table">{{ $sample->sampleType }}</td>
                                <td class="admin-table">{{ $sample->sampleCollection }}</td>
                                <td class="admin-table">{{ $sample->samplePreservation }}</td>
                                <td class="admin-table">{{ $sample->purposeOfAnalysis }}</td>
                                <td class="admin-table">{{ $sample->sampleSource }}</td>
                                <td class="admin-table">{{ $sample->dueDate }}</td>
                                <td class="admin-table">
                                    {{-- EDIT BUTTON --}}
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editAccount">Edit</button>
                                    <div id="editAccount" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header editModal">
                                                    <h5 class="modal-title">Edit Sample</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    &nbsp;&nbsp; 
                                    {{-- DELETE BUTTON --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAccount">Delete</button>
                                    <div id="deleteAccount" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header deleteModal">
                                                    <h5 class="modal-title">Delete Sample</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this account?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteAccount()">Delete</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>           
                </div>
            </div>
            <div class="offset-md-5 mt-3">
                {{ $samples->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
