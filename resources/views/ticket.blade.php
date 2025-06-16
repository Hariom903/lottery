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
                    <div class="mb-2">
    <span class="fw-bold text-danger" id="countdown-{{ $lottery->id }}">  heloo  </span>
</div>
                    <a href="{{ url('cards/' . $lottery->tid) }}" class="btn btn-primary btn-sm px-4">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
<script>

    // Collect all countdowns
  var countdowns = [
    @foreach ($lotteries as $lottery)
      {
        id: "countdown-{{ $lottery->id }}",
        endTime: new Date("{{ \Carbon\Carbon::parse($lottery->draw_datetime)->format('Y-m-d H:i:s') }}").getTime()
      },
    @endforeach
  ];

  function updateCountdowns() {
    // console.log("Updating countdowns...");
    var now = new Date().getTime();
    countdowns.forEach(function(cd) {
        var el = document.getElementById(cd.id);
    //   console.log(el.innerHTML);
        // console.log("Element for countdown", cd.id, ":", el);
      if (!el) return;
        // console.log("Updating countdown for:", cd.id);
      var distance = cd.endTime - now;
      if (distance < 0) {
        el.innerHTML = "Ended";
        return;
      }
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      el.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
    // el.innerHTML = "Ram arakl;sfnobsnj"
    //   console.log("Countdown for", cd.id, ":", el.innerHTML);
    });
  }

  updateCountdowns();
  setInterval(updateCountdowns, 3000);
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
