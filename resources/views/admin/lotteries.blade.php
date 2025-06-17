@extends('layout.app');
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row pb-4">
        <div class="col-3">
            <button type="button" data-bs-toggle="modal" data-bs-target="#lottery" class="btn btn-primary btn-block">New
                Lottrey </button>
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal  fade" id="lottery" tabindex="-1" aria-labelledby="lotteryModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="lotteryModalLabel">Add Lottery Here..! </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('lottery.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="lottery_name" class="form-label">Lottery Name</label>
                                    <input type="text" value="{{ old('title') }}" class="form-control" id="lottery_name"
                                        name="title">
                                </div>
                                @error('title')
                                    <samp class="red-error">{{ $message }}</samp>
                                @enderror
                                <div class="mb-3">
                                    <label for="winning_number" class="form-label">description</label>

                                    <textarea id="markdown-editor" rows="16" value="{{ old('description') }}" name="description"></textarea>


                                </div>
                                @error('description')
                                    <samp class="red-error">{{ $message }}</samp>
                                @enderror

                                <div class="mb-3">
                                    <label for="ticket_price" class="form-label">Ticket Price</label>
                                    <input type="number" value="{{ old('ticket_price') }}" class="form-control"
                                        id="ticket_price" name="ticket_price">
                                </div>
                                @error('ticket_price')
                                    <samp class="red-error">{{ $message }}</samp>
                                @enderror

                                <div class="mb-3">
                                    <label for="total_tickets" class="form-label">Total Tickets</label>
                                    <input type="number" value="{{ old('total_tickets') }}" class="form-control"
                                        id="total_tickets" name="total_tickets">
                                </div>
                                @error('total_tickets')
                                    <samp class="red-error">{{ $message }}</samp>
                                @enderror

                                <div class="mb-3">
                                    <label for="number_winners" class="form-label"> Number of winners </label>
                                    <input type="number" min='1' value="{{ old('number_winners') }}"
                                        class="form-control" id="number_winners" name="number_of_winners">
                                </div>
                                @error('sold_tickets')
                                    <samp class="red-error">{{ $message }}</samp>
                                @enderror

                                <div class ="mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Add Lottery</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- // serch bar goes here... --}}
        <div class="col-9 d-flex justify-content-end">
            <form action="{{ route('lottery') }}" method="GET">
                <div class="input-group" style="width: 350px;">
                    <input type="text" class="form-control" name='search' value="{{ old('search') }}"
                        placeholder="Search by lottery name...">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>




    <div class="row">
        @foreach ($lotteries as $lottery)
            <div class="col-md-6 col-xl-3">

                    <div class="card bg-grd-primary order-card">
                        <div class="card-body">
                            <h6 class="text-white">{{ $lottery->title }}</h6>
                            <h2 class="text-start h4 text-white"><i class="ph ph-ticket"> </i> <span>Ticket
                                    Price:{{ $lottery->ticket_price }}</span>
                                <h2 class="text-start h4 text-white"><i class="ph ph-ticket"> </i><span>Totle Solt:
                                        {{ $lottery->sold_tickets }}</span>
                                </h2>
                                <h2 class="text-start h5 text-white">
                                    <span>Open Date:
                                        {{ \Carbon\Carbon::parse($lottery->draw_datetime)->format('d M Y') }}</span>
                                </h2>

                                <p class="m-b-0"> {{ $lottery->description }}<span class="float-end">Total Tickets:
                                        {{ $lottery->total_tickets }}</span></p>

                        </div>
                    </div>
             
            </div>
        @endforeach
    </div>
    <div class="row ">
        <div class="col-12 d-flex justify-content-end mt-3">
            {{ $lotteries->links() }}
        </div>
    </div>
@endsection
