@extends('layouts.template2')

@section('content')
<div class="container">
    <div class="form-container">
        <!-- Forgot Password Form -->
        <div id="email-form">
            <div class="form-header">
                <!-- Application Logo -->
                <a href="/">
                    <img src="{{ asset('images/logo-colour.png') }}" />
                </a>
            </div>           
            <div class="form-body">
                <!-- Alert Message -->
                @if (session('status'))
                    <div class="alert-box success form-success" role="alert">
                        <i class="fas fa-check-circle"></i>{{ session('status') }}
                    </div>
                @endif
                <!-- Title -->
                <h2>Reset Password</h2>
                <!-- Form -->
                <form method="POST" action="{{ route('password.email') }}">
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
                    <!-- Send Password Reset Email -->
                    <div class="form-group">
                        <div class="">
                            <button type="submit" class="btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
