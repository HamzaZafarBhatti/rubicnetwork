@extends('front.layout.app')

@section('content')
    <!-- ==== banner section start ==== -->
    <section class="banner clear__top bg__img" data-background="{{ asset('front_assets/images/banner/banner-bg.png') }}">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            About Us
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== about overview section start ==== -->
    <section class="about__overview">
        <div class="video video--secondary">
            <div class="container">
                <div class="video__area">
                    <img src="{{ asset('front_assets/images/about-video-illustration.png') }}" alt="Video Illustration" />
                    <div class="video__btn">
                        <a class="video__popup" href="https://www.youtube.com/watch?v=LCihLrSehCo" target="_blank"
                            title="YouTube video player">
                            <i class="fa-solid fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="about__overview__area">
                <div class="section__header">
                    <h5 class="neutral-top">Investing in real estate is now easier than buying stocks</h5>
                    <h2>Make property Investing in simple,
                        accessible and transparent</h2>
                    <p class="neutral-bottom">Our mission is to empower the world to build wealth through modern real
                        estate investing.</p>
                </div>
                <div class="portfolio__overview">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="portfolio__overview__single column__space">
                                <img src="{{ asset('front_assets/images/icons/investors.png') }}" alt="Investors" />
                                <div>
                                    <h2 class="counterTwo">6738</h2>
                                    <p>Investors</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="portfolio__overview__single column__space">
                                <img src="{{ asset('front_assets/images/icons/completed.png') }}" alt="completed" />
                                <div>
                                    <h2 class="counterTwo">61316</h2>
                                    <p>Investments Completed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="portfolio__overview__single">
                                <img src="{{ asset('front_assets/images/icons/annual-return.png') }}" alt="Average Annual Return" />
                                <div>
                                    <h2><span class="counterTwo">10.36</span>%</h2>
                                    <p>Average Annual Return</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #about overview section end ==== -->

    <!-- ==== image gallery section start ==== -->
    <div class="image__gallery section__space">
        <div class="image__gallery__area">
            <div class="gallery__single">
                <a href="{{ asset('front_assets/images/one.png') }}">
                    <img src="{{ asset('front_assets/images/one.png') }}" alt="Proect Image" />
                </a>
            </div>
            <div class="gallery__single">
                <a href="{{ asset('front_assets/images/two.png') }}">
                    <img src="{{ asset('front_assets/images/two.png') }}" alt="Proect Image" />
                </a>
            </div>
            <div class="gallery__single">
                <a href="{{ asset('front_assets/images/three.png') }}">
                    <img src="{{ asset('front_assets/images/three.png') }}" alt="Proect Image" />
                </a>
            </div>
            <div class="gallery__single">
                <a href="{{ asset('front_assets/images/one.png') }}">
                    <img src="{{ asset('front_assets/images/one.png') }}" alt="Proect Image" />
                </a>
            </div>
            <div class="gallery__single">
                <a href="{{ asset('front_assets/images/two.png') }}">
                    <img src="{{ asset('front_assets/images/two.png') }}" alt="Proect Image" />
                </a>
            </div>
            <div class="gallery__single">
                <a href="{{ asset('front_assets/images/three.png') }}">
                    <img src="{{ asset('front_assets/images/three.png') }}" alt="Proect Image" />
                </a>
            </div>
        </div>
    </div>
    <!-- ==== #image gallery section end ==== -->

    <!-- ==== team section start ==== -->
    <section class="team section__space__bottom">
        <div class="container">
            <div class="team__area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">Meet Our Incredible Team</h5>
                    <h2>Built by a Diverse Team With Deep
                        Expertise in Investing</h2>
                    <p class="neutral-bottom">We're on a mission to build a better financial system by empowering the
                        individual.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="team__single shadow__effect">
                            <div class="team__thumb">
                                <img src="{{ asset('front_assets/images/team/paul.png') }}" alt="Paul" />
                                <a href="#0">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <h5 class="neutral-top">Paul Smith</h5>
                            <p class="neutral-bottom">Founder & CEO</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="team__single shadow__effect">
                            <div class="team__thumb">
                                <img src="{{ asset('front_assets/images/team/ryan.png') }}" alt="Ryan Jackson" />
                                <a href="#0">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <h5 class="neutral-top">Ryan Jackson</h5>
                            <p class="neutral-bottom">Head of Business Operations</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="team__single shadow__effect">
                            <div class="team__thumb">
                                <img src="{{ asset('front_assets/images/team/rosen.png') }}" alt="Brittany Rosen" />
                                <a href="#0">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <h5 class="neutral-top">Brittany Rosen</h5>
                            <p class="neutral-bottom">VP, Finance and Strategy</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="team__single shadow__effect">
                            <div class="team__thumb">
                                <img src="{{ asset('front_assets/images/team/robert.png') }}" alt="Robert Henriks" />
                                <a href="#0">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <h5 class="neutral-top">Robert Henriks</h5>
                            <p class="neutral-bottom">Senior Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #team section end ==== -->

    <!-- ==== market section start ==== -->
    <section class="market market--two market--three section__space__bottom">
        <div class="container">
            <div class="market__area market__area--two section__space bg__img"
                data-background="{{ asset('front_assets/images/light-two.png') }}">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="content">
                            <h5 class="neutral-top">Real exposure to the real estate market</h5>
                            <h2>You Invest. Revest
                                Does the Rest</h2>
                            <p>Transparent Real Estate Investing Through Revest.Join us and
                                experience a smarter,better way to invest in real estate</p>
                            <a href="properties.html" class="button button--effect">Start Exploring</a>
                            <img src="{{ asset('front_assets/images/arrow.png') }}" alt="Go to" />
                        </div>
                    </div>
                </div>
                <img src="{{ asset('front_assets/images/market-two-illustration.png') }}" alt="Explore the Market"
                    class="d-none d-lg-block market__two__thumb" />
            </div>
            <div class="market__features">
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="market__features__single shadow__effect__secondary">
                            <img src="{{ asset('front_assets/images/icons/gain.png') }}" alt="Gain Instant" />
                            <h4>Gain Instant</h4>
                            <p class="neutral-bottom">Revest performs deep due diligence on sponsors, giving investors
                                peace of mind.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="market__features__single market__features__single--alt shadow__effect">
                            <img src="{{ asset('front_assets/images/icons/noticed.png') }}" alt="Get noticed" />
                            <h4>Get Noticed</h4>
                            <p class="neutral-bottom">REVEST VERIFIED sponsor profiles are available to accredited real
                                estate investment
                                investors.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="market__features__single alt shadow__effect__secondary">
                            <img src="{{ asset('front_assets/images/icons/focus.png') }}" alt="Focus on Deals" />
                            <h4>Focus on Deals</h4>
                            <p class="neutral-bottom">Spend less time smiling, reaserching and dialing and more time
                                doing what you love.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ==== #market section end ==== -->

    <!-- ==== open job section start ==== -->
    <section class="open__job section__space">
        <div class="container">
            <div class="open__job__area">
                <h2 class="neutral-top">Join Us</h2>
                <div class="job__single">
                    <div class="open__job__inner">
                        <img src="{{ asset('front_assets/images/icons/sales.png') }}" alt="Sales" />
                        <div class="open__job__info">
                            <h5><a href="career-details.html">Director of Sales</a></h5>
                            <ul>
                                <li>Sales</li>
                                <li>Remote</li>
                                <li>Full Time</li>
                            </ul>
                        </div>
                    </div>
                    <a href="career-details.html" class="arrw">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                </div>
                <div class="job__single">
                    <div class="open__job__inner">
                        <img src="{{ asset('front_assets/images/icons/marketing.png') }}" alt="Product Marketing Lead" />
                        <div class="open__job__info">
                            <h5><a href="career-details.html">Product Marketing Lead</a></h5>
                            <ul>
                                <li>Marketing</li>
                                <li>Remote</li>
                                <li>Full Time</li>
                            </ul>
                        </div>
                    </div>
                    <a href="career-details.html" class="arrw">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                </div>
                <div class="job__single">
                    <div class="open__job__inner">
                        <img src="{{ asset('front_assets/images/icons/business.png') }}" alt="Business Development Representative" />
                        <div class="open__job__info">
                            <h5><a href="career-details.html">Business Development Representative</a></h5>
                            <ul>
                                <li>Business</li>
                                <li>Remote</li>
                                <li>Full Time</li>
                            </ul>
                        </div>
                    </div>
                    <a href="career-details.html" class="arrw">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                </div>
                <div class="job__single">
                    <div class="open__job__inner">
                        <img src="{{ asset('front_assets/images/icons/development.png') }}" alt="Business Development Representative" />
                        <div class="open__job__info">
                            <h5><a href="career-details.html">Business Development Representative</a></h5>
                            <ul>
                                <li>Business</li>
                                <li>Remote</li>
                                <li>Full Time</li>
                            </ul>
                        </div>
                    </div>
                    <a href="career-details.html" class="arrw">
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                </div>
            </div>
            <div class="cta__btn">
                <a href="career.html" class="button button--effect">See all open roles <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </section>
    <!-- ==== #open job section end ==== -->
@endsection
