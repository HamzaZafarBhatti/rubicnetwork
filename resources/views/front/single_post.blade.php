@extends('front.layout.app')
@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <!-- ==== blog single banner start ==== -->
    <div class="blog__single__banner clear__top bg__img"
        data-background="{{ url('/') }}/asset/thumbnails/{{ $post->image }}">
    </div>
    <section class="blog__single__post">
        <div class="container section__space pt-0">
            <div class="blog__single__post__content">
                <div class="blog__details__head">
                    <div class="blog__item__info">
                        <div class="post__date">
                            <div class="dat">
                                <i class="fas fa-calendar"></i>
                                <p>{{ \Carbon\Carbon::parse($post->post_date)->toFormattedDateString() }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('user.register') }}" class="button button--effect button--last">CLICK TO EARN <i class="fas fa-share"></i></a>
                </div>
                <h2>{{ $post->title }}</h2>
                <h5>{{ $post->category->name }}</h5>
                <div class="group">{!! $post->details !!}</div>

            </div>
        </div>
    </section>
    <!-- ==== #blog single banner end ==== -->

    <!-- ==== browse all post section start ==== -->
    {{-- <section class="latest__post__features section__space bg__img">
        <div class="container">
            <div class="latest__post__features__area wow fadeInUp">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>Latest Posts</h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-start text-lg-end">
                                <a href="blog.html" class="button button--secondary button--effect">Browse All
                                    Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row altr">
                    <div class="col-md-6 col-xl-4">
                        <div class="featured__large__post">
                            <a href="blog-single.html" class="thumbnail">
                                <img src="assets/images/blog/latest-one.png" alt="Poster" />
                            </a>
                            <div class="blog__content">
                                <h5><a href="blog-single.html">Learn the Benefits of Rental
                                        Property Investing</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                                <a href="blog-single.html">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="featured__large__post">
                            <a href="blog-single.html" class="thumbnail">
                                <img src="assets/images/blog/latest__two.png" alt="Poster" />
                            </a>
                            <div class="blog__content">
                                <h5><a href="blog-single.html">A Short Guide on Rental
                                        Property Investment</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                                <a href="blog-single.html">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="featured__large__post">
                            <a href="blog-single.html" class="thumbnail">
                                <img src="assets/images/blog/latest-three.png" alt="Poster" />
                            </a>
                            <div class="blog__content">
                                <h5><a href="blog-single.html">Learn the Benefits of Rental
                                        Property Investing</a></h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                                <a href="blog-single.html">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ==== #browse all post section end ==== -->
@endsection
