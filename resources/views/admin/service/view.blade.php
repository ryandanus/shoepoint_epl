@extends('adminlte::page')

@section('title', 'All Services | Shoepoint Admin Page')

@section('content_header')
    <div class="container-fluid">
        <h1><strong>All Services</strong></h1>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        {{-- ALERTS --}}
        @if (session('statusType'))
            @if(session('statusType') == 'success')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('statusMsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @else
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('statusMsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif
        
        <div class="row">
            <div class="col-md-12">
                <table id="services" style="width:100%" class="display">
                    <caption>All Services</caption>
                    <thead>
                        <tr>
                            <th style="width: 10%">Service ID</th>
                            <th style="width: 25%">Service Name</th>
                            <th style="width: 15%">Service Price</th>
                            <th style="width: 25%">Last Update By</th>
                            <th style="width: 15%">Last Updated</th>
                            <th style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->service_name }}</td>
                                <td>{{ $data->service_price }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->updated_at }}</td>
                                <td>
                                    @if($role == 3)
                                        <a href="{{ route('edit-service', [$data->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a data-id="{{ $data->id }}" class="btn btn-danger ml-2 delete-toggle-modal"><i class="far fa-trash-alt"></i></a>
                                    @else
                                        <a class="btn btn-disabled"><i class="fas fa-edit"></i> No Access</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
        <form action="{{ route('delete-service') }}" method="post">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLongTitle">Warning! Delete Confirmation!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        This action will <strong>PERMANENTLY DELETE</strong> the data selected and cannot be recovered.
                        Are you sure you want to do this?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        @csrf
                        @method('delete')
                        <input type="hidden" id="modal_delete_id" name="modal_service_id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#services').DataTable({
                columnDefs: [
                    { orderable: false, targets: 5 }
                ],
            });
        });
    </script>
@stop