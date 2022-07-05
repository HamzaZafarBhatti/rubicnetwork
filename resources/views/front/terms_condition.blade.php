@extends('front.layout.app')

@section('content')
    <!-- ==== banner section start ==== -->
    <section class="banner key-banner banner--secondary terms__banner clear__top bg__img"
        data-background="{{ asset('front_assets/images/banner/banner-bg.png') }}">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top mb-0">Terms & Conditions</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('front.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Terms & Conditions
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== terms & conditions section start ==== -->
    <section class="terms section__space">
        <div class="container">
            <div class="terms-area">
                {!! $term !!}
            </div>
        </div>
    </section>
    <!-- ==== #terms & conditions section end ==== -->
@endsection
