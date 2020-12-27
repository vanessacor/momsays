@extends('layouts.app')

@section('content')
<div class="title">
    <h2>Welcome to Mom Says</h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login card">
                <div class=" login-title card-header">
                    <h3>Login</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="login-password col-md-4">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                @if (Route::has('password.request'))
                                <a class="col-form-label text-md-left" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif

                            </div>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="login-buttons form-group">
                            <button type="submit" class="btn">
                                {{ __('Login') }}
                            </button>


                        </div>
                    </form>
                    <div class="register">
                        <p>New User?</p>
                        @if (Route::has('register'))

                        <a href="{{ route('register') }}">SignUP</a>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection