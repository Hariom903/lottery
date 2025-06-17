@extends('layout.app')

@section('content')

<div class="container rounded shadow p-4 ">

    <form action="" method="post" enctype="multipart/form-data" >
      <div class="mb-3">
     <label for="Firstimg"> 1<sup>st </sup> Poster  </label>
     <input type="file" class="form-control" name="" id="">
      </div>
      <div class="mb-3">
     <label for="Firstimg"> 2<sup>nd </sup> Poster  </label>
     <input type="file" class="form-control" name="" id="">
      </div>
      <div class="mb-3">
     <label for="Firstimg"> 3<sup>rd </sup> Poster  </label>
     <input type="file" class="form-control" name="" id="">
      </div>
      <div class="mb-3 text-center">
      <button type="submit" style="width: 70px " class="btn btn-primary  rounded  " > Add  </button>
    </div>


    </form>


</div>


@endsection
