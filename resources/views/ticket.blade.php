@foreach ($lotteries as $lottery)
    <div class="col-md-6 col-xl-4">
        <div class="card bg-grd-primary order-card">
            <div class="card-body">
                <h6 class="text-white">{{ $lottery->title }}</h6>
                <h2 class="text-start h4 text-white">
                    <i class="ph ph-ticket"></i> Ticket Price: {{ $lottery->ticket_price }}
                </h2>
                <h2 class="text-start h4 text-white">
                    <i class="ph ph-ticket"></i> Total Sold: {{ $lottery->sold_tickets }}
                </h2>
                <p class="m-b-0">
                    {{ $lottery->description }}
                    <span class="float-end">Total Tickets: {{ $lottery->total_tickets }}</span>
                </p>
                <p class="m-b-0">
                    <span class="float-end">
                        <a href="{{ url('cards/' . $lottery->tid) }}" class="btn btn-info">Buy Now</a>
                    </span>
                </p>
            </div>
        </div>
    </div>
@endforeach
