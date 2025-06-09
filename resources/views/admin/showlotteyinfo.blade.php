@extends('layout.app')

@section('content')
<div class='container bg-info py-4'>
    <h2>{{ $lottery->title }} - Add  Prizes</h2>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form action="{{ route('lottery.prizes.store') }}" method="POST">
        @csrf
        <input type="hidden" name="lottery_id" value="{{ $lottery->id }}">

        @php
            // Get already added winner positions
         $existingPositions = $lottery->prizes->pluck('winner_position')->toArray();
         @endphp

        @for ($i = 1; $i <= $lottery->number_of_winners; $i++)

        @if (!in_array($i, $existingPositions))


        <div class="form-group mb-3">
                    <label>Prize for Winner Position {{ $i }}:</label>
                    <input type="number"
                           name="winning_price[{{ $i }}]"
                           class="form-control"
                           placeholder="e.g., 10000 or iPhone"
                          >
                    @error('winning_price.'. $i)
                <small class="red-error">{{ $message }}</small>
                @enderror
                <label> price_name for Winner Position {{ $i }}:</label>
                <input type="text"
                       name="prize_name[{{ $i }}]"
                       class="form-control"
                       >@error('prize_name.'. $i)
                       <small class="red-error">{{ $message }}</small>
                       @enderror




                </div>


            @else

                <p><strong>Prize already set for Position {{ $i }}</strong></p>
            @endif
        @endfor

        <button type="submit" class="btn btn-primary">Save Prizes</button>
    </form>
</div>
<div class="mt-3">
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</div>
@endsection
