@extends('user.layouts.master')
@section('title')
    Edit Profile
@endsection
@section('css')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Profile
        @endslot
        @slot('title2')
            Edit
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update your RubicNetwork Account Information</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form action="{{ route('user.profile.update_basic') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $user->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" class="form-control" name="username"
                                                    value="{{ $user->username }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $user->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">Phone</label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ $user->phone }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="country">Country</label>
                                                <input type="text" class="form-control" name="country"
                                                    value="{{ $user->country }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="city">City</label>
                                                <input type="text" class="form-control" name="city"
                                                    value="{{ $user->city }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="zip_code">Zip code</label>
                                                <input type="text" class="form-control" name="zip_code"
                                                    value="{{ $user->zip_code }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="address">Facebook Profile Link</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ $user->address }}"><p><strong><span style="color: #0000ff;">Update your Facebook Profile Link to allow RubicNetwork process your OUTPUT for your Extraction &amp; Viral Share Earnings per month.</span>&nbsp;</strong></p>
<p><span style="background-color: #ffff99;">Updating your Facebook Profile Link is compulsory for monthly disbursement.</span></p>
<p><span style="background-color: #ffff99;">Participating in VIRAL SHARE is also compulsory.</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Update Account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Bank Account Information</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form action="{{ route('user.profile.update_bank') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="bank_id">Bank Name</label>
                                                <select name="bank_id" class="form-select">
                                                    <option value="">Select Bank</option>
                                                    @foreach ($banks as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == $user->bank_id) selected @endif>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="account_name">Account Name</label>
                                                <input type="text" class="form-control" name="account_name"
                                                    value="{{ $user->account_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="account_no">Account Number</label>
                                                <input type="text" class="form-control" name="account_no"
                                                    value="{{ $user->account_no }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="account_type">Account Type</label>
                                                <select name="account_type" class="form-select">
                                                    <option value="">Select Bank</option>
                                                    <option value="current"
                                                        @if ('current' == $user->account_type) selected @endif>Current</option>
                                                    <option value="savings"
                                                        @if ('savings' == $user->account_type) selected @endif>Savings</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="pins">Enter Transaction Code</label>
                                                <div class="d-flex justify-content-around mb-2" style="gap: 20px">
                                                    <input type="text" class="form-control code-input text-center" name="pins[]">
                                                    <input type="text" class="form-control code-input text-center" name="pins[]">
                                                    <input type="text" class="form-control code-input text-center" name="pins[]">
                                                    <input type="text" class="form-control code-input text-center" name="pins[]">
                                                    <input type="text" class="form-control code-input text-center" name="pins[]">
                                                    <input type="text" class="form-control code-input text-center" name="pins[]">
                                                </div>
                                                <div>
                                                    <a href="{{ route('user.profile.set_pin') }}">Click here to set transaction code</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Update Bank Account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Change Profile Picture</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form action="{{ route('user.profile.update_avatar') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Update Profile Picture</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Tether USDT Wallet Address</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form action="{{ route('user.profile.update_tether_address') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="tether_network">Tether USDT Network</label>
                                        <select name="tether_network" class="form-control">
                                            <option value="">Select Network</option>
                                            <option value="trc" @if($user->tether_network == 'trc') selected @endif>TRC-20</option>
                                            <option value="bep" @if($user->tether_network == 'bep') selected @endif>BEP-20</option>
                                            <option value="erc" @if($user->tether_network == 'erc') selected @endif>ERC-20</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tether_address">Tether USDT Address</label>
                                        <input type="text" class="form-control" name="tether_address" value="{{ $user->tether_address }}">
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Update Wallet Address</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/user_assets/js/app.min.js') }}"></script>
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
