@extends('layouts.template2')

@section('content')
<div class="container">
    <div class="form-container">
        <!-- Reset Password Form -->
        <div id="reset-form">
            <div class="form-header">
                <!-- Application Logo -->
                <a href="/">
                    <img src="{{ asset('images/logo-colour.png') }}" />
                </a>
            </div>

            <div class="form-body">
                <!-- Title -->
                <h2>Reset Password</h2>
                <!-- Form -->
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <!-- Error Message -->
                        @error('password')
                            <div class="alert-box error form-error" role="alert">
                                <span>
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>
                    <!-- Confirm Password -->
                    <div class="form-group row">
                        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <!-- Reset -->
                    <div class="form-group row">
                        <button type="submit" class="btn-primary">
                            {{ __('Reset Password') }}
                        </button>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
