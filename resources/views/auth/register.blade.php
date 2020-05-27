@extends('layouts.template2')

@section('content')
<div class="container">
    <div class="form-container">
        <!-- Register Form -->
        <div id="register-form">
            <div class="form-header">
                <!-- Application Logo -->
                <a href="/">
                    <img src="{{ asset('images/logo-colour.png') }}" />
                </a>
            </div>

            <div class="form-body">
                <!-- Title -->
                <h2>Sign Up</h2>
                <!-- Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div class="form-group row">
                        <label for="name" class="">Nickname</label>
                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <!-- Error Message -->
                        @error('name')
                            <div class="alert-box error form-error" role="alert">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <!-- Error Message -->
                        @error('email')
                            <div class="alert-box error form-error" role="alert">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- Password -->
                    <div class="form-group row">
                        <label for="password" class="">{{ __('Password') }}</label>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <!-- Error Message -->
                        @error('password')
                            <div class="alert-box error form-error" role="alert">
                                <i class="fas fa-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- Confirm Password -->
                    <div class="form-group row">
                        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <!-- Links to Terms & Privacy Policy -->
                    <div id="terms-conditions" class="form-group row">
                        <p>By registering an account you agree to our Terms of Use and Privacy Policy</p>
                        <a href="{{ route('terms') }}">View Terms of Use</a>
                        <a href="{{ route('privacypolicy') }}">View Privacy Policy</a>
                    </div>
                    <!-- Register -->
                    <div class="form-group row">
                        <div class="">
                            <button type="submit" class="btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
