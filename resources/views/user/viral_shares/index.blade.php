@extends('user.layouts.master')
@section('title')
    Viral Share Blog
@endsection
@section('css')
    <link href="{{ URL::asset('user_assets/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ URL::asset('user_assets/libs/gridjs/gridjs.min.css') }}"> --}}
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Viral Share
        @endslot
        @slot('title')
            Products
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="mt-2">
                        <h5>Latest Post</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img position-relative">
                                <img src="{{ url('/') }}/asset/thumbnails/{{ $post->image }}" alt=""
                                    class="img-fluid mx-auto d-block">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <h5 class="mb-3 text-truncate"><a href="javascript: void(0);"
                                            class="text-dark">{{ $post->title }} </a></h5>
                                    <h6>{!! Str::limit($post->details, 150) !!}<a target="_blank"
                                            href="{{ route('front.single.post', [$post->id, $post->slug] ) }}"
                                            class="text-muted"> Read more.</a></h6>
                                </div>
                                <p class="text-primary mb-0" style="min-width: fit-content">
                                    Views: {{ $post->views }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('user_assets/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('user_assets/libs/wnumb/wnumb.min.js') }}"></script>

    <script src="{{ URL::asset('user_assets/js/app.min.js') }}"></script>
@endsection
