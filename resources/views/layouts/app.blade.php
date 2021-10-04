<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    {{-- GOOGLE FONT : RALEWAY --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- BOOTSTRAP 4.5.3 & ADDITIONAL CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- BOOTSTRAP NEEDS --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    {{-- FONT AWESOME FREE v5 --}}
    <script src="https://kit.fontawesome.com/13982183c6.js" crossorigin="anonymous"></script>

    {{-- FAVICON --}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    {{-- SLICK CAROUSEL --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

    {{-- APP JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    
    {{-- Global site tag (gtag.js) - Google Analytics --}}
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'GA_MEASUREMENT_ID');
    </script> --}}

    {!! Analytics::render() !!}
</head>
<body id="user-page" onload="document.body.style.opacity='1'">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light smart-scroll">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('assets/img/logo@0.5x.png') }}" alt="Logo Shoepoint" width="50vw"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="mr-auto">
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item px-md-3">
                        <a class="nav-link @if(Request::is('services')) active @endif" href="{{ url('/services') }}">Service</a>
                    </li>
                    <li class="nav-item px-md-3">
                        <a class="nav-link @if(Request::is('about-us')) active @endif" href="{{ url('/about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item pl-md-3 pr-md-4 right-border">
                        <a class="nav-link @if(Request::is('contact-us')) active @endif" href="{{ url('/contact-us') }}">Contact</a>
                    </li>
                    <li class="nav-item pl-md-4">
                        <a class="nav-link @if(Route::current()->getName() == 'tracking') active @endif" href="{{ route('tracking') }}">Track Order</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Back to top button --}}
    <a id="scrollTop" data-toggle="tooltip" data-placement="top" title="Go to top"></a>

    <main class="">
        <div>
            @yield('content')
        </div>
    </main>

    <footer class="container py-4">
        <div class="row d-flex align-items-center">
            <div class="col-sm-6 col-md-4 social-media-icons">
                {{-- INSTRAGRAM --}}
                <a href="https://bit.ly/IGShoepoint" target="_blank">
                    <svg class="icons" version="1.1" id="Instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                        <g>
                            <path class="st0" d="M50.1,58.4c4.1,0,7.8-3.4,8-7.6c0.3-5.6-4.5-9.1-9.3-8.5c-3.5,0.5-6.1,2.9-6.8,6.4
                                C40.9,54.2,45.6,58.4,50.1,58.4z"/>
                            <path class="st0" d="M71.3,26.6H65c-0.9,0-1.6,0.7-1.6,1.6v6.3c0,0.9,0.7,1.6,1.6,1.6h6.3c0.9,0,1.6-0.7,1.6-1.6v-6.3
                                C73,27.3,72.2,26.6,71.3,26.6z"/>
                            <path class="st0" d="M50,0C22.4,0,0,22.4,0,50s22.4,50,50,50s50-22.4,50-50S77.6,0,50,0z M78.1,65.2c0,3.8-0.7,6.7-2.7,9
                                c-1.8,2-4.2,3.7-7.6,4c-5.6,0.4-11.6,0-17.6,0c-5.7,0-11.8,0.4-17.6,0c-5.7-0.4-10.1-4.6-10.5-10.5c-0.6-7.8,0.4-17,0-25.4
                                c0-0.2,0.1-0.4,0.3-0.4c5.3,0,10.5,0,15.8,0c0.5,0.3-0.4,1-0.7,1.5c-1.1,2-1.9,5-1.6,8.3c0.4,6.6,6,12.3,13.1,12.8
                                c5.2,0.4,9.4-2.1,12-5.3c2.4-2.9,4.4-8,2.6-13.4c-0.2-0.7-0.6-1.4-1-2c-0.3-0.6-0.8-1.2-0.8-1.9c5.4,0,10.7,0,16.1,0
                                C78.2,50.1,78.1,57.6,78.1,65.2z M39,50.5c-0.1-3.6,1.6-6.5,3.3-8.2s3.8-2.8,7.1-3c6.1-0.4,11.1,3.9,11.7,9.5
                                c0.6,6.2-3.7,11.7-9.3,12.4c-1,0.1-2.4,0.1-3.4,0C43.5,60.7,39.1,56.2,39,50.5z M78.1,40.3c-4.5,0-8.6,0-13.2,0
                                c-1.4,0-3.1,0.3-4.4,0c-0.8-0.2-1.2-1-1.9-1.5c-2.2-1.6-5.6-3-9.8-2.7c-3.1,0.2-5.2,1.3-7.2,2.9c-0.5,0.4-1.3,1.2-1.9,1.4
                                c-1.2,0.3-3,0-4.5,0c-4.3,0-8.5,0-13.1,0c0.2-3.3-0.4-6.5,0.1-9.3c0.6-3.3,2.6-5.6,4.6-7c0,3.9,0,11.7,0,11.7H29
                                c0,0-0.2-9,0.1-13.1c0.3-0.3,1-0.2,1.4-0.5c0.3,4.2,0.3,13.6,0.3,13.6H33c0,0,0-9,0-13.5c0-0.2,0-0.4,0.1-0.4c0.5,0,0.9,0,1.4,0
                                c0,4.6,0,13.9,0,13.9h2.3c0,0,0-9.3,0-13.9c9.4,0.5,21.5-0.6,30.7,0c3.6,0.2,6.6,2,8.3,4.2C78.3,29.3,78.2,34,78.1,40.3z"/>
                        </g>
                    </svg>
                </a>
                {{-- LINE --}}
                <a href="https://bit.ly/LINEShoepoint" target="_blank">
                    <svg class="icons" version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1080 1080" xml:space="preserve">
                        <g id="g7930">
                            <g id="g7958" transform="matrix(1.6639441,0,0,1.6639441,535.69699,483.72129)" display="none">
                                <path id="path7960" display="inline" fill="#00B900" d="M210.11-290.71h-413.53c-64.84,0-118.35,52.6-118.35,117.44v413.53
                                    c0,64.84,52.6,118.35,117.44,118.35H209.2c64.84,0,118.35-52.6,118.35-117.44v-413.53C327.55-237.2,274.95-290.71,210.11-290.71"
                                    />
                            </g>
                            <circle cx="540" cy="540" r="540"/>
                            <g id="g7962" transform="matrix(1.6639441,0,0,1.6639441,546.02809,375.00068)">
                                <path id="path7964" fill="#FFFFFF" d="M232.05,81.78c0-105.65-106.1-191.8-236.69-191.8s-236.69,86.15-236.69,191.8
                                    c0,94.77,84.34,174.57,197.7,189.54c7.71,1.81,18.14,4.99,20.86,11.79c2.27,5.89,1.36,15.42,0.91,21.31c0,0-2.72,16.78-3.17,20.4
                                    c-0.91,5.89-4.53,23.58,20.4,12.7c25.39-10.43,136.03-80.26,185.91-137.39l0,0C215.73,162.5,232.05,123.95,232.05,81.78"/>
                            </g>
                            <g id="g7966" transform="matrix(1.6639441,0,0,1.6639441,441.5933,393.76931)">
                                <path id="path7968" d="M10.22,19.36H-6.55c-2.72,0-4.53,2.27-4.53,4.53v102.93c0,2.72,2.27,4.53,4.53,4.53h16.78
                                    c2.72,0,4.53-2.27,4.53-4.53V23.89C14.76,21.63,12.94,19.36,10.22,19.36"/>
                            </g>
                            <g id="g7970" transform="matrix(1.6639441,0,0,1.6639441,483.49956,393.76931)">
                                <path id="path7972" d="M99.23,19.36H82.46c-2.72,0-4.53,2.27-4.53,4.53v61.21L30.77,21.63l-0.45-0.45l0,0c0,0,0,0-0.45-0.45l0,0
                                    c0,0,0,0-0.45,0l0,0c0,0,0,0-0.45,0l0,0c0,0,0,0-0.45,0l0,0c0,0,0,0-0.45,0l0,0c0,0,0,0-0.45,0l0,0c0,0,0,0-0.45,0l0,0
                                    c0,0,0,0-0.45,0c0,0,0,0-0.45,0l0,0H9.45c-2.72,0-4.53,2.27-4.53,4.53v102.93c0,2.72,2.27,4.53,4.53,4.53h16.78
                                    c2.72,0,4.53-2.27,4.53-4.53V66.97l47.16,63.93c0.45,0.45,0.91,0.91,1.36,1.36l0,0c0,0,0,0,0.45,0l0,0l0,0c0,0,0,0,0.45,0l0,0
                                    c0,0,0,0,0.45,0l0,0c0.45,0,0.91,0,1.36,0h17.23c2.72,0,4.53-2.27,4.53-4.53V24.8C103.77,21.63,101.96,19.36,99.23,19.36"/>
                            </g>
                            <g id="g7974" transform="matrix(1.6639441,0,0,1.6639441,426.91715,362.04388)">
                                <path id="path7976" d="M-20.95,124.88h-44.89V42.81c0-2.72-2.27-4.53-4.53-4.53h-16.78c-2.72,0-4.53,2.27-4.53,4.53v103.38l0,0
                                    c0,1.36,0.45,2.27,1.36,3.17l0,0l0,0c0.91,0.91,1.81,1.36,3.17,1.36l0,0h66.2c2.72,0,4.53-2.27,4.53-4.53v-16.78
                                    C-16.42,127.15-18.23,124.88-20.95,124.88"/>
                            </g>
                            <g id="g7978" transform="matrix(1.6639441,0,0,1.6639441,517.12172,384.29914)">
                                <path id="path7980" d="M170.65,50.86c2.72,0,4.53-2.27,4.53-4.53V29.55c0-2.72-2.27-4.53-4.53-4.53h-66.2l0,0
                                    c-1.36,0-2.27,0.45-3.17,1.36l0,0l0,0c-0.91,0.91-1.36,1.81-1.36,3.17l0,0v102.93l0,0c0,1.36,0.45,2.27,1.36,3.17l0,0l0,0
                                    c0.91,0.91,1.81,1.36,3.17,1.36l0,0h66.2c2.72,0,4.53-2.27,4.53-4.53V115.7c0-2.72-2.27-4.53-4.53-4.53h-44.89V93.93h44.89
                                    c2.72,0,4.53-2.27,4.53-4.53V72.62c0-2.72-2.27-4.53-4.53-4.53h-44.89V50.86L170.65,50.86z"/>
                            </g>
                        </g>
                    </svg>
                </a>
                {{-- WHATSAPP --}}
                <a href="https://bit.ly/WAShoepoint" target="_blank">
                    <svg class="icons" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                        <path d="m256 0c-141.363281 0-256 114.636719-256 256s114.636719 256 256 256 256-114.636719 256-256-114.636719-256-256-256zm5.425781 405.050781c-.003906 0 .003907 0 0 0h-.0625c-25.644531-.011719-50.84375-6.441406-73.222656-18.644531l-81.222656 21.300781 21.738281-79.375c-13.410156-23.226562-20.464844-49.578125-20.453125-76.574219.035156-84.453124 68.769531-153.160156 153.222656-153.160156 40.984375.015625 79.457031 15.96875 108.382813 44.917969 28.929687 28.953125 44.851562 67.4375 44.835937 108.363281-.035156 84.457032-68.777343 153.171875-153.21875 153.171875zm0 0"/><path d="m261.476562 124.46875c-70.246093 0-127.375 57.105469-127.40625 127.300781-.007812 24.054688 6.726563 47.480469 19.472657 67.75l3.027343 4.816407-12.867187 46.980468 48.199219-12.640625 4.652344 2.757813c19.550781 11.601562 41.964843 17.738281 64.816406 17.746094h.050781c70.191406 0 127.320313-57.109376 127.351563-127.308594.011718-34.019532-13.222657-66.003906-37.265626-90.066406-24.042968-24.0625-56.019531-37.324219-90.03125-37.335938zm74.90625 182.035156c-3.191406 8.9375-18.484374 17.097656-25.839843 18.199219-6.597657.984375-14.941407 1.394531-24.113281-1.515625-5.5625-1.765625-12.691407-4.121094-21.828126-8.0625-38.402343-16.578125-63.484374-55.234375-65.398437-57.789062-1.914063-2.554688-15.632813-20.753907-15.632813-39.59375 0-18.835938 9.890626-28.097657 13.398438-31.925782 3.511719-3.832031 7.660156-4.789062 10.210938-4.789062 2.550781 0 5.105468.023437 7.335937.132812 2.351563.117188 5.507813-.894531 8.613281 6.570313 3.191406 7.664062 10.847656 26.5 11.804688 28.414062.957031 1.917969 1.59375 4.152344.320312 6.707031-1.277344 2.554688-5.519531 8.066407-9.570312 13.089844-1.699219 2.105469-3.914063 3.980469-1.679688 7.8125 2.230469 3.828125 9.917969 16.363282 21.296875 26.511719 14.625 13.039063 26.960938 17.078125 30.789063 18.996094 3.824218 1.914062 6.058594 1.59375 8.292968-.957031 2.230469-2.554688 9.570313-11.175782 12.121094-15.007813 2.550782-3.832031 5.105469-3.191406 8.613282-1.914063 3.511718 1.273438 22.332031 10.535157 26.160156 12.449219 3.828125 1.917969 6.378906 2.875 7.335937 4.472657.960938 1.597656.960938 9.257812-2.230469 18.199218zm0 0"/>
                    </svg>
                </a>
            </div>
            <div class="col-sm-6 col-md-8">
                <div class="copyright">
                    &copy; 2021 Shoepoint Indonesia. Made by Nix Studio.
                </div>
            </div>
        </div> 
    </footer>

    {{-- APP JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>