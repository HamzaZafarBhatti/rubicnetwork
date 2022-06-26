@extends('front.layout.app')


@section('content')
    <!-- ==== banner section start ==== -->
    <section class="banner clear__top bg__img" data-background="{{ asset('front_assets/images/banner/banner-bg.png') }}">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top">ACTIVATION PIN CODE VERIFICATION</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            ACTIVATION PIN CODE VERIFICATION
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== ask section start ==== -->
    <section class="ask section__space bg__img mb-5">
        <div class="container">
            <div class="ask__area">
                <div class="alert__newsletter__area">
                    <div class="section__header mw-100">
                        <h6 class="neutral-top">Enter your RUBIC NETWORK Activation Code or RUBIC STAKE Action Code by
                            verifying the Validity Status and Upline Referral</h6>
                    </div>
                    <form action="{{ route('front.confirm_code') }}" name="ask__from" method="post">
                        @csrf
                        <div class="investment__wrapper mb-4">
                            <div class="investment__wrapper__inner">
                                <div class="radio__group mb-3">
                                    <div>
                                        <input type=radio id="pone" class="radio-input" name="type" value="network">
                                        <label for="pone" class="radio-label"> <span class="radio-border"></span> Rubic
                                            Network </label>
                                    </div>
                                    <div>
                                        <input type=radio id="ptwo" class="radio-input" name="type" value="staking">
                                        <label for="ptwo" class="radio-label"> <span class="radio-border"></span> Rubic
                                            Staking
                                        </label>
                                    </div>
                                </div>
                                <h5>Activation Code*</h5>
                                <div class="input input--secondary">
                                    <input type="text" name="code" id="askRegistrationMail"
                                        placeholder="Enter your Code" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="input__button">
                            <button type="submit" class="button button--effect">Validate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #ask section end ==== -->
@endsection
