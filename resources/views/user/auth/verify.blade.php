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
                                    <img src="{{ url('/') }}/asset/{{ $logo->image_link }}" alt="" height="60">
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

                                        <h4>Verify your Account Email</h4>
                                        <p class="mb-5">Please enter the 6 digit code sent to <span class="fw-bold">{{ auth()->user()->email }}</span></p>

                                        <form action="{{ route('user.do_verify_email') }}" method="post">
                                            @csrf
                                            <div class="d-flex justify-content-around mb-2 custom-gap">
                                                <input type="text" class="form-control code-input text-center"
                                                    name="pin[]">
                                                <input type="text" class="form-control code-input text-center"
                                                    name="pin[]">
                                                <input type="text" class="form-control code-input text-center"
                                                    name="pin[]">
                                                <input type="text" class="form-control code-input text-center"
                                                    name="pin[]">
                                                <input type="text" class="form-control code-input text-center"
                                                    name="pin[]">
                                                <input type="text" class="form-control code-input text-center"
                                                    name="pin[]">
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Verify Account</button>
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
                                            <img src="https://rubicnetwork.com/front_assets/images/manual_uploads/_119533816_mediaitem119443845.jpg" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                                            <img src="https://rubicnetwork.com/front_assets/images/manual_uploads/b419bef859851f2619ff596dcd9878d8.jpg" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                                            <img src="https://rubicnetwork.com/front_assets/images/manual_uploads/7X3PG0JK_400x400.jpg" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                    </div>
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testi-contain text-center text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                <h4 class="mt-4 fw-medium lh-base text-white">???This is so lovely I just withdraw my earning profit of ???102,488 from RubicNetwork and I have received my money oooooooooh am so happy this is the best way of making money.???
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
                                                <h4 class="mt-4 fw-medium lh-base text-white">???Thank you RUBIC NETWORK. God bless you.. Continue your good work keep changing lifes. This is my fifth withdrawal if am not mistaken. Thank you once again. GOD bless.???</h4>
                                                <div class="mt-4 pt-1 pb-5 mb-5">
                                                    <h5 class="font-size-16 text-white">Chibuike Goodness Oluchi
                                                    </h5>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-center text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                <h4 class="mt-4 fw-medium lh-base text-white">???Wow, rubic has shocked me again with another blessing of NGN260,500 and I wish I had known, I would have long join goldmint.abeg make una come follow me chop this money from rubic ohhh.???</h4>
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
<script src="{{ URL::asset('user_assets/js/pages/feather-icon.init.js') }}"></script>
<script>
    const inputElements = [...document.querySelectorAll('input.code-input')]

    inputElements.forEach((ele, index) => {
        ele.addEventListener('keydown', (e) => {
            // if the keycode is backspace & the current field is empty
            // focus the input before the current. Then the event happens
            // which will clear the "before" input box.
            if (e.keyCode === 8 && e.target.value === '') inputElements[Math.max(0, index - 1)].focus()
        })
        ele.addEventListener('input', (e) => {
            // take the first character of the input
            // this actually breaks if you input an emoji like ?????????????????????????....
            // but I'm willing to overlook insane security code practices.
            const [first, ...rest] = e.target.value
            e.target.value = first ??
                '' // first will be undefined when backspace was entered, so set the input to ""
            const lastInputBox = index === inputElements.length - 1
            const insertedContent = first !== undefined
            if (insertedContent && !lastInputBox) {
                // continue to input the rest of the string
                inputElements[index + 1].focus()
                inputElements[index + 1].value = rest.join('')
                inputElements[index + 1].dispatchEvent(new Event('input'))
            }
        })
    })
</script>
@endsection

