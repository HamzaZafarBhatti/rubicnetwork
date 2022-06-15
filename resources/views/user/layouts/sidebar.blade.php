<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="{{ route('user.dashboard') }}">
                        <i data-feather="home"></i>
                        <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                        <span data-key="t-dashboard">@lang('translation.Dashboards')</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-apps">@lang('translation.Apps')</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="filter"></i>
                        <span data-key="t-ecommerce">Rubic Extraction</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('user.extractions.page') }}" key="t-products">Extract Rubic Token</a>
                        </li>
                        <li><a href="{{ route('user.extractions.history') }}" data-key="t-product-detail">Extraction
                                History</a></li>
                        <li><a href="{{ route('user.extractions.convert') }}" data-key="t-orders">Convert to
                                Wallet</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="share-2"></i>
                        <span data-key="t-ecommerce">Viral Share</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('user.viral_shares.index') }}" key="t-products">Viral Share Earn</a></li>
                        <li><a href="{{ route('user.viral_shares.history') }}" data-key="t-product-detail">Viral Share History</a></li>
                        <li><a href="{{ route('user.viral_shares.convert') }}" data-key="t-orders">Convert to Wallet</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="dollar-sign"></i>
                        <span data-key="t-ecommerce">Referral Earnings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('user.referrals.index') }}" key="t-products">My Referrals</a></li>
                        <li><a href="{{ route('user.referrals.earning_history') }}"
                                data-key="t-product-detail">Earning History</a></li>
                        <li><a href="{{ route('user.referrals.convert') }}" data-key="t-orders">Convert to Wallet</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="dollar-sign"></i>
                        <span data-key="t-ecommerce">Indirect Referral Earnings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('user.indirect_referrals.index') }}" key="t-products">My Indirect
                                Referrals</a></li>
                        <li><a href="{{ route('user.indirect_referrals.earning_history') }}" data-key="t-product-detail">Earning
                                History</a></li>
                        <li><a href="{{ route('user.indirect_referrals.convert') }}" data-key="t-orders">Convert to
                                Wallet</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i data-feather="arrow-up-circle"></i>
                        <span data-key="t-chat">Upgrade Plan</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shuffle"></i>
                        <span data-key="t-ecommerce">Convert Extraction to Activation Code</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-products">Convert Extraction to Activation Code</a></li>
                        <li><a href="#" data-key="t-product-detail">Conversion History</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="#">
                        <i data-feather="send"></i>
                        <span data-key="t-chat">Transfer Extraction</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-apps">@lang('translation.Pages')</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-ecommerce">Withdraw Rubic NGN to Bank from Wallet</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-products">Withdraw Rubic NGN to Bank from Wallet</a></li>
                        <li><a href="#" data-key="t-product-detail">Rubic Wallet Withdrawal History</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-ecommerce">Withdraw Rubic Stake Wallet to Tether USDT</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-products">Withdraw Rubic Stake Wallet to Tether USDT</a></li>
                        <li><a href="#" data-key="t-product-detail">Rubic Stake Wallet Withdrawal History</a></li>
                    </ul>
                </li>

                <li class="menu-title" data-key="t-apps">Rubic Staking</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-bag"></i>
                        <span data-key="t-ecommerce">Activate Rubic Stake Plan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('user.stake_plans.activate') }}" key="t-products">Activate Stake Plan</a></li>
                        <li><a href="{{ route('user.stake_plans.history') }}" data-key="t-product-detail">Stake Plan Activation History</a></li>
                        <li><a href="#" data-key="t-product-detail">Conversion Stake to Stake Wallet History</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-bag"></i>
                        <span data-key="t-ecommerce">Stake Rubic to Earn</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-products">Stake Plans</a></li>
                        <li><a href="#" data-key="t-product-detail">Active Stakes</a></li>
                        <li><a href="#" data-key="t-product-detail">Convert Profits to Rubic USD Wallet</a></li>
                        <li><a href="#" data-key="t-product-detail">Staking History</a></li>
                        <li><a href="#" data-key="t-product-detail">Conversion Stake to Stake Wallet History</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-ecommerce">Stake Referral Earnings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('user.stake_referrals.earning_history') }}" key="t-products">Stake Referral Earnings</a></li>
                        <li><a href="#" data-key="t-product-detail">Convert Referral Earnings to Rubic Stake Wallet</a>
                        </li>
                    </ul>
                </li>


                <li class="menu-title" data-key="t-apps">Account Information</li>
                <li>
                    <a href="{{ route('user.profile_edit') }}">
                        <i data-feather="user"></i>
                        <span data-key="t-chat">My Account Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.profile.set_pin') }}">
                        <i data-feather="settings"></i>
                        <span data-key="t-chat">Transaction Code Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i data-feather="file"></i>
                        <span data-key="t-chat">Payment Proof</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.login_logs.index') }}">
                        <i data-feather="archive"></i>
                        <span data-key="t-chat">Login History</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i data-feather="info"></i>
                        <span data-key="t-chat">All Notifications</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.logout') }}">
                        <i data-feather="log-out"></i>
                        <span data-key="t-chat">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
