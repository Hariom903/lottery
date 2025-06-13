<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title> Lotteries page </title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Gradient Able is trending dashboard template made using Bootstrap 5 design framework. Gradient Able is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="codedthemes" />
    <meta name="theme-color" content="#ff0000">

    <link rel="shortcut icon" id="favicon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon">
    <!-- [Favicon] icon -->

    <!-- map-vector css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/jsvectormap.min.css') }}" />
    <!-- [Google Font : Poppins] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />

    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('fonts/tabler-icons.min.css') }}" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('fonts/feather.css') }}" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome.css') }}" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('fonts/material.css') }}" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-preset.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body data-pc-header="header-1" data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true"
    data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    @include('header')
    <div class="pc-container m-0 p-0">
            <div class="container">
            <div class=" card  mb-0">
                <div class="card-body  pt-3 pb-0 ">
                    <div class="row align-items-center">

                        <div class="col-md-12 ">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                            class="ph ph-house"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">lotteries </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-2">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-5">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/caravsal.png') }}" height="350px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/carousel-item2.png') }}" height="350px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/carousel-item3.png') }}" height="350px" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>

            <div class="row pt-4">
                @foreach ($lotteries as $lottery)
                    <div class="col-md-6  col-xl-3">
                        <a href="{{ url('cards/' . $lottery->tid) }}" class="text-decoration-none">
                            <div class="card bg-grd-primary  box-shadow  rounded-5  order-card">
                                <div class="card-body">
                                    <h6 class="text-white">{{ $lottery->title }}</h6>
                                    <h2 class="text-start h4 text-white">
                                        <i class="ph ph-ticket"></i>
                                        <span>Ticket Price: {{ $lottery->ticket_price }}</span>
                                    </h2>
                                    <h2 class="text-start h4 text-white">
                                        <i class="ph ph-ticket"></i>
                                        <span>Total Sold: {{ $lottery->sold_tickets }}</span>
                                    </h2>
                                    <h2 class="text-start h5 text-white">
                                        <span>Open Date: {{ \Carbon\Carbon::parse($lottery->draw_datetime)->format('d M Y') }}</span>
                                    </h2>
                                    <p class="m-b-0 text-white text-end">
                                        {{ $lottery->description }}
                                        <span class="float-end">Total Tickets: {{ $lottery->total_tickets }}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row ">
        <div class="col-12 d-flex justify-content-end mt-3">
            {{ $lotteries->links() }}
        </div>
    </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary scroll-to-top" id="scrollToTopBtn" title="Go to top">
        <i class="ti ti-arrow-up"></i>
    </button>
    @include('footer')
</body>
<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script src="{{ asset('js/plugins/feather.min.js') }}"></script>

</html>
