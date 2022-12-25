@extends('layouts.guest')

@section('title')
    Register
@endsection

@section('CustomBG') <div class="register-page-background"></div> @endsection

@section('content')

    <div class="signup-area">

        <div class="card form-card">

            <h4>Create your account!</h4>

            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="input-group">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Name') }}" required value="{{ old('name') }}" autocomplete="off">
                    <i class="icon user-icon"></i>
                    @error('name')
                        <i class="icon error-icon"></i>
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="{{ __('Email') }}" required value="{{ old('email') }}" autocomplete="off">
                    <i class="icon email-icon"></i>
                    @error('email')
                        <i class="icon error-icon"></i>
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        placeholder="{{ __('Phone') }}" required value="{{ old('phone') }}" autocomplete="off">
                    <i class="icon phone-icon"></i>
                    @error('phone')
                        <i class="icon error-icon"></i>
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        placeholder="{{ __('Username') }}" required value="{{ old('username') }}" autocomplete="off">
                    <i class="icon username-icon"></i>
                    @error('username')
                        <i class="icon error-icon"></i>
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{ __('Password') }}" required>
                    <i class="icon password-icon"></i>
                    @error('password')
                        <i class="icon error-icon"></i>
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="{{ __('Password Confirmation') }}" required>
                    <i class="icon password-icon"></i>
                    @error('password_confirmation')
                        <i class="icon error-icon"></i>
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group">
                    <button type="submit" class="form-btn">Sign up</button>
                </div>

            </form>

            <h5>Already have an account? <span><a href="{{ route('login') }}">Log in!</a></span></h5>

        </div>

    </div>

@endsection
