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
                <p class="m-b-0">
                    <span class="float-end">
                        <button class="btn btn-primary"
                            onclick="document.getElementById('shareModal').style.display='block'">Share</button>

                        <div id="shareModal">
                            <span class="close-btn"
                                onclick="document.getElementById('shareModal').style.display='none'">&times;</span>
                            <h4>Share via:</h4>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('cards/' . $lottery->tid)) }}"
                                target="_blank">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url('cards/' . $lottery->tid)) }}&text=Check+this+lottery+card!"
                                target="_blank">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                            <a href="https://wa.me/?text=Check+this+lottery+card:+{{ urlencode(url('cards/' . $lottery->tid)) }}"
                                target="_blank">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                            <a href="https://t.me/share/url?url={{ urlencode(url('cards/' . $lottery->tid)) }}&text=Check+this+lottery+card!"
                                target="_blank">
                                <i class="fab fa-telegram"></i> Telegram
                            </a>
                            <a
                                href="mailto:?subject=Check this lottery card&body=Check+this+lottery+card:+{{ urlencode(url('cards/' . $lottery->tid)) }}">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </div>


                    </span>
                </p>

            </div>
        </div>
    </div>
@endforeach
