@extends('layouts.clientapp')

@section('content')


  <div class="RIS">
  <div class="card-body">
                  @if(isset($ris))
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- TABLE HEADER --}}
                                <th>RIS #</th>
                                <th>Client Name</th>
                                <th>Entity Name</th>
                                <th>Address</th>
                                <th>Contact No.</th>
                                <th>Fax</th>
                                <th>Email</th>
                                <th>Date Submitted</th>
                                <th>Status</th>
                                {{-- TABLE HEADER END --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- TABLE BODY --}}
                                <td>{{ $ris->risNumber }}</td>
                                <td>{{ $ris->nameOfPerson }}</td>
                                <td>{{ $ris->nameOfEntity }}</td>
                                <td>{{ $ris->address }}</td>
                                <td>{{ $ris->contactNumber }}</td>
                                <td>{{ $ris->faxNumber }}</td>
                                <td>{{ $ris->emailAddress }}</td>
                        </table>
                  @else
                  <div class="alert alert-danger offset-md-1 col-md-10">
                      <a class="close" data-dismiss="alert">×</a>
                      <h3><strong>Error</strong></h3>
                  </div>
                  @endif
  </div>
</div>
@endsection