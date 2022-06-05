@extends('user.layouts.master')
@section('title')
    Extraction Page
@endsection
@section('css')
    <style>
        .title-line {
            color: var(--bs-blue);
            opacity: 1;
        }

        .extraction-link {
            width: 300px;
            height: 300px;
            background-color: var(--bs-blue);
            border-radius: 50%;
            color: var(--bs-white);
            display: grid;
            place-items: center;
            font-size: 2em;
            font-weight: bold;
        }

        .extraction-link:hover {
            color: var(--bs-gray-400);
        }

        .deadline {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .deadline span {
            font-size: 2rem;
        }

        .deadline-format {
            width: 5rem;
            height: 5rem;
            display: grid;
            place-items: center;
            text-align: center;
        }

        .deadline-format span {
            display: block;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.85rem;
        }

        .deadline h4:not(.expired) {
            font-size: 2rem;
            margin-bottom: 0.25rem;
            letter-spacing: var(--spacing);
        }

        .extraction-gif {
            width: 300px;
            height: 300px;
            object-fit: cover;
        }

    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title1')
            Good Evening ! {{ auth()->user()->name }}
        @endslot
        @slot('small')
            You are on the <a href="#">Rubic Extraction Plan 1</a>
        @endslot
        @slot('title2')
            Extraction Page
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <h2 class="text-center">Extraction Machine</h2>
                    <hr size="8" class="title-line">

                    @if ($latest_mine)
                        <div class="text-center">
                            <h4 class="deadline-heading">Remaining Time</h4>
                            <div class="deadline">
                                <div class="deadline-format">
                                    <div>
                                        <h4 class="hours"></h4>
                                        <span>hours</span>
                                    </div>
                                </div>
                                <span>:</span>
                                <div class="deadline-format">
                                    <div>
                                        <h4 class="minutes"></h4>
                                        <span>mins</span>
                                    </div>
                                </div>
                                <span>:</span>
                                <div class="deadline-format">
                                    <div>
                                        <h4 class="seconds"></h4>
                                        <span>secs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-4">
                            <img src="{{ asset('user_assets/images/gifs/extract.gif') }}" alt=""
                                class="rounded-circle extraction-gif">
                            <h3 class="mt-2">Extraction in progress...</h3>
                        </div>
                    @else
                        <div class="d-flex justify-content-center align-items-center m-4">
                            <a href="{{ route('user.extractions.start') }}" class="extraction-link"
                                onclick="event.preventDefault(); extraction_start(this);">
                                Start Extraction
                            </a>
                        </div>
                    @endif

                    <input type="hidden" id="extract_end_date"
                        value="{{ $latest_mine ? \Carbon\Carbon::parse($latest_mine->end_datetime) : null }}">
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <!-- dashboard init -->
        <script src="{{ URL::asset('/user_assets/js/app.min.js') }}"></script>
        <script>
            function extraction_start(elem) {
                $.ajax({
                    url: elem.href,
                    method: 'get',
                    success: function(response) {
                        console.log(response)
                        if (response.status == 1) {
                            location.reload()
                        } else {
                            alert('MINING already in progress!')
                        }
                    }
                })
            }

            function getRemainingTime() {
                const today = new Date().getTime();
                var t = futureTime - today;

                const oneDay = 24 * 60 * 60 * 1000;
                const oneHour = 60 * 60 * 1000;
                const oneMinute = 60 * 1000;

                let hours = Math.floor((t % oneDay) / oneHour);
                let minutes = Math.floor((t % oneHour) / oneMinute);
                let seconds = Math.floor((t % oneMinute) / 1000);

                const values = [hours, minutes, seconds];

                function format(value) {
                    if (value < 10) {
                        return (value = `0${value}`);
                    }
                    return value;
                }

                items.forEach(function(item, index) {
                    item.innerHTML = format(values[index]);
                });
                if (t < 0) {
                    // console.log('finished');
                    clearInterval(countdown);
                    $('.deadline').addClass('d-none')
                    $('.deadline-heading').addClass('d-none')
                    now = new Date();
                    if (futureDateUTC < now) {
                        $.ajax({
                            url: "{{ route('user.extractions.end') }}",
                            method: 'get',
                            success: function(response) {
                                console.log(response)
                                if (response.status == 2) {
                                    location.href = "{{ route('user.extractions.page') }}"
                                } else {
                                    alert('Error Completing the request')
                                }
                            }
                        })
                    }
                }
            }

            function startCountdown() {
                countdown = setInterval(function() {
                    getRemainingTime()
                }, 1000);
                getRemainingTime();
            }

            const items = document.querySelectorAll(".deadline-format h4");
            let countdown;
            var futureDate;
            var futureTime;
            var endDate = document.getElementById('extract_end_date').value;
            var futureDateUTC = new Date(Date.UTC(endDate.slice(0, 4), endDate.slice(5, 7) - 1, endDate.slice(8, 10), endDate
                .slice(11, 13), endDate.slice(14, 16), endDate.slice(17, 19)));
            var now = new Date()
            console.log(futureDateUTC < now);
            if (futureDateUTC > now) {
                futureDate = futureDateUTC
                futureTime = futureDate.getTime();
                startCountdown();
            }
        </script>
    @endsection
