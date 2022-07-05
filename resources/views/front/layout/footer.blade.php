<!-- ==== footer section start ==== -->
<footer class="footer pos__rel over__hi">
    <div class="container">
        <div class="footer__newsletter">
            {{-- <div class="row d-flex align-items-center">
                <div class="col-lg-6">

                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="footer__intro">
                    <a href="{{ route('front.index') }}">
                        <img src="{{ asset('front_assets/images/manual_uploads/Logo.png') }}" width="213"
                            height="50" />
                    </a>
                    <p>Multi-Chain Swap Protocol Network provider that enables users to manually and automatically
                        Extract the RUBIC Token in blocks; as well as is designed to allow user STAKE the RUBIC/USDT
                        Trading Pair.</p>
                    <div class="social">
                        <a href="https://web.facebook.com/officialrubicnetwork">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://web.facebook.com/groups/rubicnetwork">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/rubic_network">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/rubicnetwork/">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://t.me/rubicnetwork">
                            <i class="fa-brands fa-telegram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                <div class="footer__links footer__links--alt">
                    <h5>Company</h5>
                    <ul>
                        <li>
                            <a href="{{ route('front.about_us') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('front.rubic_network') }}">Rubic Extraction</a>
                        </li>
                        <li>
                            <a href="{{ route('front.rubic_staking') }}">Rubic Staking</a>
                        </li>
                        <li>
                            <a href="{{ route('front.contact_us') }}">Contact Us</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                <div class="footer__links footer__links--alt">
                    <h5>Get Started</h5>
                    <ul>
                        <li>
                            <a href="{{ route('user.dashboard') }}">My Account</a>
                        </li>
                        <li>
                            <a href="{{ route('front.pin_dispatchers') }}">PIN CODE DISPATCHERS</a>
                        </li>
                        <li>
                            <a href="{{ route('front.pin_verification') }}">PIN CODE Verirication </a>
                        </li>
                        <li>
                            <a href="{{ route('front.faq') }}">FAQ</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                <div class="footer__links footer__links--alt--two">
                    <h5>Insights</h5>
                    <ul>
                        <li>
                            <a href="{{ route('front.sponsored_post') }}">Viral Share</a>
                        </li>
                        <li>
                            <a href="{{ route('front.top_earners') }}">Top Earners</a>
                        </li>
                        <li>
                            <a href="{{ route('front.contact_us') }}">Support</a>
                        </li>
                        <li class="neutral-bottom">
                            <a href="{{ route('front.payment_proof') }}">Payment Proof </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                <div class="footer__links">
                    <h5>Legal</h5>
                    <ul>
                        <li>
                            <a href="{{ route('front.privacy_policy') }}">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('front.terms_condition') }}">Term & Conditions</a>
                        </li>
                        <li>
                            <a href="{{ route('front.cookies_policy') }}">Cookie Policy</a>
                        </li>
                        <li class="neutral-bottom">
                            <a href="{{ route('front.disclaimer') }}">Earnings Disclaimer</a>
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
                    <p>Copyright &copy; RubicNetwork.com - {{ $set->site_name }} | Extraction & Staking Platform</p>
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
        <img src="{{ asset('front_assets/images/footer/footer__left__circle.png') }}" alt="Circle"
            class="left__circle" />
        <img src="{{ asset('front_assets/images/footer/footer__right__circle.png') }}" alt="Circle"
            class="right__circle" />
        <img src="{{ asset('front_assets/images/footer/footer__home___illustration.png') }}" alt="Home"
            class="home__illustration" />
    </div>
</footer>
<!-- ==== #footer section end ==== -->
