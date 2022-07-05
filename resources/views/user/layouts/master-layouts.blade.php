<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Rubic Network - Extract & Staking Platform - RubicNetwork.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Rubic Network - Extract & Staking Platform - RubicNetwork.com" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://rubicnetwork.com/front_assets/images/manual_uploads/favicon/favicon-32x32.png">
    @include('user.layouts.head-css')
</head>

@section('body')
    @include('user.layouts.body')
@show

    <!-- Begin page -->
    <div id="layout-wrapper">
 <body data-layout="horizontal">

        @include('user.layouts.horizontal')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- content -->
            </div>
            @include('user.layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('user.layouts.right-sidebar')
    <!-- END Right Sidebar -->

    @include('user.layouts.vendor-scripts')
</body>

</html>
