<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Dason - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/asset/{{ $logo->image_link2 }}">
    @include('user.layouts.head-css')
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
<script>
    $(document).ready(function() {
        console.log('master')
        setTimeout(() => {
        console.log('master timeout')
            $('body').attr('data-sidebar-size', 'lg')
        }, 1000);
        $('body').attr('data-sidebar-size', 'lg')
    })
</script>
</body>

</html>
