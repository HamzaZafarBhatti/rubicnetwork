@extends('front.layout.app')


@section('content')
    <!-- ==== banner section start ==== -->
    <section class="support__banner contact__banner bg__img clear__top"
        data-background="{{ asset('front_assets/images/contact-banner-bg.png') }}">
        <div class="container">
            <div class="support__banner__area">
                <div class="support__banner__inner">
                    <h1 class="neutral-top">Frequently Asked Questions</h1>
                </div>
            </div>
        </div>

    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== faq section start ==== -->
    <section class="faq section__space">
        <div class="container">
            <div class="faq__area">
                <div class="faq__group">
                    @if ($faqs)
                        <div class="accordion" id="accordionExampleFund">
                            @foreach ($faqs as $item)
                                <div class="accordion-item content__space">
                                    <h5 class="accordion-header" id="headingFund{{ $loop->iteration }}">
                                        <span class="icon_box">
                                            <img src="{{ asset('front_assets/images/icons/message.png') }}"
                                                alt="Fund" />
                                        </span>
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFund{{ $loop->iteration }}" aria-expanded="true"
                                            aria-controls="collapseFund{{ $loop->iteration }}">
                                            {{ $item->question }}
                                        </button>
                                    </h5>
                                    <div id="collapseFund{{ $loop->iteration }}" class="accordion-collapse collapse @if($loop->first) show @endif"
                                        aria-labelledby="headingFund{{ $loop->iteration }}" data-bs-parent="#accordionExampleFund">
                                        <div class="accordion-body">
                                            {!! $item->answer !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #faq section end ==== -->
@endsection
