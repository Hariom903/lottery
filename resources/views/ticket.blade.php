<div class="pc-content">
    <div class="row mt-5 pt-5 ">
        @foreach ($lotteries as $lottery)
            <div class="col-md-6  col-xl-4">
                <div class="card bg-grd-primary order-card">
                    <div class="card-body ">
                        <h6 class="text-white">{{ $lottery->title }}</h6>
                        <h2 class="text-start h4 text-white"><i class="ph ph-ticket"> </i> <span>Ticket
                                Price:{{ $lottery->ticket_price }}</span>
                            <h2 class="text-start h4 text-white"><i class="ph ph-ticket"> </i><span>Totle Solt:
                                    {{ $lottery->sold_tickets }}</span>
                            </h2>

                            <p class="m-b-0"> {{ $lottery->description }}<span class="float-end">Total Tickets:
                                    {{ $lottery->total_tickets }}</span></p>
                            <p class="m-b-0"> <span class="float-end "> <a href="{{ url('cards/' . $lottery->tid) }}"
                                        class="btn btn-info"> Buy Now </a></span></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row ">
        <div class="col-12 d-flex justify-content-end mt-3">
            {{-- {{ $lotteries->links() }} --}}
        </div>
    </div>

</div>
