@extends('user.layouts.master')
@section('title')
    Withdraw Rubic NGN to Bank from Wallet
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Rubic Wallet
        @endslot
        @slot('title2')
            Withdraw to Bank
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Withdraw Rubic NGN to Bank from Wallet</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form action="{{ route('user.wallet.do_withdraw') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="amount">Bank Account</label>
                                                <select name="account_no" class="form-control">
                                                    <option value="">Select Bank Account</option>
                                                    <option value="{{ $account['account_no'] }}">{{ $account['account'] }}</option>
                                                </select>
                                            </div>
                                        </div>
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
