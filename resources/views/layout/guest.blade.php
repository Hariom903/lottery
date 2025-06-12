<!-- filepath: resources/views/layout/guest.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <!-- ...existing head code... -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" id="main-style-link" />
    {{-- <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap.min.css') }}" /> --}}
    <!-- ...other styles... -->
</head>
<body>
    @include('header')

    <div class="pc-container m-0 p-0 ">
        @yield('content')
    </div>

    @include('footer')
    <!-- ...scripts... -->
</body>
</html>
