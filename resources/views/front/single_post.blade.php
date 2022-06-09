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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">WELL DONE!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>You have successfully earned from today's VIRAL SHARE.</p>
                    <p>You can now go back to your dashboard to continue to earn from other social activities which
                        RubicNetwork offers.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#viral_earn').click(function() {
                console.log('hello')
                $.ajax({
                    url: "{{ route('user.viral_shares.earn', $post->id) }}",
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                        $('.share-title').empty().html(response.html_text)
                        $("#exampleModal").modal('show')
                    }
                })
            })
        })
    </script>
@endsection
