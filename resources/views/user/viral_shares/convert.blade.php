@extends('user.layouts.master')
@section('title')
    Convert Viral Share Earnings to Rubic Wallet
@endsection
@section('css')
    <link href="{{ URL::asset('user_assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('user_assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('user_assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Viral Share
        @endslot
        @slot('title2')
            Convert to Rubic Wallet
        @endslot
    @endcomponent
<hr />
<p><strong><span style="background-color: #ffff99; color: #ff0000;">N.B:</span></strong> Please be informed you must be participating in <strong>VIRAL SHARING</strong> <span style="text-decoration: underline;">for you to be <strong><span style="color: #008000; text-decoration: underline;">PAID</span></strong></span> your <strong><span style="background-color: #ffff99;">EXTRACTION TOKEN Balance</span></strong> and <strong><span style="background-color: #ffff99;">VIRAL SHARE Earnings</span></strong> Monthly.</p>
<p><strong><span style="color: #ff0000;">VIRAL SHARE Participation is HIGHLY COMPULSORY for all users on RUBICNETWORK.</span></strong></p>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rubic Wallet Balance</h4>
                </div>
                <div class="card-body">
                    <h4>₦{{ auth()->user()->rubic_wallet }}</h4>
                    <h5 class="text-success">Rubic Wallet Funds can be Withdrawn and paid Instantly To Your BANK</h5>
                    <a href="{{ route('user.wallet.withdraw') }}" type="button"
                        class="btn btn-primary w-100">WITHDRAW to Bank</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Viral Share Balance</h4>
                </div>
                <div class="card-body">
                    <h4>₦{{ auth()->user()->viral_share_earning }}</h4>
                    <h5>Date to Transfer to Rubic NGN Wallet</h5>
                    <h5 class="text-info">{{ $set->viral_share_transfer_start_formatted }}</h5>
                    <h5 class="text-info">{{ $set->viral_share_transfer_end_formatted }}</h5>
                    <h6 class="text-success">Monthly Transfer flow</h6>
                </div>
            </div>
        </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Convert Viral Share Earnings to Rubic Wallet</h4><br>
                    <p><strong>Get your VIRAL SHARE EARNING</strong></p>
<p><span style="color: #008000;"><strong>Convert your VIRAL SHARE Earning to your RUBIC WALLET and Withdraw as Cash to your BANK&nbsp;</strong></span></p>
<p>All you have to do is to simply make a Transfer of your <strong>VIRAL SHARE Earning</strong>&nbsp;to your <span style="background-color: #ffff99; color: #008000;"><strong>RUBIC NGN Wallet</strong></span></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form action="{{ route('user.viral_shares.do_convert') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="amount">Amount (₦)</label>
                                                <input type="text" class="form-control" name="amount">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="pins">Enter Transaction Code</label>
                                                <div class="d-flex justify-content-around mb-2 custom-gap">
                                                    <input type="text" class="form-control code-input text-center"
                                                        name="pins[]">
                                                    <input type="text" class="form-control code-input text-center"
                                                        name="pins[]">
                                                    <input type="text" class="form-control code-input text-center"
                                                        name="pins[]">
                                                    <input type="text" class="form-control code-input text-center"
                                                        name="pins[]">
                                                    <input type="text" class="form-control code-input text-center"
                                                        name="pins[]">
                                                    <input type="text" class="form-control code-input text-center"
                                                        name="pins[]">
                                                </div>
                                                <div>
                                                    <a href="{{ route('user.profile.set_pin') }}">Click here to set
                                                        transaction code</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Transfer to Rubic Wallet</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Viral Share Earnings Transfers to Rubic Wallet</h4>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Account Name</th>
                                            <th>Amount</th>
                                            <th>Transfer Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($converts)
                                            @foreach ($converts as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>₦{{ $item->amount }}</td>
                                                    <td>{{ \Carbon\carbon::parse($item->created_at)->toDateTimeString() }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script src="{{ URL::asset('user_assets/libs/datatables.net/datatables.net.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/libs/datatables.net-buttons/datatables.net-buttons.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js') }}">
        </script>
        <script src="{{ URL::asset('user_assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ URL::asset('user_assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}">
        </script>
        <script
                src="{{ URL::asset('user_assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js') }}">
        </script>
        <script src="{{ URL::asset('user_assets/js/pages/datatables.init.js') }}"></script>
        <script src="{{ URL::asset('user_assets/js/app.min.js') }}"></script>
        <script>
            const inputElements = [...document.querySelectorAll('input.code-input')]

            inputElements.forEach((ele, index) => {
                ele.addEventListener('keydown', (e) => {
                    // if the keycode is backspace & the current field is empty
                    // focus the input before the current. Then the event happens
                    // which will clear the "before" input box.
                    if (e.keyCode === 8 && e.target.value === '') inputElements[Math.max(0, index - 1)].focus()
                })
                ele.addEventListener('input', (e) => {
                    // take the first character of the input
                    // this actually breaks if you input an emoji like 👨‍👩‍👧‍👦....
                    // but I'm willing to overlook insane security code practices.
                    const [first, ...rest] = e.target.value
                    e.target.value = first ??
                        '' // first will be undefined when backspace was entered, so set the input to ""
                    const lastInputBox = index === inputElements.length - 1
                    const insertedContent = first !== undefined
                    if (insertedContent && !lastInputBox) {
                        // continue to input the rest of the string
                        inputElements[index + 1].focus()
                        inputElements[index + 1].value = rest.join('')
                        inputElements[index + 1].dispatchEvent(new Event('input'))
                    }
                })
            })
        </script>
    @endsection
