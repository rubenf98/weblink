@extends('layout')

@section('content')
<div class="AuthContainer">
    <div class="LoginContainer box-shadow">
        <h1>Sign In</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
                <input class="form-input" id="email" type="email" placeholder="E-Mail Address" name="email" required
                    autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input class="form-input" id="password" type="password" placeholder="Password" name="password" required
                    autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="submit-button">
                {{ __('Login') }}
            </button>


            <hr>

        </form>
        <div class="providers-login">
            <a href="/login/github">
                <div class="GitHub">
                    <img src="/images/icons/github.svg" alt="">
                    <p>Login with GitHub</p>
                </div>
            </a>
        </div>

    </div>

    <div class="separator">

    </div>
    <div class="RegisterContainer box-shadow">
        <h1>Sign Up</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <input id="name" type="text" class="form-input" @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" placeholder="Name" required autocomplete="name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <input id="email" type="email" class="form-input" @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" placeholder="E-Mail Address" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror



                <input id="password" placeholder="Password" type="password" class="form-input" @error('password')
                    is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror




                <input class="form-input" id="password-confirm" placeholder="Password confirmation" type="password"
                    name="password_confirmation" required autocomplete="new-password">

                <input class="form-input" id="b_day" placeholder="Birthday" type="date" name="b_day" required
                    autocomplete="b_day">

                <div class="radio-button">
                    <div>
                        <input type="radio" name="gender" value="1" checked> Male
                    </div>

                    <div>
                        <input type="radio" name="gender" value="0"> Female
                    </div>
                </div>


                <select class="form-input" name="country">
                    <option value="Portugal">Portugal</option>
                    <option value="US">US</option>
                    <option value="Spain">Spain</option>
                    <option value="France">France</option>
                </select>

            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="submit-button">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection