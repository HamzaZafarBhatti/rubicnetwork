@extends('user.layouts.master')
@section('title')
    Stake Plans
@endsection
@section('css')
    <link href="{{ URL::asset('user_assets/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ URL::asset('user_assets/libs/gridjs/gridjs.min.css') }}"> --}}
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Stake Plans
        @endslot
        @slot('title')
            Activate
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="mt-2">
                        <h5>Stake Plans</h5>
                    </div>
                </div>
            </div>
            @if (!$plans->isEmpty())
                @foreach ($plans as $item)
                    <div class="row">
                        <div class="col-xl-4 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-img position-relative">
                                        <img src="{{ url('/') }}/asset/images/{{ $item->image }}" alt=""
                                            class="img-fluid mx-auto d-block">
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <div>
                                            <h5 class="mb-3 text-truncate"><a
                                                    href="javascript:void(0)"
                                                    target="_blank" class="text-dark">{{ $item->name }} </a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h4>No Stake Plans!</h4>
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
