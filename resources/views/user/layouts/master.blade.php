<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Rubic Network - Extract & Staking Platform - RubicNetwork.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('front_assets/images/manual_uploads/favicon/favicon-32x32.png') }}">
    @include('user.layouts.head-css')
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
    <link href="{{ URL::asset('user_assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
</head>

@section('body')
    @include('user.layouts.body')
@show
<!-- Begin page -->
<div id="layout-wrapper">
    @include('user.layouts.topbar')
    @include('user.layouts.sidebar')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('user.layouts.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
@include('user.layouts.vendor-scripts')
<script src="{{ URL::asset('user_assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(() => {
            console.log('master timeout')
            $('body').attr('data-sidebar-size', 'lg')
        }, 2000);
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
        @if (Session::has('alert'))
            Swal.fire({
                title: "Error",
                text: '{{ session('alert') }}',
                icon: "alert",
                confirmButtonColor: "#1c84ee"
            })
        @endif
        if ("{{ $user_proof }}" == 1) {
            swal({
                    title: null,
                    text: "Congratulations on your Approved Withdrawal PAYMENT to your BANK from RUBICNETWORK! ????",
                    icon: "success",
                    buttons: ["Close", "Upload Payment Proof Now!"],
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "{{ route('user.payment_proofs.create') }}"
                    }
                });
        }
    })
</script>
</body>

</html>
