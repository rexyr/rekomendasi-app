@extends('layouts.guest')

@section('title')
    Login
@endsection

<!-- CUSTOM PAGE BACKGROUND KHUSUS HALAMAN LOGIN -->
@section('CustomBG') <div class="login-page-background"></div> @endsection

<!-- PAGE CONTENT -->
@section('content')
    <div class="login-container">
        <div class="welcome">
            {{-- <span>W e l c o m e !</span>
            <h2>Let's find the right choice<br>for your hair.</h2> --}}
        </div>
        <div class="login-area">
            <div class="card form-card">

                <h4>Log in to your account!</h4>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="{{ __('Email') }}" required value="{{ old('email') }}" autocomplete="off">
                        <i class="icon username-icon"></i>
                        @error('email')
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
                        <button type="submit" class="form-btn">Log in</button>
                    </div>

                </form>

                <h5>Don't have an account? <span><a href="{{ route('register') }}">Sign up!</a></span></h5>

            </div>
        </div>
    </div>

    {{-- <div class="card-body login-card-body">
        @if (Route::has('password.request'))
            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            </p>
        @endif
    </div> --}}

@endsection



{{-- OLD --}}
{{-- @section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Login') }}</p>

        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        @if (Route::has('password.request'))
            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            </p>
        @endif
    </div>
    
@endsection --}}
