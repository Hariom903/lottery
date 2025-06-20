@extends('layout.app')
@section('content')
    <div class="container rounded shadow p-4 ">
          @if (session('success'))
                        <div class="alert p-4  alert-success">
                            <strong>Success!</strong> {{ session('success') }}
                        </div>
                    @endif
        <form action="{{ route('couponcode.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="couponcode" class="form-label"> Coupon Code</label>
                <input type="text" class="form-control" id="couponcode" name="couponcode">
                @error('couponcode')
                    <samp class="red-error"> {{ $message }}
                    </samp>
                @enderror
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount </label>
                <input type="number" class="form-control" id="discount" name="discount">
                @error('discount')
                    <samp class="red-error"> {{ $message }}
                    </samp>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary"> Add Discount </button>

            </div>
        </form>
    </div>


       <div class="container  rounded shadow p-4 mt-3 ">
        <table class="table ">
            <thead>
                <tr>
                    <th> S.No </th>
                    <th> Coupon Code </th>
                    <th> Discount </th>
                    <th> Opretion </th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->id }} </td>
                        <td>{{ $coupon->couponcode }} </td>
                        <td>{{ $coupon->discount}} </td>
                        <td>
                         <a href="{{route('couponcode.delete',$coupon->id)}} " class="btn btn-primary rounded-3 "> <i class="ph ph-trash"></i> </a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>

@endsection

