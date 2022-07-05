<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- required meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- #favicon -->
    <link rel="shortcut icon" href="{{ asset('front_assets/images/manual_uploads/favicon/favicon-32x32.png') }}"
        type="image/x-icon" />
    <!-- #title -->
    <title>{{ $set->site_name }} &dash; {{ $set->site_desc }} - RubicNetwork.com</title>
    <!-- #keywords -->
    <meta name="keywords"
        content="Make Money Online with Rubic Network, RUBIC NETWORK, NIGERIA, Making Money, Cryptocurrency" />
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
