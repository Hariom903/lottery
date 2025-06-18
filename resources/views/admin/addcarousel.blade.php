@extends('layout.app')

@section('content')

<div class="container rounded shadow p-4 ">

    <form action="{{ route('carouselr.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
      <div class="mb-3">
     <label for="carousel-1"> 1<sup>st </sup> carouselr </label>
     <input type="file" class="form-control" name="carousel-1" id="carousel-1">
      </div>
      <div class="mb-3">
     <label for="carousel-2"> 2<sup>nd </sup> carouselr </label>
     <input type="file" class="form-control" name="carousel-2" id="carousel-2">
      </div>
      <div class="mb-3">
     <label for="carousel-3"> 3<sup>rd </sup> carouselr  </label>
     <input type="file" class="form-control" name="carousel-3" id="carousel-3">
      </div>
      <div class="mb-3 text-center">
      <button type="submit"  class="btn btn-primary rounded  " > Add  </button>
    </div>


    </form>


</div>


@endsection
