<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Home </title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Gradient Able is trending dashboard template made using Bootstrap 5 design framework. Gradient Able is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="codedthemes" />

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
    <link rel="stylesheet" href="{{ asset('css/style-preset.css') }}" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- jQuery & Owl Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-header="header-1" data-pc-preset="preset-1"  data-pc-sidebar-theme="light" data-pc-sidebar-caption="true"
    data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    @include('header')
    <div class="container  ">
        <div class="row mt-5   pt-5" id="lottery-list">
            @include('ticket', ['lotteries' => $lotteries])
        </div>

        <div class="row mb-2 ">
            <div class="col-12 d-flex justify-content-end  mt-3">
                @if ($lotteries->hasMorePages())
                    <button id="load-more" class="btn btn-primary" data-next-page="{{ $lotteries->currentPage() + 1 }}">
                        See More
                    </button>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <div class="owl-carousel owl-theme">
            @foreach ($winneruser as $winner)
                <div class="item">
                    {{-- title winner  --}}

                    <div class="winner-card shadow-sm p-3 mb-4 bg-white rounded d-flex align-items-center">
                        <div class=row>
                            <div class="col-4">
                                <img src="{{ asset('images/user/avatar-2.jpg') }}" alt="{{ $winner->name }}"
                                    class="winner-avatar  ">
                            </div>
                       
                            <div class="col-8">
                                <div class="winner-info ms-3">
                                    <h5 class="mb-2 text-primary">{{ $winner->name }}</h5>
                                    <p class="mb-0">{{ $winner->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },

                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>


    <script>
        document.getElementById('load-more')?.addEventListener('click', function() {
            let button = this;
            let nextPage = button.getAttribute('data-next-page');

            fetch(`?page=${nextPage}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest' // ✅ correc
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('lottery-list').insertAdjacentHTML('beforeend', html);

                    const totalPages = {{ $lotteries->lastPage() }};
                    if (nextPage >= totalPages) {
                        button.style.display = 'none';
                    } else {
                        button.setAttribute('data-next-page', parseInt(nextPage) + 1);
                    }
                })
                .catch(error => {
                    console.error('Error loading more lotteries:', error);
                });
        });
    </script>
    <footer id="footer" class="overflow-hidden">
        <hr>
        <div class="container">
            <div class="row">
                <div class="footer-top-area">
                    <div class="row d-flex flex-wrap justify-content-between">
                        <div class="col-lg-2 col-sm-6 pb-3">
                            <div class="footer-menu text-uppercase">
                                <h5 class="widget-title pb-2">Quick Links</h5>
                                <ul class="menu-list list-unstyled text-uppercase">
                                    <li class="menu-item pb-2">
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="#">About</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="{{ url('mytickets') }}">myticat</a>
                                    </li>
                                    <li class="menu-item pb-2">
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-3">
                            <div class="footer-menu contact-item">
                                <h5 class="widget-title text-uppercase pb-2">Contact Us</h5>
                                <p>Do you have any queries or suggestions? <a href="mailto:">yourinfo@gmail.com</a>
                                </p>
                                <p>If you need support? Just give us a call. <a href="">+55 111 222 333 44</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </footer>
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm-6 my-1">
                    <p class="m-0">Gradient Able &#9829; crafted by Team <a href="http://hariom.ct.ws" target="_blank">Hariom
                            dangi </a></p>
                </div>
                <div class="col-sm-6 ms-auto my-1">
                    <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
                        <li class="list-inline-item"><a href="{{ route('home') }}">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
<!-- Bootstrap Bundle with Popper -->

<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script src="{{ asset('js/plugins/feather.min.js') }}"></script>

</html>
