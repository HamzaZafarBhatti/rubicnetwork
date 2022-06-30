<!-- JAVASCRIPT -->
<script src="{{ URL::asset('/user_assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('/user_assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('/user_assets/libs/metismenu/metismenu.min.js') }}"></script>
<script src="{{ URL::asset('/user_assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('/user_assets/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ URL::asset('/user_assets/libs/feather-icons/feather-icons.min.js') }}"></script>
<!-- pace js -->
<script src="{{ URL::asset('user_assets/libs/pace-js/pace-js.min.js') }}"></script>
@yield('script')
@yield('script-bottom')

<script>
    var mode = localStorage.getItem("mode");
    $('body').attr('data-layout-mode', mode)
    $('body').attr('data-topbar', mode)

    $('.layout-mode-dark').click(function() {
        // $('body').attr('data-layout-mode', 'dark')
        // $('body').attr('data-topbar', 'dark')
        localStorage.setItem("mode", "dark");
    })
    $('.layout-mode-light').click(function() {
        // $('body').attr('data-layout-mode', 'light')
        // $('body').attr('data-topbar', 'light')
        localStorage.setItem("mode", "light");
    })
</script>
