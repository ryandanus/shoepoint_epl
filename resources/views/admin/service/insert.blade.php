@extends('adminlte::page')

@section('title', 'Add New Service | Shoepoint Admin Page')

@section('content_header')
    <div class="container-fluid">
        <h1><strong>Add New Service</strong></h1>
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
                        <form action="{{ route('insert-new-service') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="servicetype">Service Type *</label>
                                <select name="servicetype" id="servicetype" class="form-control" required>
                                    <option value="1" selected>Regular</option>
                                    <option value="2">Premium</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="servicename">Service Name *</label>
                                <input type="text" name="servicename" id="servicename" class="form-control" placeholder="Service Name" required maxlength="200">
                            </div>
                            <div class="form-group">
                                <label for="servicecost">Service Cost *</label>
                                <input type="number" name="servicecost" id="servicecost" class="form-control" placeholder="Service Cost" required>
                            </div>
                            <div class="form-group">
                                <label for="servicedesc">Service Description</label>
                                <textarea name="servicedesc" id="servicedesc" class="form-control" placeholder="A Brief of the Service Description (Max 255 Characters, Optional)" cols="30" rows="5"></textarea>
                            </div>
                            <button class="btn btn-primary px-5" type="submit">Add Service</button>
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