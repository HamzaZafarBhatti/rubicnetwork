<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | {{ $setting->site_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ $setting->site_desc }}" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    @include('admin.layouts.head-css')
</head>

@section('body')
    @include('admin.layouts.body')
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('admin.layouts.topbar')
        @include('admin.layouts.sidebar')
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
            @include('admin.layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    @include('admin.layouts.vendor-scripts')
</body>

</html>
