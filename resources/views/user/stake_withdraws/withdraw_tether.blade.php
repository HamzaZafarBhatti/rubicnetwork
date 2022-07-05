@extends('user.layouts.master')
@section('title')
    Withdraw Rubic Stake Wallet to Tether USDT
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Rubic Stake Wallet
        @endslot
        @slot('title2')
            Withdrawal to Tether USDT
        @endslot
    @endcomponent
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rubic Stake Wallet to Tether USDT Withdrawal</h4>
                </div>
                <div class="card-body">
                    <h4>₦{{ auth()->user()->rubic_stake_wallet }}</h4>
                    <p>which is equivalent &asymp; to</p>
                    <h3><strong>${{ substr(auth()->user()->rubic_stake_wallet / $set->ngn_rate, 0, 9) }} USDT</strong>
                    </h3>
                    <p>as <span style="color: #0000ff;"><strong>Tether USDT</strong></span></p>
                    <br>
                    <h5 class="text-success">Funds in your STAKE WALLET which is already calculated in equivalent ≈ to USDT
                        can now be withdrawn to your set Tether USDT WALLET below.</h5>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Withdraw Stake Wallet to Tether USDT</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <form action="{{ route('user.stake_wallet.do_withdraw_to_tether') }}"
                                            method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="text-primary">Exchange Rate to Tether USDT Expected
                                                        Withdrawal from WALLET: NGN{{ $set->ngn_rate }}/$</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="amount">Tether Account</label>
                                                        <select name="account_no" class="form-control">
                                                            <option value="">Select Tether Account</option>
                                                            <option value="{{ auth()->user()->tether_address }}">
                                                                {{ auth()->user()->tether_address . ' - ' . auth()->user()->tether_network_label }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="amount">Amount ($)</label>
                                                        <input type="text" class="form-control" name="amount">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="pins">Enter Transaction Code</label>
                                                        <div class="d-flex justify-content-around mb-2 custom-gap">
                                                            <input type="text"
                                                                class="form-control code-input text-center" name="pins[]">
                                                            <input type="text"
                                                                class="form-control code-input text-center" name="pins[]">
                                                            <input type="text"
                                                                class="form-control code-input text-center" name="pins[]">
                                                            <input type="text"
                                                                class="form-control code-input text-center" name="pins[]">
                                                            <input type="text"
                                                                class="form-control code-input text-center" name="pins[]">
                                                            <input type="text"
                                                                class="form-control code-input text-center" name="pins[]">
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('user.profile.set_pin') }}">Click here to
                                                                set
                                                                transaction code</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary w-md">WITHDRAW To Tether USDT
                                                    Wallet</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
            @section('script')
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
