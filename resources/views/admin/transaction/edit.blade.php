@extends('adminlte::page')

@section('title', 'Edit Order | Shoepoint Admin Page')

@section('content_header')
    <div class="container-fluid">
        <h1><strong>Edit Order</strong></h1>
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
                        <form action="{{ route('update-order', [$data_transaction->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="firstname">First Name *</label>
                                        <input id="firstname" name="firstname" type="text" class="form-control" placeholder="First Name" required value="{{ $data_transaction->firstname }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Last Name" @isset($data_transaction->lastname) value="{{ $data_transaction->lastname }}" @endisset>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input id="email" name="email" type="text" class="form-control" placeholder="johndoe@email.com" required value="{{ $data_transaction->email }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number (Optional)" value="{{ $data_transaction->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="5" placeholder="Address (Optional)" class="form-control">@if(strlen($data_transaction->address) > 0) {{ $data_transaction->address }} @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="servicetype">Service Type</label>
                                <select name="servicetype" id="servicetype" class="form-control" required>
                                    @foreach ($data_service as $data)
                                        <option value="{{ $data->id }}" @if($data->id == $data_transaction->service_id) selected @endif >{{ $data->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @foreach ($data_service as $data)
                                <input type="hidden" name="serviceprice" id="{{ $data->id }}serviceprice" value="{{ $data->service_price }}">
                            @endforeach

                            <div class="form-check form-group">
                                <input type="hidden" name="onenightservice" value="0">
                                <input type="checkbox" class="form-check-input" id="onenightservice" name="onenightservice" value="1" @if($data_transaction->isONS) checked @else {{ old('onenightservice', isset($category) ? 'checked' : '') }} @endif disabled>
                                <label class="form-check-label" for="onenightservice">One Night Service</label>
                            </div>
                            <div class="form-group">
                                <label for="total">Total Amount</label>
                                <input type="text" name="total" id="total" class="form-control" readonly="readonly" value="{{ $data_transaction->total_amount }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    @foreach ($data_status as $data)
                                        <option value="{{ $data->id }}" @if($data->id == $data_transaction->status_id) selected @elseif($data->id < $data_transaction->status_id) disabled @endif >{{ $data->status_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary px-5">Update Order</button>
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
    <script src="{{ asset('js/priceSelection.js') }}"></script>
@stop