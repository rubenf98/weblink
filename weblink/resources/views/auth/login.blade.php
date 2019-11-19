@extends('layout')

@section('content')
<div class="AuthContainer">
    <div class="LoginContainer box-shadow">
        <h1>Sign In</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
                <input id="email" type="email" placeholder="E-Mail Address" name="email" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password" type="password" placeholder="Password" class="form-control" name="password"
                    required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="center">
                <div class="checkbox">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        {{ __('Remember me') }}
                    </label>
                </div>


                @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>


            <button type="submit" class="submit-button">
                {{ __('Login') }}
            </button>


        </form>
    </div>

    <div class="separator">

    </div>
    <div class="RegisterContainer box-shadow">
        <h1>Sign Up</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">


                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" placeholder="Name" required autocomplete="name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required
                        autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <input id="password" placeholder="Password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <input id="password-confirm" placeholder="Password confirmation" type="password"
                        class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
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