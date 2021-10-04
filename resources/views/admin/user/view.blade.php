@extends('adminlte::page')

@section('title', 'All Users | Shoepoint Admin Page')

@section('content_header')
    <div class="container-fluid">
        <h1><strong>All Users</strong></h1>
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
                <h3><strong>User List</strong></h3>
                <table id="users" style="width:100%" class="display">
                    <caption>All Users</caption>
                    <thead>
                        <tr>
                            <th style="width: 15%">User ID</th>
                            <th style="width: 35%">Name</th>
                            <th style="width: 25%">Email</th>
                            <th style="width: 15%">Last Update</th>
                            <th style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_user as $users)
                            <tr>
                                <td>{{ $users->id }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->updated_at }}</td>
                                <td>
                                    <a href="{{ route('edit-user', [$users->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    @if($role == 3)
                                        <a data-id="{{ $users->id }}" class="btn btn-danger ml-2 delete-toggle-modal"><i class="far fa-trash-alt"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-md-12">
                <h3><strong>Admin List</strong></h3>
                <table id="admin" style="width:100%" class="display">
                    <caption>All Admins</caption>
                    <thead>
                        <tr>
                            <th style="width: 15%">Admin ID</th>
                            <th style="width: 35%">Name</th>
                            <th style="width: 25%">Email</th>
                            <th style="width: 15%">Last Update</th>
                            <th style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_admin as $admins)
                            <tr>
                                <td>{{ $admins->id }}</td>
                                <td>{{ $admins->name }}</td>
                                <td>{{ $admins->email }}</td>
                                <td>{{ $admins->updated_at }}</td>
                                @if($role == 3)
                                    <td>
                                        <a href="{{ route('edit-user', [$admins->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a data-id="{{ $admins->id }}" class="btn btn-danger ml-2 delete-toggle-modal"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                @elseif ($admins->id == $user_id)
                                    <td>
                                        <a href="{{ route('edit-user', [$admins->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    </td>
                                @else
                                    <td>
                                        <a class="btn btn-disabled"><i class="fas fa-edit"></i> No Access</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
        <form action="{{ route('delete-user') }}" method="post">
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
                        <input type="hidden" id="modal_delete_id" name="modal_user_id">
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
            $('#users').DataTable({
                columnDefs: [
                    { orderable: false, targets: 4 }
                ],
            });

            $('#admin').DataTable({
                columnDefs: [
                    { orderable: false, targets: 4 }
                ],
            });
        });
    </script>
@stop