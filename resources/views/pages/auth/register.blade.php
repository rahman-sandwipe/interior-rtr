@extends('layouts.guest')
@section('title')
    Register
@endsection
@section('content')
<div class="main-wrapper">
    <div class="account-content">
        {{-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> --}}
        <div class="container">
            <div class="account-box">
                <!-- Account Logo -->
                <div class="account-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/partials/dark_logo_67433a63c2d8f.png') }}" alt="{{ config('app.name') }}">
                    </a>
                </div>
                <!-- /Account Logo -->
                <div class="account-wrapper">
                    <h3 class="account-title">Create your account</h3>
                    <!-- Account Form -->
                    <form id="registerForm" method="POST" action="{{ route('register') }}" class="form-signin">
                        @csrf
                        <div class="form-group">
                            <label for="full_name" class="form-label">Name</label>
                            <input type="text" id="full_name" name="full_name" class="form-control"  placeholder="Enter your name" required autofocus>
                            @if ($errors->has('full_name'))
                                <span class="text-danger">{{ $errors->first('full_name') }}</span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    
                        <div class="form-group">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required>
                        </div>
                    
                        <div class="checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember" class="checkmark selection-desabled">Remember Me</label>
                        </div>
                    
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block" type="submit">Register</button>
                        </div>
                        <div class="account-footer">
                            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </form>
                    <!-- /Account Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection