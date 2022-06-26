<!-- ==== js dependencies start ==== -->

<!-- jquery -->
<script src="{{ asset('front_assets/vendor/jquery/jquery-3.6.0.min.js') }}"></script>
<!-- bootstrap five js -->
<script src="{{ asset('front_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- nice select js -->
<script src="{{ asset('front_assets/vendor/nice-select/js/jquery.nice-select.min.js') }}"></script>
<!-- magnific popup js -->
<script src="{{ asset('front_assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
<!-- slick js -->
<script src="{{ asset('front_assets/vendor/slick/js/slick.js') }}"></script>
<!-- shuffle js -->
<script src="{{ asset('front_assets/vendor/shuffle/shuffle.min.js') }}"></script>
<!-- jquery downcount timer -->
<script src="{{ asset('front_assets/vendor/downcount/jquery.downCount.js') }}"></script>
<!-- waypoints js -->
<script src="{{ asset('front_assets/vendor/waypoints-js/jquery.waypoints.min.js') }}"></script>
<!-- counter up js -->
<script src="{{ asset('front_assets/vendor/counter-js/jquery.counterup.min.js') }}"></script>
<!-- wow js -->
<script src="{{ asset('front_assets/vendor/wow/wow.min.js') }}"></script>

<!-- ==== js dependencies end ==== -->

<!-- plugin js -->
<script src="{{ asset('front_assets/js/plugin.js') }}"></script>
<!-- main js -->
<script src="{{ asset('front_assets/js/main.js') }}"></script>
<script src="{{ URL::asset('user_assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
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
    @if (Session::has('coupon_details'))
        Swal.fire({
            title: "Coupon Details",
            html: '{!! session('coupon_details') !!}',
            icon: "info",
            confirmButtonColor: "#1c84ee"
        })
    @endif
</script>
