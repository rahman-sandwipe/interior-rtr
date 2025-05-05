@extends('back.auth.master')
@section('title') Set your new password @endsection
@section('content')
<div class="main-wrapper">
    <div class="account-content">
        <div class="container">
            
            <div class="account-box">
                <div class="account-wrapper">
                    <p class="account-subtitle">{{ __('Set your new password') }}</p>
                    
                    <!-- Account Form -->
                    <form method="POST" action="{{ route('reset.password.post') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label id="email">{{ __('Email Address') }}</label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="text">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif    
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input class="form-control @error('password') is-invalid @enderror" name="password" id="password" type="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif    
                        </div>
                        <div class="form-group">
                            <label>{{ __('Repeat Password') }}</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" type="password">
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif    
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">{{ __('Reset Password') }}</button>
                        </div>
                        <div class="account-footer">
                            <p>{{ __('Already have an account?') }} <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
                        </div>
                    </form>
                    <!-- /Account Form -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->
@endsection