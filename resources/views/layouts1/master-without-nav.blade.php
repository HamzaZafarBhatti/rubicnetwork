<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | {{ $set->site_name }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="{{ $set->site_desc }}" name="description" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://rubicnetwork.com/front_assets/images/manual_uploads/favicon/favicon-32x32.png">
        @include('layouts.head-css')
  </head>

    @yield('body')

    @yield('content')

    @include('layouts.vendor-scripts')
    </body>
</html>
