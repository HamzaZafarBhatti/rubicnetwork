@extends('front.layout.app')

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
                        <div class="post__date">
                            <div class="dat">
                                <i class="fas fa-eye"></i>
                                <p>{{ $post->views }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <h2>{{ $post->title }}</h2>
                <h5>{{ $post->category->name }}</h5>
                <div class="group">{!! $post->details !!}</div>
                <div class="share-title text-start mt-4">
                    @include('front.partial_single_post')
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #blog single banner end ==== -->
@endsection

