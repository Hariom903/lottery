<!-- filepath: resources/views/index.blade.php -->
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
    <!-- [Bootstrap CSS] -->
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap.min.css') }}" />

    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
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

<body data-pc-header="header-1" data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true"
    data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    @include('header')
    <!-- [ Pre-loader ] End -->

    <div class="pc-container m-0">
        <!-- Hero Section Start -->

        <section class="hero-section py-5 bg-primary ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 text-white">
                        <h1 class="display-4 fw-bold mb-3" style="color: #ffe600;">
                            Welcome to the Lottery System
                        </h1>
                        <p class="lead mb-4" style="color: #fff;">
                            Participate in exciting lotteries and stand a chance to win amazing prizes!<br>
                            Secure, fair, and fun—join millions of winners worldwide.
                        </p>
                        <a href="{{ route('lotteries.index') }}"
                            class="btn btn-light text-primary btn-lg px-4 shadow-sm fw-semibold">
                            View Lotteries
                        </a>
                    </div>
                    <div class="col-lg-5 text-center mt-4 mt-lg-0">
                        <img src="{{ asset('images/hero-lottery.svg') }}" alt="Lottery Hero" class="img-fluid"
                            style="max-height: 260px;">
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

        <div class='container pt-5 '>
            <div id="carouselExampleSlidesOnly" class="carousel slide " data-bs-ride="carousel">
                <div class="carousel-inner rounded-5">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/caravsal.png') }}" height="350px" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/carousel-item2.png') }}" height="350px" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/carousel-item3.png') }}" height="350px" class="d-block w-100"
                            alt="...">
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="pc-content">
                <div class="row mt-5 pt-5" id="lottery-list">
                    <h2 class="text-center text-primary mb-4">Our Lotteries <a href="{{ route('lotteries.index') }}"
                            class="btn btn-light text-primary btn-lg px-4 shadow-sm fw-semibold">
                            View Lotteries
                        </a></h2>
                    @include('ticket', ['lotteries' => $lotteries])
                </div>

                <div class="row mb-2 ">
                    <div class="col-12 d-flex justify-content-end  mt-3">
                        @if ($lotteries->hasMorePages())
                            <button id="load-more" class="btn btn-primary"
                                data-next-page="{{ $lotteries->currentPage() + 1 }}">
                                See More
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="payout-banner my-4">
                <div class="payout-text">
                    <div class="payout-title">We paid out in prizes:</div>
                    <div class="payout-sub">Over 26,221,770 winners worldwide!</div>
                    <div class="payout-amount">$ 188,065,511</div>
                </div>
                <img src="{{ asset('images/payed.svg') }}" class="payout-img">
            </div>
        </div>

        <div class="container">
            {{-- Our winners --}}
            <h2 class="text-center text-primary mb-4">Our Winners</h2>
            <div class="owl-carousel owl-theme">
                @foreach ($winneruser as $winner)
                    <div class="item">
                        <div class="winner-card shadow-sm p-3 mb-4 bg-white rounded-5 d-flex align-items-center">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('images/user/avatar-2.jpg') }}" alt="{{ $winner->name }}"
                                        class="winner-avatar">
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

        {{-- Contact section --}}
        <section style="margin-bottom: 150px">
            <div class="container mb-3 border bg-white rounded shadow p-4" id="contact-us">
                <h3 class="text-center">We are here to help!</h3>
                <p class="text-center">
                    We do our best to make your playing experience secure, enjoyable, and comfortable. Whether you have
                    questions, concerns, or queries, reach the Lotto Agent customer support team. Around the clock,
                    seven days a week.
                </p>
                <div class="container mb-2 pb-3 col-md-9 border shadow rounded" style="background-color: #ebe7e7ec">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <strong>Success!</strong> {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.us.store') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <h5 class="text-start">Leave us a message</h5>
                            <p class="text-start">
                                Drop us a line and one of our dedicated customer support agents will get back to you
                                within 24 hours.
                            </p>
                        </div>
                        <div class="mb-3">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        required>
                                    @error('name')
                                        <span class="red-error">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        required>
                                    @error('email')
                                        <span class="red-error">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="Topic" class="form-label">Topic</label>
                                    <input type="text" class="form-control" name="Topic" id="Topic">
                                    @error('Topic')
                                        <span class="red-error">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="subTopic" class="form-label">Sub Topic</label>
                                    <input type="text" class="form-control" name="subTopic" id="subTopic">
                                    @error('subTopic')
                                        <span class="red-error">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="4"></textarea>
                            @error('message')
                                <span class="red-error">*{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
    </div>



    @if (!request()->cookie('cookie_accepted'))
    <form method="POST" action="{{  route('accept.cookie') }}">
        @csrf
        <div class="cookie-consent-bar">
            <span>We use cookies to provide and improve our services. By using our site, you consent to cookies.</span>
            <button type="submit" class="btn btn-warning btn-sm">Accept</button>
        </div>
    </form>
@endif


    <button type="button" class="btn btn-primary scroll-to-top" id="scrollToTopBtn" title="Go to top">
        <i class="ti ti-arrow-up"></i>
    </button>

    <footer>
        <div class="container-fluid mt-5 footer-container">
            @include('footer')
        </div>
    </footer>

    <!-- Scripts -->
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
                        items: 1
                    },
                    768: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            });

            // Scroll-to-top button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 200) {
                    $('#scrollToTopBtn').fadeIn();
                } else {
                    $('#scrollToTopBtn').fadeOut();
                }
            });
            $('#scrollToTopBtn').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
                return false;
            });
        });

        // Load more lotteries
        document.getElementById('load-more')?.addEventListener('click', function() {
            let button = this;
            let nextPage = button.getAttribute('data-next-page');
            fetch(`?page=${nextPage}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Your other scripts below -->
    <script src="{{ asset('js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/plugins/feather.min.js') }}"></script>
</body>

</html>
