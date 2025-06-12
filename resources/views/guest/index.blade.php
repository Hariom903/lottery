<!-- filepath: resources/views/guest/index.blade.php -->
@extends('layout.guest')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Play the Lottery Online with Official Tickets</h2>
                </div>
            </div>


            </div>
        </div>

            <div class="col-md-6 col-xl-4 mb-4">
                <div class="card shadow raffle-ticket border-0">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="fw-bold text-primary mb-0">{{--  --}}</h5>
                            <span class="badge bg-primary fs-6">#{{--  --}}</span>
                        </div>
                        <div class="mb-3">
                            <span class="badge bg-success me-2">
                                <i class="ph ph-ticket"></i> Ticket Price: {{--  --}}
                            </span>
                            <span class="badge bg-info text-dark">
                                <i class="ph ph-ticket"></i> Sold: {{--  --}}
                            </span>
                        </div>
                        <p class="mb-2 text-secondary">
                            {{--  --}}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-semibold text-dark">Total Tickets: {{-- - --}}</span>
                            <a href="{{--  --}}" class="btn btn-primary btn-sm px-4">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>


    @endsection
