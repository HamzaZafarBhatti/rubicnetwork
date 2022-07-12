@extends('front.layout.app')

@section('styles')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('content')
    <!-- ==== banner section start ==== -->
    <section class="support__banner contact__banner bg__img clear__top"
        data-background="{{ asset('front_assets/images/contact-banner-bg.png') }}">
        <div class="container">
            <div class="support__banner__area">
                <div class="support__banner__inner">
                    <h1 class="neutral-top">How can we help?</h1>
                    <h5 class="neutral-top">Office Address: NBCC Plaza, Olubunmi Owa Street, Lekki Phase 1, Lekki, Lagos.
                    </h5>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== contact overview section start ==== -->
    <section class="contact__overview">
        <div class="container">
            <div class="contact__overview__area">
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="contact__overview__single column__space--secondary shadow__effect">
                            <img src="{{ asset('front_assets/images/icons/email.png') }}" alt="email" />
                            <h5>Send Us an Email</h5>
                            <p>We would be glad to respond to you in less than few hours on your mail.</p>
                            <hr />
                            <p class="neutral-bottom">
                                <a href="mailto:{{ $set->email }}">{{ $set->email }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="contact__overview__single column__space--secondary shadow__effect">
                            <img src="{{ asset('front_assets/images/icons/phone.png') }}" alt="Call" />
                            <h5>Give Us a Call</h5>
                            <p>Our Dedicated Consultant would be glad to respond to your calls at anytime from 9am to 5pm
                                Mon - Fri.</p>
                            <hr />
                            <p class="neutral-bottom">
                                <a href="tel:{{ $set->mobile }}">{{ $set->mobile }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="contact__overview__single shadow__effect">
                            <img src="{{ asset('front_assets/images/icons/chat.png') }}" alt="Chat" />
                            <h5>Chat on WhatsApp</h5>
                            <p>Chat with us on WhatsApp with regards to supports and our Rubic Project.</p>
                            <hr />
                            <p class="neutral-bottom">
                                <a href="#0">WhatsApp Chat: +33755522059 or +2347087394692 </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #contact overview section end ==== -->

    <!-- ==== ask section start ==== -->
    <section class="ask section__space bg__img mb-5" data-background="{{ asset('front_assets/images/ask-bg.png') }}">
        <div class="container">
            <div class="ask__area">
                <div class="alert__newsletter__area">
                    <div class="section__header">
                        <h2 class="neutral-top">Send Us A Message</h2>
                    </div>
                    <form action="{{ route('front.send_email') }}" name="ask__from" method="post" id="demo-form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="askFirstName">First Name*</label>
                                    <input type="text" name="from_first_name" id="askFirstName"
                                        placeholder="Enter Your First Name" required="required" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="askLastName">Last Name*</label>
                                    <input type="text" name="from_last_name" id="askLastName"
                                        placeholder="Enter Your Last Name" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="input input--secondary">
                            <label for="askRegistrationMail">Email*</label>
                            <input type="email" name="from_email" id="askRegistrationMail" placeholder="Enter your email"
                                required="required" />
                        </div>
                        <div class="input input--secondary">
                            <label for="askSubject">Subject*</label>
                            <input type="text" name="subject" id="askSubject" placeholder="Write Subject"
                                required="required" />
                        </div>
                        <div class="input input--secondary">
                            <label for="askMessage">Message*</label>
                            <textarea name="msg" id="askMessage" required="required" placeholder="Write Message"></textarea>
                        </div>
                        <div class="input input--secondary text-center">
                            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                        </div>
                        <div class="input__button">
                            <button class="button button--effect" type="submit">SEND MESSAGE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #ask section end ==== -->
@endsection

@section('scripts')
@endsection
