<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- required meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- #favicon -->
    <link rel="shortcut icon" href="{{ asset('front_assets/images/favicon.png') }}" type="image/x-icon" />
    <!-- #title -->
    <title>{{ $set->site_name }} &dash; {{ $set->site_desc }}</title>
    <!-- #keywords -->
    <meta name="keywords" content="Real Estate, Investment, Properties, Rent" />
    <!-- #description -->
    <meta name="description" content="{{ $set->site_desc }}" />

    @include('front.layout.styles')
    @yield('styles')
</head>

<body>
    @include('front.layout.header')


    @yield('content')


    @include('front.layout.footer')
    @include('front.layout.scroll-to-top')
    @include('front.layout.scripts')
    @yield('scripts')

</body>

</html>