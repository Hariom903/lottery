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
    {{-- jQuery library --> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <div class="pc-content   ">

        <div class="container">
            <div class=" card  mb-0">
                <div class="card-body  pt-3 pb-0 ">
                    <div class="row align-items-center">

                        <div class="col-md-12 ">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                            class="ph ph-house"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="{{ route('lotteries.index') }}">lotteries </a> </li>
                                <li class="breadcrumb-item" aria-current="page"> Buy a Lottery </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
            <div class="card  mt-1 ">
                <div class="card-header  text-white rounded-top-4">
                    <h4 class="mb-0">{{ $ticket->title }}</h4>
                </div>

                <div class="row g-0">
                    {{-- Left Side: Ticket Details & Form --}}
                    <div class="col-md-6  p-4">
                        <div class="containeer rounded shadow p-4 ">
                            <div class="mb-3">
                                <p><strong>Description:</strong> {{ $ticket->description }}</p>
                                <p><strong>Ticket Price:</strong> ₹{{ $ticket->ticket_price }}</p>
                                <p><strong>Total Tickets:</strong> {{ $ticket->total_tickets }}</p>
                                <p><strong>Sold Tickets:</strong> {{ $ticket->sold_tickets }}</p>
                            </div>

                            <form id="checkout-form">
                                @csrf
                                <input type="hidden" name="lottery_id" value="{{ $ticket->id }}">

                                <div class="form-group mb-3">
                                    <label for="quantity" class="form-label">Number of Tickets to Buy:</label>
                                    {{-- <input type="number" id="quantity" name="quantity" min="1"
                                        max="{{ $ticket->total_tickets - $ticket->sold_tickets }}" class="form-control"
                                       value="1" required> --}}
                                    <div class="mb-3 form-group d-flex align-items-center justify-content-center gap-2">
                                        <button type="button" class="btn btn-primary btn-sm rounded-circle"
                                            id="decrement">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="number" id="quantity" name="quantity"
                                            class="form-control  text-center" value="1" min="1"
                                            style="width: 90px; font-weight: bold;">
                                        <button type="button" class="btn btn-primary btn-sm rounded-circle"
                                            id="increment">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <button id="paybtn" type="button" class="btn btn-success w-100">
                                    Pay ₹{{ $ticket->ticket_price }}
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Right Side: Winner Prizes --}}
                    <div class="col-md-6 p-4">
                        <h5 class="mb-3 fw-bold text-dark">Winner Prizes</h5>

                        <div class="row g-3">
                            @foreach ($ticket->prizes as $price)
                                <div class="col-sm-12  col-md-6 mb-4">
                                    <div class="card bg-danger h-100 border-0 shadow-lg rounded-4 bg-gradient position-relative overflow-hidden"
                                        style="background: linear-gradient(135deg, #08d108 0%, #dd2476 100%);">
                                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="me-3 flex-shrink-0">
                                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow"
                                                        style="width: 64px; height: 64px;">
                                                        <img src="{{ asset('images/' . $price->img_name) }}"
                                                            class="img-fluid rounded-circle" alt="prize"
                                                            style="width: 56px; height: 56px; object-fit: cover;">
                                                    </div>
                                                </div>
                                                <div>
                                                    <h5 class="fw-bold text-white mb-1 text-uppercase">
                                                        {{ $price->prize_name }}</h5>
                                                    <span class="badge bg-warning text-dark fs-6 px-3 py-1 shadow-sm">
                                                        <i class="feather icon-award me-1"></i>
                                                        Position {{ $price->winner_position }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mt-auto">
                                                <span class="text-white-50 small">Congratulations to winner!</span>
                                            </div>
                                        </div>
                                        <span class="position-absolute top-0 end-0 m-3">
                                            <i class="ph ph-trophy text-worning"
                                                style="font-size: 4rem; opacity: 0.5;"></i>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('footer')
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

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var price = {{ $ticket->ticket_price }};
    var quantityInput = document.getElementById('quantity');
    var payBtn = document.getElementById('paybtn');

    document.getElementById('increment').onclick = function() {
        var qty = document.getElementById('quantity');
        payBtn.disabled = false;
        var count = qty.value = parseInt(qty.value) + 1;
        payBtn.innerText = 'Pay ₹' + (count * price).toFixed(2);
    };
    document.getElementById('decrement').onclick = function() {
        var qty = document.getElementById('quantity');
        payBtn.disabled = false;
        if (parseInt(qty.value) > 1)
            var count = qty.value = parseInt(qty.value) - 1;
        payBtn.innerText = 'Pay ₹' + (count * price).toFixed(2);
    };
    var end = new Date("{{ \Carbon\Carbon::parse($ticket->draw_datetime)->format('Y-m-d H:i:s') }}").getTime();
    var now = new Date().getTime();
    var diff = end - now;
    // console.log(diff);
    if (diff < 0) {
        payBtn.innerText = ' Lottery End  ';
        payBtn.disabled = true;
        quantityInput.disabled = true;

    }
    // Update button label on input
    quantityInput.addEventListener('input', function() {
        payBtn.disabled = false;
        var qty = parseInt(this.value) || 1;
        if (qty < 1) qty = 1;
        if (qty > {{ $ticket->total_tickets - $ticket->sold_tickets }}) {
            qty = {{ $ticket->total_tickets - $ticket->sold_tickets }};
        }
        this.value = qty;

        payBtn.innerText = 'Pay ₹' + (qty * price).toFixed(2);

    });



    payBtn.addEventListener('click', function(e) {
        //loader showing
        // Show a loading indicator
        payBtn.innerText = 'Processing...';
        payBtn.disabled = true; // Disable the button to prevent multiple clicks

        e.preventDefault();

        //time diffrecace

        if (quantityInput.value == 0) {
            return;
        } else if (!{{ $ticket->total_tickets - $ticket->sold_tickets }}) {
            console.log({{ $ticket->total_tickets - $ticket->sold_tickets }});
            alert("Sold full ");
            return
        }


        var qty = parseInt(quantityInput.value) || 1;

        $.ajax({
            url: "{{ route('payment.createOrder') }}",
            type: "POST",
            data: {
                'lottery_id': '{{ $ticket->id }}',
                'quantity': qty,
                'price': price,
                '_token': '{{ csrf_token() }}'
            },
            success: (data) => {
                // console.log('Order created successfully:', data);
                var options = {
                    "key": "{{ env('RAZORPAY_API_KEY') }}",
                    "amount": data.amount, // Amount in paise
                    "currency": "INR",
                    "name": "Lottery Ticket Purchase",
                    "description": "Purchase lottery ticket for {{ $ticket->title }}",
                    "image": "{{ asset('images/logo.png') }}",
                    "order_id": data.id, // This is the order_id created by you in your server
                    "handler": function(response) {
                        console.log('Payment successful:', response);
                        if (response.razorpay_payment_id) {
                            $.ajax({
                                url: "{{ route('payment.store') }}",
                                type: "POST",
                                data: {
                                    'razorpay_order_id': response.razorpay_order_id,
                                    'razorpay_payment_id': response
                                        .razorpay_payment_id,
                                    'razorpay_signature': response
                                        .razorpay_signature,
                                    'status': 'success',
                                    'amount': data.amount,
                                    'currency': "INR",
                                    'email': "{{ Auth::user()->email }}",
                                    'phone': "{{ Auth::user()->phone ?? ' ' }}",
                                    "user_id": "{{ Auth::user()->id }}",
                                    'quantity': qty,
                                    'lottery_id': '{{ $ticket->id }}',
                                    '_token': '{{ csrf_token() }}'

                                },
                                success: (response) => {
                                    // console.log('Payment stored successfully:', response);
                                    if (response.status === 'success') {
                                        // alert('Payment successful! Your ticket has been purchased.');
                                        window.location.href =
                                            `{{ route('payment.success') }}`;
                                    } else {
                                        alert(
                                            'Payment failed. Please try again.');
                                    }
                                },
                                error: (xhr, status, error) => {
                                    console.error('Error storing payment:',
                                        error);
                                    alert(
                                        'Failed to store payment. Please try again.');
                                }
                            })


                        } else {
                            alert('Payment failed. Please try again.');
                        }


                    },
                    "prefill": {
                        "name": "{{ Auth::user()->name }}",
                        "email": "{{ Auth::user()->email }}",
                        "contact": "{{ Auth::user()->phone }}"
                    },
                    "theme": {
                        "color": "#62a1e9f5"
                    },
                    "method": {
                        "upi": true,
                        "card": true,
                    },

                }

                var rzp1 = new Razorpay(options);
                rzp1.open();
            },
            error: (xhr, status, error) => {
                console.error('Error creating order:', error);
                alert('Failed to create order. Please try again.');
            }
        })


    });
</script>
