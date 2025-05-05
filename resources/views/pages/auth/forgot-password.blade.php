@extends('layouts.guest')

@section('title') Reset Password @endsection

@section('content')
<div class="main-wrapper">
    <div class="account-content">
        <div class="container">
            
            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">{{ __('Reset Password?') }}</h3>
                    <p class="account-subtitle">{{ __('Enter your email to get a password reset link') }}</p>
                    
                    <!-- Account Form -->
                    <form action="{{ route() }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input name="email" id="email" class="form-control form-sm @error('email') is-invalid @enderror" type="text">
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror    
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
                        </div>
                        <div class="account-footer">
                            <p>{{ __('Remember your password?') }} <a href="{{ route('login') }}">{{  __('Login') }}</a></p>
                        </div>
                    </form>
                    <!-- /Account Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection