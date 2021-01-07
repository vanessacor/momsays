@extends('layouts.app')

@section('content')

<div class="login-card">

    <div class="login-card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <fieldset >
                <legend class="login-card-header">
                    Login
                </legend>
                <div class="login-card-input">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="login-card-input">

                    <div class="password">
                        <label for="password">{{ __('Password') }}</label>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif

                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="login-card-input">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="login-card-buttons">
                    <button type="submit" class="btn">
                        {{ __('Login') }}
                    </button>


                </div>
            </fieldset>

        </form>
        <div class="login-card-register">
            <p>New User?</p>
            @if (Route::has('register'))

            <a href="{{ route('register') }}">SignUP</a>

            @endif
        </div>
    </div>
</div>
@endsection