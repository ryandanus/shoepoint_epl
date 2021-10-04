@extends('adminlte::page')

@section('title', 'Settings | Shoepoint Admin Page')

@section('content_header')
    <div class="container-fluid">
        <h1><strong>Settings</strong></h1>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        {{-- ALERTS --}}
        @if (session('statusType'))
            @if (session('statusType') == 'success')
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
                <div class="my-2"><a href="{{ route('edit-user', [$id]) }}">Change User Details</a></div>
                <div class="my-2"><a href="{{ route('show-change-password', [$id]) }}">Change Password</a></div>
                <p class="text-muted mt-5">
                    Shoepoint Web Application<br>
                    Version: {{ config('app.version') }}<br>
                    <a href="#" data-toggle="modal" data-target="#releaseNoteModal">Release Notes</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="releaseNoteModal" tabindex="-1" role="dialog"
        aria-labelledby="releaseNoteModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="releaseNoteModalTitle">Release Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    v0.6.0b - Getting bug fixed and more. Check out the github <a href="https://github.com/djtyranix/shoepoint/commit/30bd7f5a1e4f2f47d4bbd44a597f419654eae8fa" target="_blank">commit</a>.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
