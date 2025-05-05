@extends('layouts.guest')
@section('title', 'Login')
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
                    <h3 class="account-title">Access your account </h3>
                    <!-- Account Form -->
                    <form id="loginForm" method="POST" action="{{ route('login') }}" class="form-signin">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">Email</label>
                            <input type="email" id="email" name="email" class="form-control m-0" placeholder="Enter your email" required>
                            <span class="text-danger" id="emailError"></span>
                        </div>
                    
                        <div class="form-group password-group">
                            <div class="password-header">
                                <label for="password" class="form-label">Password</label>
                                <div class="forgot-password">
                                    <a href="{{ route('forget.password') }}" class="forgot-link">Forgot your password?</a>
                                </div>
                            </div>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                            <span class="text-danger" id="passwordError"></span>
                        </div>
                        
                        <div class="checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember" class="checkmark selection-desabled">Remember Me</label>
                        </div>
                    
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </div>
                        <div class="account-footer">
                            <p> Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                        </div>
                    </form>
                    <!-- /Login Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection