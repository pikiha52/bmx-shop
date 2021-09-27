@extends('layout/app')

@section('container')

<br>
<br>
<br>
<br>
<br>
<br>

<div class="col-lg-6 col-12">
    <div class="my__account__wrapper">
        <h3 class="account__title">Register</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="account__form">
            <div class="input__box">
                    <label>Name <span>*</span></label>
                    <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input__box">
                    <label>Email address <span>*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input__box">
                    <label>Password<span>*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input__box">
                    <label>Password Confirm<span>*</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                </div>
                <div class="form__btn">
                    <button>Register</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
