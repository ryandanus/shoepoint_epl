@extends('adminlte::page')

@section('title', 'Edit Service | Shoepoint Admin Page')

@section('content_header')
    <div class="container-fluid">
        <h1><strong>Edit Service</strong></h1>
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
                        <form action="{{ route('update-service', [$data->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="servicetype">Service Type *</label>
                                <select name="servicetype" id="servicetype" class="form-control" required>
                                    <option value="1" @if($data->service_type == "Regular") selected @endif>Regular</option>
                                    <option value="2" @if($data->service_type == "Premium") selected @endif>Premium</option>
                                    <option value="3" @if($data->service_type == "Other") selected @endif>Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="servicename">Service Name *</label>
                                <input type="text" name="servicename" id="servicename" class="form-control" placeholder="Service Name" required maxlength="200" value="{{ $data->service_name }}">
                            </div>
                            <div class="form-group">
                                <label for="servicecost">Service Cost *</label>
                                <input type="number" name="servicecost" id="servicecost" class="form-control" placeholder="Service Cost" required value="{{ $data->service_price }}">
                            </div>
                            <div class="form-group">
                                <label for="servicedesc">Service Description</label>
                                <textarea name="servicedesc" id="servicedesc" class="form-control" placeholder="A Brief of the Service Description (Max 255 Characters, Optional)" cols="30" rows="5">@if(strlen($data->service_desc) > 0) {{ $data->service_desc }} @endif</textarea>
                            </div>
                            <button class="btn btn-primary px-5" type="submit">Update Service</button>
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