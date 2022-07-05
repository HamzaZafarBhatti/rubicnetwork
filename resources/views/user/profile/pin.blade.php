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
            Edit Transaction Code
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Transaction Code</h4>
                    <h4><strong>Default Transaction Code: <span style="background-color: #ffff99; color: #0000ff;">0 0 0 0 0 0</span></strong></h4>
<p><strong>Kindly change your default Transaction Code to any, easy-to-remember <span style="text-decoration: underline;">6 digits code</span> which you'll be prompted to use for transacting all through the RubicNetwork.</strong></p>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form action="{{ route('user.profile.update_pin') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="current_pins">Current Transaction Code</label>
                                                <div class="d-flex justify-content-around" style="gap: 20px">
                                                    <input type="text" class="form-control code-input text-center" name="current_pins[]">
                                                    <input type="text" class="form-control code-input text-center" name="current_pins[]">
                                                    <input type="text" class="form-control code-input text-center" name="current_pins[]">
                                                    <input type="text" class="form-control code-input text-center" name="current_pins[]">
                                                    <input type="text" class="form-control code-input text-center" name="current_pins[]">
                                                    <input type="text" class="form-control code-input text-center" name="current_pins[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="pins">New Transaction Code</label>
                                                <div class="d-flex justify-content-around" style="gap: 20px">
                                                    <input type="text" class="form-control code-input2 text-center" name="pins[]">
                                                    <input type="text" class="form-control code-input2 text-center" name="pins[]">
                                                    <input type="text" class="form-control code-input2 text-center" name="pins[]">
                                                    <input type="text" class="form-control code-input2 text-center" name="pins[]">
                                                    <input type="text" class="form-control code-input2 text-center" name="pins[]">
                                                    <input type="text" class="form-control code-input2 text-center" name="pins[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Update Transaction Code</button>
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
    <script src="{{ URL::asset('user_assets/js/pages/profile.init.js') }}"></script>
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

        const inputElements2 = [...document.querySelectorAll('input.code-input2')]
        inputElements2.forEach((ele, index) => {
            ele.addEventListener('keydown', (e) => {
                // if the keycode is backspace & the current field is empty
                // focus the input before the current. Then the event happens
                // which will clear the "before" input box.
                if (e.keyCode === 8 && e.target.value === '') inputElements2[Math.max(0, index - 1)].focus()
            })
            ele.addEventListener('input', (e) => {
                // take the first character of the input
                // this actually breaks if you input an emoji like 👨‍👩‍👧‍👦....
                // but I'm willing to overlook insane security code practices.
                const [first, ...rest] = e.target.value
                e.target.value = first ??
                    '' // first will be undefined when backspace was entered, so set the input to ""
                const lastInputBox = index === inputElements2.length - 1
                const insertedContent = first !== undefined
                if (insertedContent && !lastInputBox) {
                    // continue to input the rest of the string
                    inputElements2[index + 1].focus()
                    inputElements2[index + 1].value = rest.join('')
                    inputElements2[index + 1].dispatchEvent(new Event('input'))
                }
            })
        })
    </script>
@endsection
