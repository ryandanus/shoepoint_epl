@extends('adminlte::page')

@section('title', 'Edit User | Shoepoint Admin Page')

@section('content_header')
    <div class="container-fluid">
        <h1><strong>Edit User</strong></h1>
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
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update-user', [$data->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="firstname">First Name *</label>
                                        <input id="firstname" name="firstname" type="text" class="form-control" placeholder="John" required value="{{ $data->firstname }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Doe" @if(strlen($data->lastname) > 0) value="{{ $data->lastname }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="text" name="email" id="email" class="form-control @if(session('formError')) is-invalid @endif" placeholder="Email" required value="{{ $data->email }}">
                                <div class="invalid-feedback">
                                    @if(session('formError')) {{ session('formError') }} @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number (Optional)" @if(strlen($data->phone) > 0) value="{{ $data->phone }}" @endif>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="5" placeholder="Address (Optional)" class="form-control">@if(strlen($data->address) > 0) {{ $data->address }} @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="role">User Role *</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option disabled>Select User Role</option>
                                    <option value="1" @if($data->role_id == 1) selected @endif>User</option>
                                    @if($role != 1)
                                        @if($user_id == $data->id)
                                            <option value="2" @if($data->role_id == 2) selected @endif>Admin</option>
                                        @endif
                                        @if($role == 3)
                                            <option value="3" @if($data->role_id == 3) selected @endif>Super Admin</option>
                                        @endif
                                    @endif
                                </select>
                            </div>
                            <button class="btn btn-primary px-5" type="submit">Update User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@stop

@section('js')

@stop