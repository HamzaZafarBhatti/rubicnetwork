<!-- ==== header start ==== -->
<header class="header">
    <nav class="navbar navbar-expand-xl">
        <div class="container">
            <a class="navbar-brand" href="{{ route('front.index') }}">
                <img src="{{ asset('front_assets/images/logo.png') }}" alt="Logo" class="logo" />
            </a>
            <div class="navbar__out order-2 order-xl-3">
                <div class="nav__group__btn">
                    @auth
                        <a href="{{ route('user.dashboard') }}" class="button button--effect d-none d-sm-block"> Dashboard
                            <i class="fa-solid fa-arrow-right-long"></i> </a>
                    @endauth
                    @guest
                        <a href="{{ route('user.login') }}" class="log d-none d-sm-block"> Log In </a>
                        <a href="{{ route('user.register') }}" class="button button--effect d-none d-sm-block"> Join Now
                            <i class="fa-solid fa-arrow-right-long"></i> </a>F
                    @endguest
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNav"
                    aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle Primary Nav">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse order-3 order-xl-2" id="primaryNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.index') }}">HOME</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.about_us') }}">ABOUT US</a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarHomeDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            HOW IT WORKS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarHomeDropdown">
                            <li><a class="dropdown-item" href="{{ route('front.rubic_network') }}">RUBIC NETWORK</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('front.rubic_staking') }}">RUBIC STAKING</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarPolicy" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            POLICY
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarPolicy">
                            <li><a class="dropdown-item" href="{{ route('front.terms_condition') }}">TERMS &
                                    CONDITION</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('front.privacy_policy') }}">PRIVACY
                                    POLICY</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('front.cookies_policy') }}">COOKIES
                                    POLICY</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarActivation"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ACTIVATION PIN CODE
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarActivation">
                            <li><a class="dropdown-item" href="{{ route('front.pin_verification') }}">ACTIVATION PIN
                                    CODE VERIFICATION</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('front.pin_dispatchers') }}">ACTIVATION PIN
                                    CODE DISPATCHERS</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarPages" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            PAGES
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarPages">
                            <li><a class="dropdown-item" href="{{ route('front.about_us') }}">ABOUT US</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('front.contact_us') }}">CONTACT US</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('front.top_earners') }}">TOP EARNERS</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('front.payment_proof') }}">PAYMENT PROOF</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('front.faq') }}">FAQ</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('front.disclaimer') }}">DISLCLAIMER</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.sponsored_post') }}">SPONSORED POST</a>
                    </li>
                    @auth
                    <li class="nav-item d-block d-sm-none">
                        <a href="{{ route('user.dashboard') }}"
                            class="button button--effect button--last">Dashboard <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </li>    
                    @endauth
                    @guest
                        <li class="nav-item d-block d-sm-none">
                            <a href="{{ route('user.login') }}" class="nav-link">Log In</a>
                        </li>
                        <li class="nav-item d-block d-sm-none">
                            <a href="{{ route('user.register') }}" class="button button--effect button--last">Join
                                Now <i class="fa-solid fa-arrow-right-long"></i></a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- ==== #header end ==== -->
