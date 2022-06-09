@extends('front.layout.app')
<!DOCTYPE html>
<html lang="en-US">
@section('content')
    <!-- ==== banner section start ==== -->
    <section class="banner blog-banner key-banner banner--secondary clear__top bg__img"
        data-background="{{ asset('user_assets/images/banner/banner-bg.png') }}">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top">Blog</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Blog
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <img src="{{ asset('user_assets/images/banner/blog__thumb.png') }}" alt="Career" class="banner__thumb" />
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== latest post section start ==== -->
    <section class="latest__post section__space">
        <div class="container">
            <div class="latest__post__area">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="left__wrap">
                            <div class="filter__bar">
                                <h3>Latest Posts</h3>
                                {{-- <div class="filter__bar__tabs">
                                    <a href="javascript:void(0)" class="filter__bar__tab button button--effect"
                                        data-target="all">All</a>
                                    <a href="javascript:void(0)"
                                        class="filter__bar__tab button button--effect button--secondary"
                                        data-target="articles">Articles</a>
                                    <a href="javascript:void(0)"
                                        class="filter__bar__tab button button--effect button--secondary"
                                        data-target="news">News</a>
                                    <a href="javascript:void(0)"
                                        class="filter__bar__tab button button--effect button--secondary"
                                        data-target="resources">Resources</a>
                                </div> --}}
                            </div>
                            <div class="row latest__blog__shuffle">
                                @if ($posts)
                                    @foreach ($posts as $item)
                                        <div class="col-md-6 latest__blog__item" {{-- data-groups='["all","resources"]' --}}>
                                            <div class="featured__large__post">
                                                <a href="{{ route('front.single.post', [$item->id, $item->slug]) }}"
                                                    class="thumbnail">
                                                    <img src="{{ url('/') }}/asset/thumbnails/{{ $item->image }}"
                                                        alt="Poster" />
                                                </a>
                                                <div class="blog__content">
                                                    <h5><a
                                                            href="{{ route('front.single.post', [$item->id, $item->slug]) }}">{{ $item->title }}</a>
                                                    </h5>
                                                    <p>{!! Str::limit($item->details, 150) !!}</p>
                                                    <a href="{{ route('front.single.post', [$item->id, $item->slug]) }}">Read
                                                        More <i class="fa-solid fa-arrow-right-long"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4>No post found</h4>
                                @endif
                            </div>
                            {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">
                                            <i class="fa-solid fa-arrow-left-long"></i>
                                        </a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">01</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">02</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">03</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a></li>
                                </ul>
                            </nav> --}}
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="right__wrap">
                            <div class="blog__popular">
                                <h5 class="neutral-top">Popular Articles</h5>
                                @if ($popular_posts)
                                    @foreach ($popular_posts as $item)
                                        <div class="blog__popular__single">
                                            <a href="{{ route('front.single.post', [$item->id, $item->slug]) }}" class="thumbnail">
                                                <img src="{{ url('/') }}/asset/thumbnails/{{ $item->image }}" alt="Popular One" />
                                            </a>
                                            <div class="blog__popular__single-content">
                                                <h6><a href="{{ route('front.single.post', [$item->id, $item->slug]) }}">{{ $item->title }}</a></h6>
                                                <a href="{{ route('front.single.post', [$item->id, $item->slug]) }}">Read More <i
                                                        class="fa-solid fa-arrow-right-long"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4>No post found</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #latest section end ==== -->
@endsection
