@extends('layouts.template3')

@section('content')
    <main-content>
        <!-- Breadcrumbs -->
        {{ Breadcrumbs::render('dashboard') }}
        <div class="container">
            <!-- Alert Messages -->
            @if(session()->has('success'))
                <div class="alert-box success">
                    <h3><i class="fas fa-check-circle"></i>Success!</h3>
                    {{ session()->get('success') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert-box error">
                    <h3><i class="fas fa-exclamation-circle"></i>Error</h3>
                    {{ session()->get('error') }}
                </div>
            @endif
            <!-- Title -->
            <h1>My Account</h1>
            <!-- Account Info Form -->
            <div id="account-form">
                <div class="form-body">
                    <h2>Basic Information</h2>
                    <form method="post" action="{{route('users.update', $user)}}">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}

                        <div class="form-group">
                            <label for="name" class="">Nickname</label>
                            <input type="text" class="@error('name') is-invalid @enderror" name="name"  value="{{ $user->name }}" />
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>
                            <input type="email" class="@error('email') is-invalid @enderror" name="email"  value="{{ $user->email }}" />
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Password') }}</label>
                            <input type="password" class="@error('password') is-invalid @enderror" name="password" />
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                            <input type="password" class="" name="password_confirmation" />
                        </div>

                        <button type="submit" class="btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main-content>
@endsection