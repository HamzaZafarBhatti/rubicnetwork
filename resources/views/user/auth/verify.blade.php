@extends('user.layouts.master-without-nav')
@section('title')
Verify your Email
@endsection
@section('content')
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-5 col-lg-5 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="{{ url('/') }}" class="d-block auth-logo">
                                    <img src="{{ url('/') }}/asset/{{ $logo->image_link }}" alt="" height="50">
                                </a>
                            </div>

                            <div class="mb-4 mb-md-5 text-center">
                                @if (Session::has('success'))
                                <p class="text-success">{{ session('success') }}</p>
                                @endif
                                @if (Session::has('error'))
                                <p class="text-danger">{{ session('error') }}</p>
                                @endif
                            </div>
                            
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <div class="avatar-lg mx-auto">
                                        <div class="avatar-title rounded-circle bg-light">
                                            <i class="bx bxs-envelope h2 mb-0 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="p-2 mt-4">

                                        <h4>Verify your email</h4>
                                        <p class="mb-5">Please enter the 6 digit code sent to <span class="fw-bold">{{ auth()->user()->email }}</span></p>

                                        <form action="{{ route('user.do_verify_email') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit1-input" class="visually-hidden">Dight 1</label>
                                                        <input type="text" name="pin[]" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 2)" maxlength="1" id="digit1-input">
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit2-input" class="visually-hidden">Dight 2</label>
                                                        <input type="text" name="pin[]" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 3)" maxlength="1" id="digit2-input">
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit3-input" class="visually-hidden">Dight 3</label>
                                                        <input type="text" name="pin[]" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 4)" maxlength="1" id="digit3-input">
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit4-input" class="visually-hidden">Dight 4</label>
                                                        <input type="text" name="pin[]" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 5)" maxlength="1" id="digit4-input">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit5-input" class="visually-hidden">Dight 5</label>
                                                        <input type="text" name="pin[]" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 6)" maxlength="1" id="digit5-input">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit6-input" class="visually-hidden">Dight 6</label>
                                                        <input type="text" name="pin[]" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 6)" maxlength="1" id="digit6-input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Confirm</button>
                                            </div>
                                        </form>


                                    </div>

                                </div>

                                <div class="mt-5 text-center">
                                    <p class="text-muted mb-0">Didn't receive an email ? <a href="{{ route('user.resend_code') }}"
                                        class="text-primary fw-semibold"> Resend </a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-7 col-lg-7 col-md-7">
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
                    <!-- end bubble effect -->
                    <div class="row justify-content-center align-items-end">
                        <div class="col-xl-7">
                            <div class="p-0 p-sm-4 px-xl-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators auth-carousel carousel-indicators-rounded justify-content-center mb-0">
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                            <img src="{{ URL::asset('user_assets/images/users/avatar-1.jpg') }}" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                                            <img src="{{ URL::asset('user_assets/images/users/avatar-2.jpg') }}" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                                            <img src="{{ URL::asset('user_assets/images/users/avatar-3.jpg') }}" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                    </div>
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testi-contain text-center text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                <h4 class="mt-4 fw-medium lh-base text-white">“I feel confident
                                                    imposing change
                                                    on myself. It's a lot more progressing fun than looking back.
                                                    That's why
                                                    I ultricies enim
                                                    at malesuada nibh diam on tortor neaded to throw curve balls.”
                                                </h4>
                                                <div class="mt-4 pt-1 pb-5 mb-5">
                                                    <h5 class="font-size-16 text-white">Richard Drews
                                                    </h5>
                                                    <p class="mb-0 text-white-50">Web Designer</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-center text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                <h4 class="mt-4 fw-medium lh-base text-white">“Our task must be to
                                                    free ourselves by widening our circle of compassion to embrace
                                                    all living
                                                    creatures and
                                                    the whole of quis consectetur nunc sit amet semper justo. nature
                                                    and its beauty.”</h4>
                                                <div class="mt-4 pt-1 pb-5 mb-5">
                                                    <h5 class="font-size-16 text-white">Rosanna French
                                                    </h5>
                                                    <p class="mb-0 text-white-50">Web Developer</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-center text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                <h4 class="mt-4 fw-medium lh-base text-white">“I've learned that
                                                    people will forget what you said, people will forget what you
                                                    did,
                                                    but people will never forget
                                                    how donec in efficitur lectus, nec lobortis metus you made them
                                                    feel.”</h4>
                                                <div class="mt-4 pt-1 pb-5 mb-5">
                                                    <h5 class="font-size-16 text-white">Ilse R. Eaton</h5>
                                                    <p class="mb-0 text-white-50">Manager
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end carousel-inner -->
                                </div>
                                <!-- end review carousel -->
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
<script src="{{ URL::asset('user_assets/js/pages/feather-icon.init.js') }}"></script>
<script>
    function moveToNext(t,e){0<t.value.length&&$("#digit"+e+"-input").focus()}
</script>
@endsection

