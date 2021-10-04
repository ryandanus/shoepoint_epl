@extends('adminlte::page')

@section('title', 'Change Password | Shoepoint Admin Page')

@section('content_header')
    <div class="container-fluid">
        <h1><strong>Change Password</strong></h1>
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
                        <form action="{{ route('change-password', [$id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="currentpass">Current Password *</label>
                                <input type="password" name="currentpass" id="currentpass" class="form-control" placeholder="Current Password" required>
                            </div>
                            <div class="form-group">
                                <label for="newpass">New Password *</label>
                                <input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password" required>
                                <small id="strengthMessage" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="newpass-confirm">Confirm New Password *</label>
                                <input type="password" name="newpass-confirm" id="newpass-confirm" class="form-control" placeholder="Confirm New Password" required>
                                <div class="invalid-feedback">
                                    Password not matched.
                                </div>
                                <div class="valid-feedback">
                                    Password matched.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-5" disabled id="password-submit">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkpass.css') }}">
@stop

@section('js')
    
@stop