@extends('user.layouts.master-without-nav')
@section('title')
    @lang('translation.Register')
@endsection
@section('content')
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="{{ url('/') }}" class="d-block auth-logo">
                                        <img src="{{ url('/') }}/asset/{{ $logo->image_link }}" alt=""
                                            height="70">
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h3 class="mb-0">RubicNetwork Account Registration</h3><br>
                                        <h4><strong>Register your RubicNetwork</strong></h4>
                                        <p><em>Powerful Extraction! Easy STAKING1</em></p>
                                    </div>
                                    <form class="needs-validation mt-4 pt-2" novalidate method="POST"
                                        action="{{ route('user.do_register') }}">
                                        @csrf
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" id="input-name"
                                                placeholder="Enter Full Name" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-name">Full Names</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                        </div>
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                value="{{ old('username') }}" id="input-username"
                                                placeholder="Enter Username" required>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-username">Username</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                        </div>
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}" id="input-phone"
                                                placeholder="Enter Phone" required>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-phone">Phone</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="phone"></i>
                                            </div>
                                        </div>
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" id="input-email"
                                                placeholder="Enter Email" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-email">Email</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="mail"></i>
                                            </div>
                                        </div>

                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                id="input-password" placeholder="Enter Password" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-password">Password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" id="input-password"
                                                placeholder="Enter Password" required>

                                            <label for="input-password">Confirm Password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>


                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text"
                                                class="form-control @error('coupon_id') is-invalid @enderror"
                                                name="coupon_id" value="{{ old('coupon_id') }}" id="input-coupon-id"
                                                placeholder="Enter User Name" required>
                                            @error('coupon_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="input-coupon-id">Extraction Code</label>
                                            <p><span style="color: #0000ff;"><a style="color: #0000ff;"
                                                        href="{{ route('front.pin_dispatchers') }}"
                                                        target="_blank"><strong>No CODE? Get EXTRACTION Code
                                                            Here!</strong></a></span></p>
                                            <div class="form-floating-icon">
                                                <i data-feather="key"></i>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <p>By Registering your <strong>RubicNetwork</strong> Account, you agree to our
                                                <span style="color: #0000ff;"><a style="color: #0000ff;"
                                                        href="{{ route('front.terms_condition') }}"
                                                        target="_blank">Terms
                                                        &amp; Condition</a></span>, <span style="color: #0000ff;"><a
                                                        style="color: #0000ff;"
                                                        href="{{ route('front.privacy_policy') }}"
                                                        target="_blank">Privacy Policy</a></span>, <span
                                                    style="color: #0000ff;"><a style="color: #0000ff;"
                                                        href="{{ route('front.cookies_policy') }}"
                                                        target="_blank">Cookies
                                                        Policy</a></span> &amp; <span style="color: #0000ff;"><a
                                                        style="color: #0000ff;" href="{{ route('front.disclaimer') }}"
                                                        target="_blank">Disclaimer Policy</a></span>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Register Account</button>
                                        </div>
                                    </form>

                                    <div class="mt-5 text-center">
                                        <p class="text-muted mb-0">Have a RubicNetwork Account? <br><a
                                                href="{{ route('user.login') }}" class="text-primary fw-semibold">
                                                Login
                                                to RubicNetwork now! </a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->
                <div class="col-xxl-9 col-lg-8 col-md-7">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay"></div>
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="row justify-content-center align-items-end">
                            <div class="col-xl-7">
                                <div class="p-0 p-sm-4 px-xl-0">
                                    <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div
                                            class="carousel-indicators auth-carousel carousel-indicators-rounded justify-content-center mb-0">
                                            <button type="button" data-bs-target="#reviewcarouselIndicators"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1">
                                                <img src="{{ asset('front_assets/images/manual_uploads/_119533816_mediaitem119443845.jpg') }}"
                                                    class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                            </button>
                                            <button type="button" data-bs-target="#reviewcarouselIndicators"
                                                data-bs-slide-to="1" aria-label="Slide 2">
                                                <img src="{{ asset('front_assets/images/manual_uploads/b419bef859851f2619ff596dcd9878d8.jpg') }}"
                                                    class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                            </button>
                                            <button type="button" data-bs-target="#reviewcarouselIndicators"
                                                data-bs-slide-to="2" aria-label="Slide 3">
                                                <img src="{{ asset('front_assets/images/manual_uploads/7X3PG0JK_400x400.jpg') }}"
                                                    class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                            </button>
                                        </div>
                                        <!-- end carouselIndicators -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="testi-contain text-center text-white">
                                                    <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                    <h4 class="mt-4 fw-medium lh-base text-white">“This is so lovely I just
                                                        withdraw my earning profit of ₦102,488 from RubicNetwork and I have
                                                        received my money oooooooooh am so happy this is the best way of
                                                        making money.”
                                                    </h4>
                                                    <div class="mt-4 pt-1 pb-5 mb-5">
                                                        <h5 class="font-size-16 text-white">Azeez Ayotunde Solomon
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <div class="testi-contain text-center text-white">
                                                    <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                    <h4 class="mt-4 fw-medium lh-base text-white">“Thank you RUBIC NETWORK.
                                                        God bless you.. Continue your good work keep changing lifes. This is
                                                        my fifth withdrawal if am not mistaken. Thank you once again. GOD
                                                        bless.”</h4>
                                                    <div class="mt-4 pt-1 pb-5 mb-5">
                                                        <h5 class="font-size-16 text-white">Chibuike Goodness Oluchi
                                                        </h5>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <div class="testi-contain text-center text-white">
                                                    <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                    <h4 class="mt-4 fw-medium lh-base text-white">“Wow, rubic has shocked
                                                        me again with another blessing of NGN260,500 and I wish I had known,
                                                        I would have long join goldmint.abeg make una come follow me chop
                                                        this money from rubic ohhh.”</h4>
                                                    <div class="mt-4 pt-1 pb-5 mb-5">
                                                        <h5 class="font-size-16 text-white">Ibrahim Atobatele</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end carousel-inner -->
                                    </div>
                                    <!-- end review carousel -->
                                    <a href="https://rubicnetwork.com/payment_proof" target="_blank" type="button"
                                        class="btn btn-primary w-100">See More Testimonies & Payment Proofs ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>
@endsection
@section('script')
    {{-- <script src="{{ URL::asset('user_assets/js/pages/pass-addon.init.js') }}"></script> --}}
    <script src="{{ URL::asset('user_assets/js/pages/feather-icon.init.js') }}"></script>
@endsection
