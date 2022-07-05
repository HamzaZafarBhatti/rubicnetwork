@extends('front.layout.app')

@section('content')
    <!-- ==== banner section start ==== -->
    <section class="banner key-banner banner--secondary clear__top bg__img"
        data-background="{{ asset('front_assets/images/banner/banner-bg.png') }}">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top">Privacy Policy</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('front.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Privacy Policy
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
       <img src="{{ asset('front_assets/images/banner/key-illustration.png') }}" alt="Career" class="banner__thumb" />
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== privacy policy section start ==== -->
    <section class="terms section__space">
        <div class="container">
            <div class="terms-area">
                {!! $privacy !!}
            </div>
        </div>
    </section>
    <!-- ==== #privacy policy section end ==== -->
@endsection
