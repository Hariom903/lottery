@extends('layout.app')

@section('content')
    <form method="POST" action="{{ route('price.add.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="price">Price Name </label>
            <input type="text" id="price" name="prize_name" class="form-control">
            @error('prize_name')
          <samp class="red-error">{{ $message }}</samp>
            @enderror
        </div>
        <div class="mb-3">
            <label for='image'>Image</label>
            <input type="file" id="image" name="image" class="form-control">
            @error('image')
            <samp class="red-error">{{ $message }}</samp>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lottery_id">Lottery Name </label>

            <select class="form-select" id="lottery_id" name="lottery_id">

                <option value="">Select Lottery</option>
                @foreach ($lotteries as $lottery)
                    <option value="{{ $lottery->id }}">{{ $lottery->title }}</option>
                @endforeach
            </select>

            @error('lottery_id')
            <samp class="red-error">{{ $message }}</samp>
            @enderror

        </div>
        <div class="mb-3">
            <div id="winer"></div>
               @error('winner_position')<samp class='red-error'>{{ $message }}</samp> @enderror
        </div>




        <button type="submit" class="btn btn-primary">Add Price</button>


    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $("#lottery_id").change(function() {

                let lottery_id = $(this).val();
                $.ajax({
                    url: "{{ route('winnernumber') }}",
                    type: "POST",

                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'lottery_id': lottery_id
                    },
                    success: function(response) {
                        if (!response.error) {
                            let winnerArray = response.arr;

                            // Start building the <select> element
                            let htmlContent =
                            '<label  for="select_winner">Select Winner</label>';
                            htmlContent += '<select class="form-control" id="select_winner" name="winner_position">';

                            for (let i = 0; i < winnerArray.length; i++) {
                                console.log(winnerArray[i]);
                                let winnerLabel = "Winner " + winnerArray[i];
                                htmlContent += '<option class="form-control" value="' + winnerArray[i] + '">' +
                                    winnerLabel + '</option>';
                            }

                            htmlContent += '</select>';

                            // Insert into the #winer element
                            $("#winer").html(htmlContent);
                        }




                    },
                    error: function(xhr) {
                        console.error("AJAX Error:", xhr.responseText);
                    }
                });


            });
        });
    </script>
@endsection
