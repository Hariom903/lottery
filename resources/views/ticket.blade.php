<div class="owl-carousel-ticket owl-carousel">
@foreach ($lotteries as $lottery)
    <div class="item">
        <div class="card shadow raffle-ticket border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="fw-bold text-primary mb-0">{{ $lottery->title }}</h5>
                    <span class="badge bg-primary fs-6">#{{ str_pad($lottery->id, 6, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="mb-3">
                    <span class="badge bg-success me-2">
                        <i class="ph ph-ticket"></i> Ticket Price: {{ $lottery->ticket_price }}
                    </span>
                    <span class="badge bg-info text-dark">
                        <i class="ph ph-ticket"></i> Sold: {{ $lottery->sold_tickets }}
                    </span>
                </div>
                <p class="mb-2 text-secondary">
                    {{ $lottery->description }}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-semibold text-dark">Total Tickets: {{ $lottery->total_tickets }}</span>
                    <a href="{{ url('cards/' . $lottery->tid) }}" class="btn btn-primary btn-sm px-4">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
<script>
$(document).ready(function(){
  $('.owl-carousel-ticket').owlCarousel({
      loop:true,
      margin:24,
      nav:true,
      dots:true,
       autoplay: true,
      responsive:{
          0:{ items:1 },
          768:{ items:2 },
          1200:{ items:3 }
      }
  });
});
</script>
