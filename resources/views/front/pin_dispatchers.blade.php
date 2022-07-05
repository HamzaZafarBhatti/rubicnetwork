@extends('front.layout.app')

@section('content')
    <!-- ==== banner section start ==== -->
    <section class="banner key-banner banner--secondary terms__banner clear__top bg__img"
        data-background="{{ asset('front_assets/images/banner/banner-bg.png') }}">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top mb-0">Activation Pin Code Dispatchers</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="https://rubicnetwork.com/">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Activation Pin Code Dispatchers
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
         <img src="{{ asset('front_assets/images/banner/key-illustration.png') }}" alt="Career" class="banner__thumb" />
    </section>
    <!-- ==== #banner section end ==== -->
    <!-- ==== details section start ==== -->
    <section class="p__details__two faq section__space__bottom">
        <div class="container">
            <div class="p__details__area">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p__details__content">
                            <div class="group__one">
                                {{-- <h4>About the loan</h4>
                                <p>Purpose of the loan To increase the company's working capital</p> --}}
                               <p><strong>Below the LIST are Trusted and Vetted RUBICNETWORK DISPATCHERS. You Can Basically Contact Any of them for your <span style="background-color: #ffff99;">RUBIC EXTRACTION ACTIVATION CODE</span> or your <span style="background-color: #ffff99;">RUBIC STAKE ACTIVATION CODE</span>.</strong></p>
<p><span style="color: #000080;"><strong><span style="text-decoration: underline;">You'll be promptly attended to.</span></strong></span></p>
                                <div class="tabular__group">
                                    @if ($vendors)
                                        <div class="single">
                                            <h6>Name of DISPATCHER</h6>
                                             <h6>Call/SMS/WhatsApp Chat/ Status</h6>
                                        </div>
                                        @foreach ($vendors as $item)
                                            <div class="single">
                                                <p>{{ $item->name }}</p>
                                                <p>
                                                    <a href="https://wa.me/{{ $item->whatsapp }}" class="text-theme">
                                                        {{ $item->whatsapp }}
                                                    </a>
                                                </p>
                                                <p><a href="https://api.whatsapp.com/send?phone={{ $item->whatsapp }}&text=Greetings to you! I want to purchase RUBICNETWORK Activation Code immediately.I do Hope You're online and available?"><img src="https://goldmintng.com/asset/images/580b57fcd9996e24bc43c543.png" alt="" width="22" height="22" /><strong><span style="color: #008000;">Chat</span></strong></a></p>
                                                <p class="badge bg-success">
                                                    @if ($item->status)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </p>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                {{-- <p class="neutral-bottom">The purpose of the financing is to partially refinance an
                                    existing loan on the Nordstreet platform. Refinancing is requested to adjust
                                    financial flows. </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #details section end ==== -->
@endsection
