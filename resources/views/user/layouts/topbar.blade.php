<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('user.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ url('/') }}/asset/{{ $logo->image_link }}" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('/') }}/asset/{{ $logo->image_link }}" alt="" height="40">
                    </span>
                </a>

                <a href="{{ route('user.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ url('/') }}/asset/{{ $logo->image_link }}" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('/') }}/asset/{{ $logo->image_link }}" alt="" height="40">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i data-feather="bell" class="icon-lg"></i>
                    <span class="badge bg-danger rounded-pill">{{ count($all_notifications) }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            {{-- <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline"> Unread
                                    ({{ count($notifications) }})</a>
                            </div> --}}
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        @if ($notifications)
                            @foreach ($notifications as $item)
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        {{-- <div class="flex-shrink-0 me-3">
                                            <img src="{{ URL::asset('user_assets/images/users/rubic-avatar-min.jpg') }}"
                                                class="rounded-circle avatar-sm" alt="user-pic">
                                        </div> --}}
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ $item->title }}</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">{{ $item->msg }}</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="{{ route('user.notifications.index') }}">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="@if (Auth::user()->image != '') {{ URL::asset('asset/profile/' . Auth::user()->image) }}@else{{ URL::asset('user_assets/images/users/rubic-avatar-min.jpg') }} @endif"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                    {{-- <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i> --}}
                </button>
                {{-- <div class="dropdown-menu dropdown-menu-end"> --}}
                <!-- item-->
                {{-- <a class="dropdown-item" href="{{ route('user.profile') }}"><i
                            class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> @lang('translation.Profile')</a> --}}
                {{-- <a class="dropdown-item" href="auth-lock-screen"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> @lang('translation.Lock_Screen')</a> --}}
                {{-- <div class="dropdown-divider"></div> --}}
                {{-- <a class="dropdown-item " href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1"></i> <span key="t-logout">@lang('translation.Logout')</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> --}}
                {{-- </div> --}}
            </div>

        </div>
    </div>
</header>
