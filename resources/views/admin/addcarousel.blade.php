@extends('layout.app')

@section('content')
    <div class="container rounded shadow p-4 ">

        <form action="{{ route('carouselr.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="carousel"> carousel Image  </label>
                <input type="file" class="form-control" name="carousel" id="carousel">
                @error('carousel')
                 <samp class="red-error">{{ $message }} </samp>
                @enderror
            </div>
            <div class="mb-3">
                <label for="position"> carousel Position  </label>
                    {{-- <input type="number" min="1" max="3" class="form-control" name="position" id="position"> --}}
                    <select name="position" class='form-control'>
                        <option> Select Position  </option>
                        <option value="1"> Position 1 </option>
                        <option value="2"> Position 2 </option>
                        <option value="3"> Position 3 </option>
                    </select>
                @error('position')
               <samp class="red-error"> {{ $message }} </samp>
                @enderror
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary rounded  "> Add Or Update  </button>
            </div>


        </form>


    </div>

    <div class="container  rounded shadow p-4 mt-3 ">
        <table class="table ">
            <thead>
                <tr>
                    <th> S.No </th>
                    <th> Title </th>
                    <th> Image </th>
                    <th> Status </th>
                    <th> Positions </th>
                    <th> Opretions </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carousels as $carousel)
                    <tr>
                        <td>{{ $carousel->id }} </td>
                        <td>{{ $carousel->title }} </td>
                        <td>
                            <a class="glightbox " data-width="600px" href="{{ asset("carousel/$carousel->path") }}"> <img
                                    width="170px " class="rounded-4" src="{{ asset("carousel/$carousel->path") }}" alt=""> </a>
                        </td>
                        <td>{{ $carousel->is_active }} </td>
                        <td> {{ $carousel->position }}  </td>
                        <td>
                            <a href="{{ route('carousel.edit',$carousel->id) }}" class="btn rounded-3 btn-primary">
                                @if ($carousel->is_active)
                                <i class="ph ph-eye"></i>
                                @else
                                <i class="ph ph-eye-slash"></i>
                                @endif
                            </a>
                            <a href="{{ route('carousel.detete',$carousel->id) }} " class="btn btn-primary rounded-3 "> <i class="ph ph-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<script>
     const lightbox = GLightbox({
    selector: '.glightbox',

  });
  </script>
@endsection



