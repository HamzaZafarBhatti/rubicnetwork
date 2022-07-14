<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Rubic Network - Extract & Staking Platform - RubicNetwork.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://rubicnetwork.com/front_assets/images/manual_uploads/favicon/favicon-32x32.png">
    @include('user.layouts.head-css')
    <link href="{{ URL::asset('user_assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <style>
        .custom-gap {
            gap: 20px;
        }

        @media only screen and (max-width: 767px) {
            .custom-gap {
                gap: 4px;
            }
        }
    </style>
</head>

@yield('body')

@yield('content')

@include('user.layouts.vendor-scripts')
<script src="{{ URL::asset('user_assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        @if (Session::has('success'))
            Swal.fire({
                title: "Success",
                text: '{{ session('success') }}',
                icon: "success",
                confirmButtonColor: "#1c84ee"
            })
        @endif
        @if (Session::has('error'))
            Swal.fire({
                title: "Error",
                text: '{{ session('error') }}',
                icon: "error",
                confirmButtonColor: "#1c84ee"
            })
        @endif
    })
</script>
</body>

</html>
