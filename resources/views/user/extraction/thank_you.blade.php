@extends('user.layouts.master')
@section('title')
    Thank You
@endsection
@section('css')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Extraction
        @endslot
        @slot('title2')
            Thank You
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center mb-5 pt-5">
                                <h1 class="error-title mt-5"><span>Thank You</span></h1>
                                <h4 class="text-uppercase mt-5">Extracion Bonus is added to your Extraction Balance</h4>
                                <p class="font-size-15 mx-auto text-muted w-50 mt-4">You can now start extracting again!</p>
                                <div class="mt-5 text-center">
                                    <a class="btn btn-primary waves-effect waves-light" href="{{ route('user.extractions.page') }}">Back to
                                        Extaraction Machine</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <!-- dashboard init -->
        <script src="{{ URL::asset('/user_assets/js/app.min.js') }}"></script>
    @endsection
