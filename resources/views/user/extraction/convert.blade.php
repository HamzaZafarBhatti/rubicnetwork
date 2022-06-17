@extends('user.layouts.master')
@section('title')
    Convert Extraction Balance to Rubic Wallet
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
            Extraction
        @endslot
        @slot('title2')
            Convert to Rubic Wallet
        @endslot
    @endcomponent

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rubic Wallet Balance</h4>
                </div>
                <div class="card-body">
                    <h4>₦{{ auth()->user()->rubic_wallet }}</h4>
                    <h5 class="text-success">Rubic Wallet funds can be cashed and paid instantly</h5>
                    <a href="{{ route('user.wallet.withdraw') }}" type="submit"
                        class="btn btn-primary w-100">Submit</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Extraction Balance</h4>
                </div>
                <div class="card-body">
                    <h4>₦{{ auth()->user()->extraction_balance }}</h4>
                    <h5>Date to Transfer to Wallet</h5>
                    <h5 class="text-info">{{ $set->extraction_transfer_start }}</h5>
                    <h5 class="text-info">{{ $set->extraction_transfer_end }}</h5>
                    <h6 class="text-success">Monthly Transfer flow</h6>
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
                    <h5>Date to Transfer to Wallet</h5>
                    <h5 class="text-info">{{ $set->viral_share_transfer_start }}</h5>
                    <h5 class="text-info">{{ $set->viral_share_transfer_end }}</h5>
                    <h6 class="text-success">Monthly Transfer flow</h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Referral Earnings</h4>
                </div>
                <div class="card-body">
                    <h4>₦{{ auth()->user()->ref_earning }}</h4>
                    <h5>Date to Transfer to Wallet</h5>
                    <h5 class="text-info">{{ $set->ref_earning_transfer_start }}</h5>
                    <h5 class="text-info">{{ $set->ref_earning_transfer_end }}</h5>
                    <h6 class="text-success">Monthly Transfer flow</h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Indirect Referral Earnings</h4>
                </div>
                <div class="card-body">
                    <h4>₦{{ auth()->user()->indirect_ref_earning }}</h4>
                    <h5>Date to Transfer to Wallet</h5>
                    <h5 class="text-info">{{ $set->indirect_ref_earning_transfer_start }}</h5>
                    <h5 class="text-info">{{ $set->indirect_ref_earning_transfer_end }}</h5>
                    <h6 class="text-success">Monthly Transfer flow</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Convert Extraction Balance to Rubic Wallet</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form action="{{ route('user.extractions.do_convert') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="amount">Amount</label>
                                                <input type="text" class="form-control" name="amount">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="pins">Transaction Code</label>
                                                <div class="d-flex justify-content-around mb-2" style="gap: 20px">
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
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
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
                    <h4 class="card-title">My Transfers</h4>
                </div>
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
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
                                                    <td>{{ $item->amount }}</td>
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
