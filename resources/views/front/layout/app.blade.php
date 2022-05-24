<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- required meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- #favicon -->
    <link rel="shortcut icon" href="{{ asset('front_assets/images/favicon.png') }}') }}" type="image/x-icon" />
    <!-- #title -->
    <title>Revest &dash; Real Estate Investment For Everyone</title>
    <!-- #keywords -->
    <meta name="keywords" content="Real Estate, Investment, Properties, Rent" />
    <!-- #description -->
    <meta name="description" content="Real Estate Investment For Everyone" />
    <!-- #author -->
    <meta name="author" content="Pixelaxis" />

    @include('front.layout.styles')
    @yield('styles')
</head>

<body>
    @include('front.layout.header')

    @include('front.layout.hero')


    <!-- ==== property filter start ==== -->
    <div class="property__filter">
        <div class="container">
            <div class="property__filter__area">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-12 col-xl-6">
                        <div class="property__search__wrapper">
                            <form action="#" method="post">
                                <div class="input">
                                    <input type="search" name="property__search" id="propertySearch"
                                        placeholder="Search for properties" />
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <button type="submit" class="button button--effect">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="property__select__wrapper">
                            <select class="location__select">
                                <option data-display="Location">Select Location</option>
                                <option value="angeles">Los Angeles</option>
                                <option value="francis">San Francisco, CA</option>
                                <option value="weldon">The Weldon</option>
                                <option value="diego">San Diego</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="property__select__wrapper">
                            <select class="property__select">
                                <option data-display="Property">Property Type</option>
                                <option value="commercial">Commercial</option>
                                <option value="residential">Residential</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==== #property filter end ==== -->

    <!-- ==== cities slider section start ==== -->
    <section class="cities section__space">
        <div class="container">
            <div class="cities__area">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>Explore By <span>Cities</span></h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="custom__slide__btn">
                                <a href="javascript:void(0)" class="button button--effect prev"><i
                                        class="fa-solid fa-arrow-left-long"></i></a>
                                <a href="javascript:void(0)" class="button button--effect next"><i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cities__item__wrapper">
                    <div class="cities__single__item">
                        <div class="img__box">
                            <img src="{{ asset('front_assets/images/icons/san.png') }}" alt="San Diego" />
                        </div>
                        <div>
                            <h5>San Diego</h5>
                            <p>201+ Properties</p>
                            <a href="properties.html" class="button button--secondary button--effect">Explore <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="cities__single__item">
                        <div class="img__box">
                            <img src="{{ asset('front_assets/images/icons/francisco.png') }}" alt="San Francisco" />
                        </div>
                        <div>
                            <h5>San Francisco</h5>
                            <p>201+ Properties</p>
                            <a href="properties.html" class="button button--secondary button--effect">Explore <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="cities__single__item">
                        <div class="img__box">
                            <img src="{{ asset('front_assets/images/icons/weldon.png') }}" alt="The Weldon" />
                        </div>
                        <div>
                            <h5>The Weldon</h5>
                            <p>201+ Properties</p>
                            <a href="properties.html" class="button button--secondary button--effect">Explore <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="cities__single__item">
                        <div class="img__box">
                            <img src="{{ asset('front_assets/images/icons/san.png') }}" alt="San Diego" />
                        </div>
                        <div>
                            <h5>San Diego</h5>
                            <p>201+ Properties</p>
                            <a href="properties.html" class="button button--secondary button--effect">Explore <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="cities__single__item">
                        <div class="img__box">
                            <img src="{{ asset('front_assets/images/icons/francisco.png') }}" alt="San Francisco" />
                        </div>
                        <div>
                            <h5>San Francisco</h5>
                            <p>201+ Properties</p>
                            <a href="properties.html" class="button button--secondary button--effect">Explore <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="cities__single__item">
                        <div class="img__box">
                            <img src="{{ asset('front_assets/images/icons/weldon.png') }}" alt="The Weldon" />
                        </div>
                        <div>
                            <h5>The Weldon</h5>
                            <p>201+ Properties</p>
                            <a href="properties.html" class="button button--secondary button--effect">Explore <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="cities__single__item">
                        <div class="img__box">
                            <img src="{{ asset('front_assets/images/icons/san.png') }}" alt="San Diego" />
                        </div>
                        <div>
                            <h5>San Diego</h5>
                            <p>201+ Properties</p>
                            <a href="properties.html" class="button button--secondary button--effect">Explore <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="cities__single__item">
                        <div class="img__box">
                            <img src="{{ asset('front_assets/images/icons/francisco.png') }}" alt="San Francisco" />
                        </div>
                        <div>
                            <h5>San Francisco</h5>
                            <p>201+ Properties</p>
                            <a href="properties.html" class="button button--secondary button--effect">Explore <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="cities__single__item">
                        <div class="img__box">
                            <img src="{{ asset('front_assets/images/icons/weldon.png') }}" alt="The Weldon" />
                        </div>
                        <div>
                            <h5>The Weldon</h5>
                            <p>201+ Properties</p>
                            <a href="properties.html" class="button button--secondary button--effect">Explore <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #cities slider section end ==== -->

    <!-- ==== all properties in grid section start ==== -->
    <section class="properties__grid section__space">
        <div class="container">
            <div class="properties__grid__area wow fadeInUp">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>Featured <span>Properties</span></h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-start text-lg-end">
                                <a href="properties.html" class="button button--secondary button--effect">Browse All
                                    Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property__grid__wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="property__grid__single column__space--secondary">
                                <div class="img__effect">
                                    <a href="property-details.html">
                                        <img src="{{ asset('front_assets/images/property/grid-one.jpg') }}" alt="Property" />
                                    </a>
                                </div>
                                <div class="property__grid__single__inner">
                                    <h4>Los Angeles</h4>
                                    <p class="sub__info"><i class="fa-solid fa-location-dot"></i> 8706 Herrick Ave, Los
                                        Angeles</p>
                                    <div class="progress__type">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="project__has"><span class="project__has__investors">159
                                                Investors</span> |
                                            <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i> 1,94,196</span> <span
                                                class="project__has__investors__percent">(64.73%)</span>
                                        </p>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__info__single">
                                            <p>Annual Return</p>
                                            <h6>7.5% + 2%</h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Property Type</p>
                                            <h6>Commercial</h6>
                                        </div>
                                    </div>
                                    <div class="invest__cta__wrapper">
                                        <div class="countdown__wrapper">
                                            <p class="secondary"><i class="fa-solid fa-clock"></i> Left to invest</p>
                                            <div class="countdown">
                                                <h5>
                                                    <span class="days">00</span><span class="ref">d</span>
                                                    <span class="seperator">:</span>
                                                </h5>
                                                <h5>
                                                    <span class="hours"> 00</span><span class="ref">h</span>
                                                    <span class="seperator">:</span>
                                                </h5>
                                                <h5>
                                                    <span class="minutes">00</span><span class="ref">m</span>
                                                    <span class="seperator"></span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="invest__cta">
                                            <a href="property-details.html" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="property__grid__single column__space--secondary">
                                <div class="img__effect">
                                    <a href="property-details.html">
                                        <img src="{{ asset('front_assets/images/property/grid-two.jpg') }}" alt="Property" />
                                    </a>
                                </div>
                                <div class="property__grid__single__inner">
                                    <h4>San Francisco, CA</h4>
                                    <p class="sub__info"><i class="fa-solid fa-location-dot"></i> 3335 21 St, San
                                        Francisco</p>
                                    <div class="progress__type">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="project__has"><span class="project__has__investors">159
                                                Investors</span> |
                                            <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i> 1,94,196</span> <span
                                                class="project__has__investors__percent">(64.73%)</span>
                                        </p>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__info__single">
                                            <p>Annual Return</p>
                                            <h6>7.5% + 2%</h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Property Type</p>
                                            <h6>Commercial</h6>
                                        </div>
                                    </div>
                                    <div class="invest__cta__wrapper">
                                        <div class="countdown__wrapper">
                                            <p class="secondary"><i class="fa-solid fa-clock"></i> Left to invest</p>
                                            <div class="countdown">
                                                <h5>
                                                    <span class="days">00</span><span class="ref">d</span>
                                                    <span class="seperator">:</span>
                                                </h5>
                                                <h5>
                                                    <span class="hours"> 00</span><span class="ref">h</span>
                                                    <span class="seperator">:</span>
                                                </h5>
                                                <h5>
                                                    <span class="minutes">00</span><span class="ref">m</span>
                                                    <span class="seperator"></span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="invest__cta">
                                            <a href="property-details.html" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="property__grid__single">
                                <div class="img__effect">
                                    <a href="property-details.html">
                                        <img src="{{ asset('front_assets/images/property/grid-three.jpg') }}" alt="Property" />
                                    </a>
                                </div>
                                <div class="property__grid__single__inner">
                                    <h4>San Diego</h4>
                                    <p class="sub__info"><i class="fa-solid fa-location-dot"></i> 356 La Jolla, San
                                        Diego</p>
                                    <div class="progress__type">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="project__has"><span class="project__has__investors">159
                                                Investors</span> |
                                            <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i> 1,94,196</span> <span
                                                class="project__has__investors__percent">(64.73%)</span>
                                        </p>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__info__single">
                                            <p>Annual Return</p>
                                            <h6>7.5% + 2%</h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Property Type</p>
                                            <h6>Commercial</h6>
                                        </div>
                                    </div>
                                    <div class="invest__cta__wrapper">
                                        <div class="countdown__wrapper">
                                            <p class="secondary"><i class="fa-solid fa-clock"></i> Left to invest</p>
                                            <div class="countdown">
                                                <h5>
                                                    <span class="days">00</span><span class="ref">d</span>
                                                    <span class="seperator">:</span>
                                                </h5>
                                                <h5>
                                                    <span class="hours"> 00</span><span class="ref">h</span>
                                                    <span class="seperator">:</span>
                                                </h5>
                                                <h5>
                                                    <span class="minutes">00</span><span class="ref">m</span>
                                                    <span class="seperator"></span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="invest__cta">
                                            <a href="property-details.html" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #all properties in grid section end ==== -->

    <!-- ==== start step section start ==== -->
    <section class="start start--two section__space__top">
        <div class="container">
            <div class="start__area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">We're changing the way you invest.</h5>
                    <h2>It's Easy to Get Started.</h2>
                    <p class="neutral-bottom">Signing up with Revest is simple and only takes a few minutes. We can
                        automatically connect with more than 3,500 banks, so no complicated paperwork is required to
                        fund your account.</p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item column__space--secondary">
                            <div class="img__box">
                                <img src="{{ asset('front_assets/images/step/browse.png') }}" alt="Browse Properties" />
                                <div class="step__count">
                                    <h4>01</h4>
                                </div>
                            </div>
                            <h4>Browse Properties</h4>
                            <p class="neutral-bottom">Select a property that fits your goal from our huge variety of
                                hand-picked properties.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item column__space--secondary">
                            <div class="img__box arrow__container">
                                <img src="{{ asset('front_assets/images/step/invest.png') }}" alt="View Details & Invest" />
                                <div class="step__count">
                                    <h4>02</h4>
                                </div>
                            </div>
                            <h4>View Details & Invest</h4>
                            <p class="neutral-bottom">View detailed metrics for that property like Rental Yield, etc.
                                and invest like institutions.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item">
                            <div class="img__box">
                                <img src="{{ asset('front_assets/images/step/earn.png') }}" alt="Earn and Track" />
                                <div class="step__count">
                                    <h4>03</h4>
                                </div>
                            </div>
                            <h4>Earn and Track</h4>
                            <p class="neutral-bottom">You have full visibility into the performance of your investment.
                                Track your total current.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #start step section end ==== -->

    <!-- ==== market section start ==== -->
    <section class="market market--two section__space__bottom">
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

    <!-- ==== platform section start ==== -->
    <section class="platform section__space pos__rel over__hi">
        <div class="container">
            <div class="platform__area">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="content">
                            <h5>We're Changing The Way You Invest</h5>
                            <h2>The Convenience
                                You’d Expect from a
                                Modern Investment
                                Platform</h2>
                            <p>Invest and manage your portfolio through our easy-to-use website and mobile app. Track
                                your performance and watch as properties across the country are acquired, improved, and
                                operated via dynamic asset updates.</p>
                            <a href="properties.html" class="button button--effect">Start Exploring</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="platform__thumb thumb__ltr d-none d-lg-block">
                            <img src="{{ asset('front_assets/images/overview/platform-illustration.png') }}" alt="Platform" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #platform section end ==== -->

    <!-- ==== portfolio section start ==== -->
    <div class="portfolio__overview__wrapper">
        <div class="container">
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

    <section class="portfolio section__space bg__img over__hi" data-background="{{ asset('front_assets/images/portfolio-bg.png') }}">
        <div class="container">
            <div class="portfolio__area">
                <div class="portfolio__inner section__space__top">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6">
                            <div class="content column__space">
                                <h5 class="neutral-top">Build a global real estate portfolio.</h5>
                                <h2>Real Estate Investing
                                    For Everybody.</h2>
                                <p>Investing with Revest, is similar to owning a rental property, however with us you
                                    don't have to worry about day-to-day property management and in the periods of
                                    vacancy the borrower is required to distribute fixed-interest payments.</p>
                                <div class="port__cta__group">
                                    <a href="properties.html" class="button button--effect">Start Exploring</a>
                                    <a href="https://www.youtube.com/watch?v=LCihLrSehCo" target="_blank"
                                        class="button button--secondary button--effect video__popup"><i
                                            class="fa-solid fa-play"></i>
                                        How It Works</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="port__thumb thumb__ltr">
                                <img src="{{ asset('front_assets/images/tower.png') }}" alt="Tower" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #portfolio section end ==== -->

    <!-- ==== why invest section start ==== -->
    <section class="why__invest section__space">
        <div class="container">
            <div class="why__invest__area wow fadeInUp">
                <div class="row d-flex align-items-center">
                    <div class="col-xxl-6">
                        <div class="content column__space--secondary">
                            <h5 class="neutral-top">Join the future of real estate investing</h5>
                            <h2>Why Invest in Real Estate?</h2>
                            <p>Start building your real estate investment portfolio today with as little as €100.</p>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="why__invest__single shadow__effect__secondary">
                                    <img src="{{ asset('front_assets/images/icons/passive.png') }}" alt="Passive" />
                                    <h5>Passive Income</h5>
                                    <p class="neutral-bottom">Earn income without active management</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="why__invest__single shadow__effect__secondary">
                                    <img src="{{ asset('front_assets/images/icons/stable.png') }}" alt="Stable Cash Flow" />
                                    <h5>Stable Cash Flow</h5>
                                    <p class="neutral-bottom">Rental payments provide steady cash flow through dividend
                                        payouts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__single shadow__effect__secondary">
                            <img src="{{ asset('front_assets/images/icons/tax.png') }}" alt="Tax Advantages" />
                            <h5>Tax Advantages</h5>
                            <p class="neutral-bottom">There are numerous tax breaks and favorable deductions associated
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__single shadow__effect__secondary">
                            <img src="{{ asset('front_assets/images/icons/capital.png') }}" alt="Capital Appr'n" />
                            <h5>Capital Appr'n</h5>
                            <p class="neutral-bottom">Historically, real estate prices have increased over the rude time
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__single shadow__effect__secondary">
                            <img src="{{ asset('front_assets/images/icons/protection.png') }}" alt="Inflation protection" />
                            <h5>Inflation protection</h5>
                            <p class="neutral-bottom">Home values and rents typically increase during times of inflation
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__single shadow__effect__secondary">
                            <img src="{{ asset('front_assets/images/icons/diversifaction.png') }}" alt="Diversification" />
                            <h5>Diversification</h5>
                            <p class="neutral-bottom">Low correlation to other asset classes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #why invest section end ==== -->

    <!-- ==== community section start ==== -->
    <section class="community section__space__top over__hi bg__img" data-background="{{ asset('front_assets/images/community-bg.png') }}">
        <div class="container">
            <div class="community__area">
                <div class="section__header">
                    <h5 class="neutral-top">Smart way to raise money</h5>
                    <h2>Join Thousands of
                        Investors</h2>
                    <p class="neutral-bottom">Individual and institutional investors invest $10–$100,000
                        per deal on Revest.</p>
                </div>
                <div class="comunity-wrapper section__space">
                    <div class="buttons">
                        <a href="registration.html" class="button button--effect">Become an Investor</a>
                    </div>
                    <div class="comunity-area">
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/1.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/2.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/3.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/4.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/5.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/6.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/7.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/8.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/9.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/10.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/11.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/12.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/13.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/14.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/15.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/16.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/17.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/18.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/19.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/22.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/20.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/21.png') }}" alt="comunity"></div>
                    </div>
                    <div class="comunity-area two">
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/1.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/2.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/3.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/4.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/5.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/6.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/7.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/8.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/9.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/10.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/11.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/12.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/13.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/14.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/15.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/16.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/17.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/18.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/19.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/22.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/20.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/21.png') }}" alt="comunity"></div>
                    </div>
                    <div class="comunity-area three">
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/1.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/2.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/3.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/4.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/5.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/6.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/7.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/8.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/9.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/10.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/11.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/12.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/13.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/14.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/15.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/16.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/17.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/18.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/19.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/22.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/20.png') }}" alt="comunity"></div>
                        <div class="comunity-item"><img src="{{ asset('front_assets/images/community/21.png') }}" alt="comunity"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #community section end ==== -->

    <!-- ==== testimonial section start ==== -->
    <section class="testimonial testimonial--two section__space pos__rel over__hi bg__img"
        data-background="{{ asset('front_assets/images/testimonial/dot-map.png') }}">
        <div class="container">
            <div class="testimonial__area">
                <div class="section__header">
                    <h5 class="neutral-top">Investors Trust Us</h5>
                    <h2>Trusted by Over 40,000 Worldwide
                        Customer since 2022</h2>
                    <p class="neutral-bottom">We divide each property into shares so anyone can get started. Kindly
                        check
                        out our Investors say about revest.</p>
                </div>
                <div class="testimonial__item__wrapper">
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="{{ asset('front_assets/images/testimonial/quote.png') }}">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="{{ asset('front_assets/images/testimonial/avatar.png') }}" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="{{ asset('front_assets/images/testimonial/quote.png') }}">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="{{ asset('front_assets/images/testimonial/avatar.png') }}" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="{{ asset('front_assets/images/testimonial/quote.png') }}">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="{{ asset('front_assets/images/testimonial/avatar.png') }}" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="{{ asset('front_assets/images/testimonial/quote.png') }}">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="{{ asset('front_assets/images/testimonial/avatar.png') }}" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="{{ asset('front_assets/images/testimonial/quote.png') }}">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="{{ asset('front_assets/images/testimonial/avatar.png') }}" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #testimonial section end ==== -->

    <!-- ==== footer section start ==== -->
    <footer class="footer pos__rel over__hi">
        <div class="container">
            <div class="footer__newsletter">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="footer__newsletter__content column__space">
                            <h3>Subscribe for updates</h3>
                            <p>Stay on top of the latest blog posts, news and announcements</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-5 offset-xxl-1">
                        <div class="footer__newsletter__form">
                            <form action="#" method="post">
                                <div class="footer__newsletter__input__group">
                                    <div class="input">
                                        <input type="email" name="news__letter" id="newsLetterMail"
                                            placeholder="Enter Your Email" required="required" />
                                    </div>
                                    <button type="submit" class="button button--effect">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__area section__space">
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="footer__intro">
                            <a href="index.html">
                                <img src="{{ asset('front_assets/images/logo-light.png') }}" alt="Revest" class="logo" />
                            </a>
                            <p>Revest is a platform offering anyone the ability to invest and potentially earn money
                                from property at the click of a button</p>
                            <div class="social">
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt">
                            <h5>Company</h5>
                            <ul>
                                <li>
                                    <a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                    <a href="career.html">Careers</a>
                                </li>
                                <li>
                                    <a href="blog.html">Blog</a>
                                </li>
                                <li>
                                    <a href="contact-us.html">Contact Us</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="affiliate-program.html">Affiliate</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt">
                            <h5>Invest</h5>
                            <ul>
                                <li>
                                    <a href="properties.html">Browse Properties</a>
                                </li>
                                <li>
                                    <a href="how-it-works.html">How it works</a>
                                </li>
                                <li>
                                    <a href="loan-application.html">Loan Application </a>
                                </li>
                                <li>
                                    <a href="property-alert.html">Property Alerts</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="support.html">FAQs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt--two">
                            <h5>Insights</h5>
                            <ul>
                                <li>
                                    <a href="support.html">Help Center</a>
                                </li>
                                <li>
                                    <a href="list-your-property.html">List Your Property</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="loyality-program.html">Loyality program </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links">
                            <h5>Legal</h5>
                            <ul>
                                <li>
                                    <a href="privacy-policy.html">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="terms-conditions.html">Term & Conditions</a>
                                </li>
                                <li>
                                    <a href="cookie-policy.html">Cookie Policy</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="key-risks.html">Key Risks</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__credit">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-9 order-1 order-sm-0">
                        <div class="footer__copyright">
                            <p>Copyright &copy; Revest | Designed by <a
                                    href="https://themeforest.net/user/pixelaxis">Pixelaxis</a></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="footer__language">
                            <select class="language-select">
                                <option value="english">En</option>
                                <option value="australia">Aus</option>
                                <option value="brazil">Bra</option>
                                <option value="argentina">Arg</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__animation">
            <img src="{{ asset('front_assets/images/footer/footer__left__circle.png') }}" alt="Circle" class="left__circle" />
            <img src="{{ asset('front_assets/images/footer/footer__right__circle.png') }}" alt="Circle" class="right__circle" />
            <img src="{{ asset('front_assets/images/footer/footer__home___illustration.png') }}" alt="Home" class="home__illustration" />
        </div>
    </footer>
    <!-- ==== #footer section end ==== -->

    <!-- Scroll To Top -->
    <a href="javascript:void(0)" class="scrollToTop">
        <i class="fa-solid fa-angles-up"></i>
    </a>

    <!-- ==== js dependencies start ==== -->

    <!-- jquery -->
    <script src="{{ asset('front_assets/vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- bootstrap five js -->
    <script src="{{ asset('front_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- nice select js -->
    <script src="{{ asset('front_assets/vendor/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <!-- magnific popup js -->
    <script src="{{ asset('front_assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('front_assets/vendor/slick/js/slick.js') }}"></script>
    <!-- shuffle js -->
    <script src="{{ asset('front_assets/vendor/shuffle/shuffle.min.js') }}"></script>
    <!-- jquery downcount timer -->
    <script src="{{ asset('front_assets/vendor/downcount/jquery.downCount.js') }}"></script>
    <!-- waypoints js -->
    <script src="{{ asset('front_assets/vendor/waypoints-js/jquery.waypoints.min.js') }}"></script>
    <!-- counter up js -->
    <script src="{{ asset('front_assets/vendor/counter-js/jquery.counterup.min.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('front_assets/vendor/wow/wow.min.js') }}"></script>

    <!-- ==== js dependencies end ==== -->

    <!-- plugin js -->
    <script src="{{ asset('front_assets/js/plugin.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('front_assets/js/main.js') }}"></script>

</body>

</html>