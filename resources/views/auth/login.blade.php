@extends('layout/app')

@section('title', 'Mic Ride - Login Page')

@section('container')

<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="my__account__wrapper">

                    <h3 class="account__title">Login</h3>
                    <form method="POST" action="{{ route('login.postLogin') }}">
                        @csrf
                        <div class="account__form">
                            <div class="input__box">
                                <label>Username or email address <span>*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input__box">
                                <label>Password<span>*</span></label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form__btn">
                                <button>Login</button>
                                <label class="label-for-checkbox">
                                    <input id="remember" class="input-checkbox" name="remember" value="forever"
                                        type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <span>Remember me</span>
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                            <a class="forget_pass" href="{{ route('password.request') }}">Lost your password?</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End My Account Area -->

@endsection