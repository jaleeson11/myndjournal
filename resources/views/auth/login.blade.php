@extends('layouts.template2')

@section('content')
<div class="container">
    <div class="form-container">
        <!-- Login Form -->
        <div id="login-form">
            <div class="form-header">
                <!-- Application Logo -->
                <a href="/">
                    <img src="{{ asset('images/logo-colour.png') }}" />
                </a>
            </div>

            <div class="form-body">
                <!-- Title -->
                <h2>Login</h2>
                <!-- Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <!-- Error Message -->
                        @error('email')
                            <div class="alert-box error form-error" role="alert">
                                <span>
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </span>
                            </div>
                        @enderror   
                    </div>
                    <!-- Password -->
                    <div class="form-group row">
                        <label for="password" class="">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <!-- Error Message -->
                        @error('password')
                            <div class="invalid-feedback alert-box error form-error" role="alert">
                                <span>
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </span>
                            </div>
                        @enderror
                        <!-- Forgotten Password Link -->
                        @if (Route::has('password.request'))
                            <a class="password-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <!-- Login -->
                    <div class="form-group row">  
                        <button type="submit" class="btn-primary">
                            {{ __('Login') }}
                        </button>       
                    </div>

                    <!-- Link to Register Account -->
                    <div style="text-align:center;" class="form-group row">
                        <a class="sign-up-link" href="{{ route('register') }}">Don't have a Mynd Journal Account? Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
