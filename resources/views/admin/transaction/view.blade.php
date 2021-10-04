@extends('adminlte::page')

@section('title', 'All Orders | Shoepoint Admin Page')

@section('content_header')
    <div class="container-fluid">
        <h1><strong>All Transactions</strong></h1>
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
                <table id="transaction" class="display" style="width:100%">
                    <caption>All Transactions</caption>
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>User</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->service_name }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->status_name }}</td>
                                <td>
                                    <a href="{{ route('edit-order', [$data->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    @if($role == 3)
                                        <a data-id="{{ $data->id }}" class="btn btn-danger ml-2 delete-toggle-modal"><i class="far fa-trash-alt"></i></a>
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
        <form action="{{ route('delete-order') }}" method="post">
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
                        <input type="hidden" id="modal_delete_id" name="modal_order_id">
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
            $('#transaction').DataTable({
                columnDefs: [
                    { orderable: false, targets: 5 }
                ],
            });
        });
    </script>
@stop