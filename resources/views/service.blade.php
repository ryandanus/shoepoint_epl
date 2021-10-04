@extends('layouts.app')

@section('content')
    <div class="row py-5 bg-shoepoint-blue">
        <div class="col-md-12 py-4">
            <h1 class="service-header text-light text-center mb-0">
                YOUR <strong>SHOES'</strong>
            </h1>
            <h1 class="service-sub-header text-light text-center">
                ONE-STOP <strong>SERVICE</strong>
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-12 py-5">
                <h1 class="text-center"><strong>Shoepoint Cleaning Service</strong></h1>
                <div class="row my-lg-3 align-items-center justify-content-center">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/img/shoes1.jpg') }}" alt="Shoes 1">
                    </div>
                    <div class="col-md-6 responsive-768-text-center">
                        <div class="row align-items-center justify-content-center ml-md-3 service-detail">
                            <div class="col-md-3">
                                <img src="{{ asset('assets/img/clock.png') }}" alt="Clock">
                            </div>
                            <div class="col-md-9">
                                <div>
                                    <h3>
                                        <strong>Fast Turnback Time</strong>
                                    </h3>
                                    <p class="text-justify">
                                        We know that our time is precious, so do your time to us.
                                        We will make sure that your shoes brought to you back in time as we promised.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center ml-md-3 service-detail">
                            <div class="col-md-3">
                                <img src="{{ asset('assets/img/shoes2.png') }}" alt="Shoes 2">
                            </div>
                            <div class="col-md-9">
                                <div>
                                    <h3>
                                        <strong>Sheen and Clean!</strong>
                                    </h3>
                                    <p class="text-justify">
                                        Your shoes is in their best looks if they are sheen and clean.
                                        And we will make sure your shoes match those standards, too.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <h1 class="text-center">Our <strong>Services</strong></h1>
                <h3 class="text-center mb-5">Here's our extraordinary services.</h3>
                <nav>
                    <div class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                      <a class="nav-item nav-link active" id="pills-regular-tab" data-toggle="pill" href="#regular-service" role="tab" aria-controls="regular-service" aria-selected="true">Regular</a>
                      <a class="nav-item nav-link" id="pills-premium-tab" data-toggle="pill" href="#premium-service" role="tab" aria-controls="premium-service" aria-selected="false">Premium</a>
                      <a class="nav-item nav-link" id="pills-other-tab" data-toggle="pill" href="#other-service" role="tab" aria-controls="other-service" aria-selected="false">Other</a>
                    </div>
                </nav>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="regular-service" role="tabpanel" aria-labelledby="pills-regular-tab">
                        <div class="card card-pills">
                            <div class="card-body">
                                <h1 class="text-center my-3">
                                    <strong>REGULAR SERVICES</strong>
                                </h1>
                                <div class="row my-4 align-items-center justify-content-center px-4">
                                    <div class="col-md-6 text-center">
                                        <div>
                                            <i class="fas fa-moon circle p-3 drop-shadow mb-4"></i>
                                            <h3><strong>One</strong> Night Service</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3><strong>Basic</strong> shoes cleaning services at it's best price.</h3>
                                        <ul class="fa-ul my-3">
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Shoepoint Cleaning Service!</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Free Shoebag!</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>3-5 Days Turnback!*</li>
                                        </ul>
                                        <p class="small my-1">
                                            * Terms & Condition applies.<br>
                                        </p>
                                        <a target="_blank" class="btn btn-primary btn-block mt-4" href="https://wasap.at/rx2EPh">I Want This!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="premium-service" role="tabpanel" aria-labelledby="pills-premium-tab">
                        <div class="card card-pills">
                            <div class="card-body">
                                <h1 class="text-center my-3">
                                    <strong>PREMIUM SERVICES</strong>
                                </h1>
                                <div class="row my-4 align-items-center justify-content-center px-4">
                                    <div class="col-md-6 text-center">
                                        <div>
                                            <i class="fas fa-moon circle p-3 drop-shadow mb-4"></i>
                                            <h3><strong>One</strong> Night Service</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3><strong>Premium</strong> shoes cleaning service without a doubt.</h3>
                                        <ul class="fa-ul my-3">
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Shoepoint Cleaning Service!</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Free Shoebag!</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>1-2 Days Turnback!*</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Premium Shoeshine!**</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Premium Shoe Cleaning Wipes!</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>One Night Service!***</li>
                                        </ul>
                                        <p class="small my-1">
                                            * Terms & Condition applies.<br>
                                            ** Applied on leather shoes only.<br>
                                            *** For an additional IDR 30000.<br>
                                        </p>
                                        <a target="_blank" class="btn btn-primary btn-block mt-4" href="https://wasap.at/isGZjd">I Want This!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="other-service" role="tabpanel" aria-labelledby="pills-other-tab">
                        <div class="card card-pills">
                            <div class="card-body">
                                <h1 class="text-center my-3">
                                    <strong>OTHER SERVICES</strong>
                                </h1>
                                <div class="row my-4 align-items-center justify-content-center px-4">
                                    <div class="col-md-6 text-center">
                                        <div>
                                            <i class="fas fa-moon circle p-3 drop-shadow mb-4"></i>
                                            <h3><strong>One</strong> Night Service</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Kid Shoes? Repainting? Unyellowing? We got you <strong>covered</strong>.</h3>
                                        <ul class="fa-ul my-3">
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Shoepoint Cleaning Service!</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Free Shoebag!</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Kid Shoes Cleaning!</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Unyellowing!*</li>
                                            <li class="my-1"><span class="fa-li"><i class="fas fa-check"></i></span>Repaint Service!*</li>
                                        </ul>
                                        <p class="small my-1">
                                            * For selected shoes only.<br>
                                        </p>
                                        <a target="_blank" class="btn btn-primary btn-block mt-4" href="https://wasap.at/4OCHWn">I Want This!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- JAVASCRIPT --}}
    <script type="text/javascript">
        title = "Our Services | Shoepoint.id";
    </script>
@endsection