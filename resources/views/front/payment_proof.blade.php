@extends('front.layout.app')

@section('styles')
    <style>
        .testimonial__area nav {
            text-align: end;
        }
        .testimonial__area img {
            height: 354px;
            width: 354px;
            object-fit: cover;

        }
        .testimonial__area nav a {
            color: black;
        }
    </style>
@endsection

@section('content')
    <!-- ==== testimonial section start ==== -->
    <section class="testimonial  section__space pos__rel over__hi bg__img"
        data-background="{{ asset('front_assets/images/testimonial/dot-map.png') }}">
        <div class="container">
            <div class="testimonial__area">
                <div class="section__header">
                    <h2>Payment Proofs</h2>
                </div>
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                        </div>
                        <div class="col-lg-4">
                            <div class="text-start text-lg-end">
                                <a href="{{ route('user.payment_proofs.create') }}"
                                    class="button button--secondary button--effect">Upload Payment Proof</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial__items row">
                    @if ($proofs)
                        @foreach ($proofs as $item)
                            <div class="col-md-4 p-2">
                                <div class="testimonial__support">
                                    <div class="testimonial__item bg__img"
                                        data-background="{{ asset('front_assets/images/testimonial/quote.png') }}">
                                        <p class="tertiary">{{ $item->caption }}</p>
                                        <div class="property__grid__area__wrapper__inner__two">
                                            <div class="property__item__image column__space--secondary">
                                                <div class="image">
                                                    <img src="{{ url('/') }}/asset/payment_proofs/{{ $item->image }}"
                                                        alt="{{ $item->caption }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial__author">
                                            <div class="testimonial__author__info">
                                                <div>

                                                    <h5>{{ $item->user->name }}</h5>
                                                    <p class="neutral-bottom">{{ $item->user->username }}</p>
                                                    <p class="neutral-bottom">{{ $item->formated_created_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{ $proofs->links() }}
            </div>
        </div>
    </section>
    <!-- ==== #testimonial section end ==== -->
@endsection
