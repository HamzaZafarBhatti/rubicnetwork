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
        @slot('title2')
            Viral Share Post
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="mt-2">
                        <h3>VIRAL SHARE</h3><br>
                        <p><strong><span style="background-color: #ffff99;">INFORMATION ABOUT VIRAL SHARE TASK</span></strong></p>
<ol>
<li>You will earn after <strong>SHARING</strong> your <strong>VIRAL POST</strong> on RUBICNETWORK for the day. <span style="text-decoration: underline;">The Earning would be paid to your BANK at the very end of the Month and paid out in full</span>.</li>
<li>Viral SHARE Task is based on your SHARING activity on your Facebook Tasks Daily. The simple instruction on how to <strong>VIRAL SHARE the Post</strong> would be at the end of each <span style="color: #ffffff;"><span style="background-color: #008000;"><strong>VIRAL SHARE POSTS</strong></span>.</span></li>
<li>Make sure your FACEBOOK PROFILE Link is updated on your<strong> RUBICNETWORK Profile</strong> to ensure we check your profile before your VIRAL SHARE Earnings would be PAID to you.</li>
<li>VIRAL SHARE tasks earnings is to be transferred to your <strong>RUBIC NGN WALLET</strong> for final withdrawal on the TRANSFER DATE.</li>
<li><span style="text-decoration: underline;"><strong>VIRAL SHARE TASKS are very HIGHLY Compulsory and mandatory for every RUBICAN.</strong></span></li>
</ol>
<p>&nbsp;</p>
                    </div>
                </div>
            </div>
            @if ($post)
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
                                        <h5 class="mb-3 text-truncate"><a href="{{ route('front.single.post', [$post->id, $post->slug] ) }}" target="_blank"
                                                class="text-dark">{{ $post->title }} </a></h5>
                                        <h4>{!! Str::limit($post->details, 150) !!}<a target="_blank"
                                                href="{{ route('front.single.post', [$post->id, $post->slug] ) }}"
                                                class="text-muted"><span style="color: #0000ff;">Click Here To VIRAL SHARE</span></a></h4>
                                    </div>
                                    <p class="text-primary mb-0" style="min-width: fit-content">
                                        Views: {{ $post->views }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h4>No VIRAL SHARE Post!</h4>
            @endif
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
