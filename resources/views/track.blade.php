@extends('layouts.app')

@section('content')
    <div class="container">
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

        {{-- IF INVOICE NUMBER IS INPUTTED AND THERE IS DATA --}}
        @isset($invoice_id)
            <script>
                $(function(){
                    window.setTimeout(scrollToElement("track-result"), 1000);
                });
            </script>
            <div class="mb-4 pb-5">
                <div class="row d-flex align-items-center">
                    <div class="col-md-12">
                        <div class="card mx-auto track-card text-center track-card-big">
                            <div class="card-body my-5">
                                <h1 class="card-title track-title">Track Your <strong>Order!</strong></h1>
                                <small class="card-text track-title">Enter your invoice number given at the time of your purchase.</small>
                                <form action="{{ route('tracking') }}" method="get" class="my-3 mt-4">
                                    <div class="form-group">
                                        <input type="text" value="{{ str_pad($invoice_id,5,'0',STR_PAD_LEFT) }}" name="invoice" id="invoice" class="form-control invoice-track-input mx-auto" placeholder="Your invoice number" pattern="[0-9]{5}" aria-label="Invoice Number (5 digits)">
                                    </div>
                                    <button type="submit" class="btn btn-outline-dark btn-invoice-track px-5 py-2 mt-2">TRACK MY ORDER!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 justify-content-center">
                    <a id="track-result"></a>
                    <div class="col-md-12">
                        {{-- https://bbbootstrap.com/snippets/multi-step-form-wizard-animated-progressbar-53000683 --}}
                        <ul class="progressbar">
                            <li class="@if($statusId > 1) active @elseif($statusId == 1) active current @endif" id="step1">Order Placed</li>
                            <li class="@if($statusId > 2) active @elseif($statusId == 2) active current @endif" id="step2">Payment Confirmed</li>
                            <li class="@if($statusId > 3) active @elseif($statusId == 3) active current @endif" id="step3">Cleaning Process</li>
                            <li class="@if($statusId > 4) active @elseif($statusId == 4) active current @endif" id="step4">Cleaning Finished</li>
                            <li class="@if($statusId > 5) active @elseif($statusId == 5) active current @endif" id="step5">Delivery Process</li>
                            <li class="@if($statusId > 6) active @elseif($statusId == 6) active current @endif" id="step6">Order Finished</li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-lg-5 pt-lg-3">
                    <div class="col-md-12">
                        <div class="card mx-auto order-info">
                            <div class="card-header">
                                <h5 class="d-inline-block card-title my-md-2 ml-md-3 my-1">Order <strong>Information</strong></h5>
                                <h5 class="d-inline-block card-title float-right my-md-2 mr-md-3 my-1">ORD-#{{ str_pad($invoice_id,5,'0',STR_PAD_LEFT) }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-auto col-md-12">
                                        <table class="table m-md-3" style="width: 97%">
                                            <thead>
                                                <tr class="bg-shoepoint-lightblue text-light">
                                                    <th scope="col" style="width: 20%">Details</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Name</th>
                                                    <td>{{ $username }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Order</th>
                                                    <td>
                                                        {{ $servicename }} @if($isONS) <div class="ons ml-2 bg-shoepoint-lightblue text-light px-3 py-1"><strong>One</strong> Night Service</div> @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Cleaning Progress</th>
                                                    <td>{{ $statusName }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        {{-- IF THERE IS NO INPUT OF INVOICE NUMBER OR INPUT NOT FOUND--}}
            <div class="my-5 py-5">
                <div class="row d-flex align-items-center">
                    <div class="col-md-12">
                        <div class="card mx-auto track-card text-center">
                            <div class="card-body my-5">
                                <h1 class="card-title track-title">Track Your <strong>Order!</strong></h1>
                                <small class="card-text track-title">Enter your invoice number given at the time of your purchase.</small>
                                <form action="{{ route('tracking') }}" method="get" class="my-3 mt-4">
                                    <div class="form-group">
                                        <input type="text" name="invoice" id="invoice" class="form-control invoice-track-input mx-auto" placeholder="Your invoice number" pattern="[0-9]{5}" aria-label="Invoice Number (5 digits)">
                                    </div>
                                    <button type="submit" class="btn btn-outline-dark btn-invoice-track px-5 py-2 mt-2">TRACK MY ORDER!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </div>

    {{-- JAVASCRIPT --}}
    <script type="text/javascript">
        title = "Track your Order | Shoepoint.id";
    </script>
@endsection