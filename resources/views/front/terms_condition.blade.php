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
                            <a href="index.html">Home</a>
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
        <img src="{{ asset('assets/images/banner/key-illustration.png') }}" alt="Career" class="banner__thumb" />
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== terms & conditions section start ==== -->
    <section class="terms section__space">
        <div class="container">
            <div class="terms-area">
                <div class="terms__single">
                    <h3 class="neutral-top">We're always looking for new ways to provide privacy for our customers.</h3>
                    <p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim,
                        diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus
                        proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate
                        auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>
                    <ul>
                        <li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>
                        <li>Augue interdum semper bibendum amet sed.</li>
                        <li>Dis in at ultricies tortor sit tellus.</li>
                        <li>Habitant ornare aenean maecenas pretium</li>
                    </ul>
                </div>
                <hr />
                <div class="terms__single">
                    <h3 class="neutral-top">Your data is safe with us, we will not share any information with external
                        sources.</h3>
                    <p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim,
                        diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus
                        proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate
                        auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>
                    <ul>
                        <li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>
                        <li>Augue interdum semper bibendum amet sed.</li>
                        <li>Dis in at ultricies tortor sit tellus.</li>
                        <li>Habitant ornare aenean maecenas pretium</li>
                    </ul>
                </div>
                <hr />
                <div class="terms__single">
                    <h3 class="neutral-top">We're always looking for new ways to provide privacy for our customers.</h3>
                    <p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim,
                        diam quam id et, tempus massa. Sed nam vulputate pellentesque quis. Varius a, nunc faucibus
                        proin elementum id odio auctor. Nunc, suspendisse consequat libero, pharetra tellus vulputate
                        auctor venenatis tortor non rhoncus at duis. Pharetra ipsum mauris integer sit feugiat.</p>
                    <p>Id ipsum mi tempor eget. Pretium consectetur scelerisque blandit habitasse non ullamcorper enim,
                        diam quam id et, tempus massa.</p>>
                    <ul>
                        <li>Blandit dignissim nulla varius tristique a sed integer ut tempor.</li>
                        <li>Augue interdum semper bibendum amet sed.</li>
                        <li>Dis in at ultricies tortor sit tellus.</li>
                        <li>Habitant ornare aenean maecenas pretium</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #terms & conditions section end ==== -->
@endsection
