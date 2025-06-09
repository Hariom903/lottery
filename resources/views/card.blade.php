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


    <!-- [Pre-loader ] end -->
    @include('header')
    <br />
    <br />
    <br />
    <div class="pc-content mt-5  ">
        <div class="container mt-5">
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>{{ $ticket->title }}</h4>
                </div>

                <div class="row ">
                    <div class="col-md-6">
                        <div class="card-body">
                            <p><strong>Description:</strong> {{ $ticket->description }}</p>
                            <p><strong>Ticket Price:</strong> {{ $ticket->ticket_price }}</p>
                            <p><strong>Total Tickets:</strong> {{ $ticket->total_tickets }}</p>
                            <p><strong>Sold Tickets:</strong> {{ $ticket->sold_tickets }}</p>

                            <form action="{{ route('stripe.post') }}" method="POST" id="checkout-form">
                                @csrf

                                <input type="hidden" name="lottery_id" value="{{ $ticket->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="price" value="{{ $ticket->ticket_price }}">

                                <div class="form-group">
                                    <label for="quantity">Number of Tickets to Buy:</label>
                                    <input type="number" name="quantity" min="1"
                                        max="{{ $ticket->total_tickets - $ticket->sold_tickets }}" class="form-control"
                                        required>
                                </div>

                                <label>Name on Card</label>
                                <input type="text" name="name" class="form-control" placeholder="Cardholder Name">

                                <div id="card-element" class="form-control my-3"></div>
                                <input type="hidden" name="payment_method" id="payment-method">

                                <button id="pay-btn" type="button" class="btn btn-primary w-100 mt-3">
                                    Pay ${{ $ticket->ticket_price }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6 pt-4 col-xl-3">
                        @foreach ( $ticket->prizes as $price)
                            <div class="card bg-grd-danger order-card">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-9">
                                    <h6 class="text-white">{{ $price->prize_name }}</h6>
                                    <h2 class="text-start  text-white">
                                        <i class="feather icon-award float-start"></i><span class="h5 text-white">Winner
                                            Position {{ $price->winner_position }} </span>
                                    </h2>
                                    </div>
                                    <div class="col-3">
                                     {{-- img  --}}
                                     <img src="{{ asset('images/'. $price->img_name) }}" class="img-fluid" alt="winner">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <footer class="pc-footer">
            <div class="footer-wrapper container-fluid">
                <div class="row">
                    <div class="col-sm-6 my-1">
                        <p class="m-0">Gradient Able &#9829; crafted by Team <a href="#" target="_blank">Hariom
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

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const payBtn = document.getElementById('pay-btn');

    payBtn.addEventListener('click', function() {
        payBtn.disabled = true;

        stripe.createPaymentMethod({
            type: 'card',
            card: cardElement,
            billing_details: {
                name: document.querySelector('input[name="name"]').value,
            },
        }).then(function(result) {
            if (result.error) {
                alert(result.error.message);
                payBtn.disabled = false;
            } else {
                document.getElementById('payment-method').value = result.paymentMethod.id;
                document.getElementById('checkout-form').submit();
            }
        });
    });
</script>
