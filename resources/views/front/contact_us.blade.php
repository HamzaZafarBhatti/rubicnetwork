@extends('front.layout.app')


@section('content')
    <!-- ==== banner section start ==== -->
    <section class="support__banner contact__banner bg__img clear__top"
        data-background="{{asset('front_assets/images/contact-banner-bg.png')}}">
        <div class="container">
            <div class="support__banner__area">
                <div class="support__banner__inner">
                    <h1 class="neutral-top">How can we help?</h1>
                    <h5 class="neutral-top">Got a question?</h5>
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
                            <img src="{{asset('front_assets/images/icons/email.png')}}" alt="email" />
                            <h5>Send Us an Email</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                            <hr />
                            <p class="neutral-bottom">
                                <a href="mailto:example@example.com">{{$set->email}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="contact__overview__single column__space--secondary shadow__effect">
                            <img src="{{asset('front_assets/images/icons/phone.png')}}" alt="Call" />
                            <h5>Give Us a Call</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                            <hr />
                            <p class="neutral-bottom">
                                <a href="tel:+17087362094">{{$set->mobile}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="contact__overview__single shadow__effect">
                            <img src="{{asset('front_assets/images/icons/chat.png')}}" alt="Chat" />
                            <h5>Chat with us</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing.</p>
                            <hr />
                            <p class="neutral-bottom">
                                <a href="#0">Open live chat</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #contact overview section end ==== -->

    <!-- ==== ask section start ==== -->
    <section class="ask section__space bg__img mb-5" data-background="{{asset('front_assets/images/ask-bg.png')}}">
        <div class="container">
            <div class="ask__area">
                <div class="alert__newsletter__area">
                    <div class="section__header">
                        <h2 class="neutral-top">Ask a Question</h2>
                    </div>
                    <form action="#" name="ask__from" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="askFirstName">First Name*</label>
                                    <input type="text" name="ask__first__name" id="askFirstName"
                                        placeholder="Enter Your First Name" required="required" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="askLastName">Last Name*</label>
                                    <input type="text" name="ask__last__name" id="askLastName"
                                        placeholder="Enter Your Last Name" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="input input--secondary">
                            <label for="askRegistrationMail">Email*</label>
                            <input type="email" name="ask__registration__email" id="askRegistrationMail"
                                placeholder="Enter your email" required="required" />
                        </div>
                        <div class="input input--secondary input__alt">
                            <label for="askNumber">Phone*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <select class="number__code__select" id="numberCodeSelectAlert">
                                        <option selected value="0">+1</option>
                                        <option value="1">+2</option>
                                        <option value="2">+3</option>
                                        <option value="3">+4</option>
                                        <option value="4">+5</option>
                                        <option value="5">+6</option>
                                    </select>
                                </div>
                                <input type="number" name="ask__number" id="askNumber" required="required"
                                    placeholder="345-323-1234" />
                            </div>
                        </div>
                        <div class="input input--secondary">
                            <label for="askSubject">Subject*</label>
                            <input type="text" name="ask__subject" id="askSubject" placeholder="Write Subject"
                                required="required" />
                        </div>
                        <div class="input input--secondary">
                            <label for="askMessage">Message*</label>
                            <textarea name="ask_message" id="askMessage" required="required" placeholder="Write Message"></textarea>
                        </div>
                        <div class="input__button">
                            <button type="submit" class="button button--effect">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #ask section end ==== -->
@endsection
