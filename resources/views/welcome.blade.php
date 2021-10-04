@extends('layouts.app')

@section('content')
    <div class="container container-main-page">
        <div class="row reverse-row d-flex align-items-center row-mainpage">
            <div class="col-lg-7 left-main">
                <h1 class="text-right main-page-heading">YOUR SHOES<br>NEED <span class="bg-shoepoint-lightblue light-text px-3">A TREAT?</span></h1>
                <h3 class="text-right main-page-heading py-3">We are <strong>here</strong>.</h3>
                <a id="explore" href="#service" class="btn btn-outline-dark btn-mainpage px-5 float-right">Explore <strong>Us</strong></a>
            </div>
            <div class="col-lg-5 right-main">
                <img src="{{ asset('/assets/img/logo@0.5x.png') }}" alt="Logo Shoepoint" class="main-logo">
            </div>
        </div>
        <hr class="main-page">
    </div>
    <div class="bg-shoepoint-blue">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="card mx-auto track-card text-center">
                        <div class="card-body my-5">
                            <h1 class="card-title track-title">Track Your <strong>Order!</strong></h1>
                            <small class="card-text track-title">Enter your invoice number given at the time of your purchase.</small>
                            <form action="{{ route('tracking') }}" method="get" class="my-3 mt-4">
                                <div class="form-group">
                                    <input type="text" pattern="[0-9]{5}" aria-label="Invoice Number (5 digits)" name="invoice" id="invoice" class="form-control invoice-track-input mx-auto" placeholder="Your invoice number">
                                </div>
                                <button type="submit" class="btn btn-outline-dark btn-invoice-track px-5 py-2 mt-2">TRACK MY ORDER!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="service"></a>
    <div class="container py-5 my-auto service-info">
        <div class="row py-5">
            <div class="col-lg-12 text-center">
                <h1 class="service-heading">
                    YOUR SHOES LOOKS BEST<br>
                    WHEN THEY'RE<br>
                    <span class="bg-shoepoint-lightblue light-text px-3">SHEEN AND CLEAN.</span>
                </h1>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-4 px-4">
                <div class="img-container">
                    <img src="{{ asset('assets/img/shoes.png') }}" alt="shoes3" class="service-icon-main">
                </div>
                <h2 class="service-list"><span class="bg-shoepoint-lightblue light-text px-3 py-1">Regular</span></h2>
                <hr class="service-list">
                <p class="desc-service">
                    Basic that is more than basic. Regular service that is more than regular.
                </p>
            </div>
            <div class="col-lg-4 px-4">
                <div class="img-container">
                    <img src="{{ asset('assets/img/shoes.png') }}" alt="shoes3" class="service-icon-main">
                </div>
                <h2 class="service-list"><span class="bg-shoepoint-lightblue light-text px-3 py-1">Premium</span></h2>
                <hr class="service-list">
                <p class="desc-service">
                    Best service for your beloved shoes. Faster and guaranteed just for you.
                </p>
            </div>
            <div class="col-lg-4 px-4">
                <div class="img-container">
                    <img src="{{ asset('assets/img/shoes.png') }}" alt="shoes3" class="service-icon-main">
                </div>
                <h2 class="service-list"><span class="bg-shoepoint-lightblue light-text px-3 py-1">Other</span></h2>
                <hr class="service-list">
                <p class="desc-service">
                    Kid Shoes? Repainting? Or, unyellowing? We got you covered.
                </p>
            </div>
        </div>
        <div class="row d-flex align-items-center my-4">
            <div class="col-lg-12 d-flex justify-content-center">
                <a href="{{ url('/services') }}" class="btn btn-outline-dark px-5 mt-5 btn-custom btn-more-info">More Info</a>
            </div>
        </div>
    </div>
    <div class="container py-5 my-5" loading=”lazy”>
        <div class="row pb-5 mb-5">
            <div class="col-md-12 text-center">
                <h1 class="service-heading pb-5">
                    <span class="bg-shoepoint-lightblue light-text px-3">CUSTOMER</span> SATISFACTION<br>
                    IS OUR<br>
                    <span class="bg-shoepoint-lightblue light-text px-3">PRIORITY.</span>
                </h1>
                {{-- <h1 class="pt-4 pb-2 mt-5 what-they-said"><strong>What they say about us?</strong></h1> --}}
                <div class="mx-auto rating-big">
                    <span class="fas fa-star checked"></span>
                    <span class="fas fa-star checked"></span>
                    <span class="fas fa-star checked"></span>
                    <span class="fas fa-star checked"></span>
                    <span class="fas fa-star-half-alt checked"></span>
                </div>
            </div>
        </div>
        <div class="testimonial-carousel pb-5 mb-5" loading=”lazy”>
            <div class="card text-center testimonial text-shoepoint-light bg-shoepoint-blue">
                <div class="card-body">
                    <div class="mx-auto mb-2">
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="far fa-star checked"></span>
                    </div>
                    <h4 class="card-title">"Sangat Baik!"</h4>
                    <h6 class="card-subtitle mb-2 text-muted text-shoepoint-light">User #1</h6>
                    <p class="card-text">
                        "Servis yang diberikan sangat baik. Sepatu saya menjadi bersih kembali seperti baru!"
                    </p>
                </div>
            </div>
            <div class="card text-center testimonial text-shoepoint-light bg-shoepoint-blue">
                <div class="card-body">
                    <div class="mx-auto mb-2">
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                    </div>
                    <h4 class="card-title">"Mantep banget!"</h4>
                    <h6 class="card-subtitle mb-2 text-muted text-shoepoint-light">User #2</h6>
                    <p class="card-text">
                        "Bagus banget servicenya! Shoepoint.id recommended banget!"
                    </p>
                </div>
            </div>
            <div class="card text-center testimonial text-shoepoint-light bg-shoepoint-blue">
                <div class="card-body">
                    <div class="mx-auto mb-2">
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star-half-alt checked"></span>
                    </div>
                    <h4 class="card-title">"Keren banget, banget!"</h4>
                    <h6 class="card-subtitle mb-2 text-muted text-shoepoint-light">User #3</h6>
                    <p class="card-text">
                        "Keren bangett! Aku suka banget sama servicenya, pokoknya keren!"
                    </p>
                </div>
            </div>
            <div class="card text-center testimonial text-shoepoint-light bg-shoepoint-blue">
                <div class="card-body">
                    <div class="mx-auto mb-2">
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="far fa-star checked"></span>
                    </div>
                    <h4 class="card-title">"Mantap"</h4>
                    <h6 class="card-subtitle mb-2 text-muted text-shoepoint-light">User #4</h6>
                    <p class="card-text">
                        "Suka banget sama servicenya. Mas-masnya juga ramah banget."
                    </p>
                </div>
            </div>
            <div class="card text-center testimonial text-shoepoint-light bg-shoepoint-blue">
                <div class="card-body">
                    <div class="mx-auto mb-2">
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                    </div>
                    <h4 class="card-title">"Bersih Kinclong!"</h4>
                    <h6 class="card-subtitle mb-2 text-muted text-shoepoint-light">User #5</h6>
                    <p class="card-text">
                        "Bersih banget bro hasilnya, keren!"
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    {{-- JAVASCRIPT --}}
    <script type="text/javascript">
        title = "Shoepoint.id | Your shoes in their best looks.";
    </script>
@endsection