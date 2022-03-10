@extends('layouts.auth')

@section('content')

<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">Welcome Back</h1>
                    <p class="text-medium">
                        Sign in to your Existing account to continue
                    </p>
                </div>
                <div class="cover-image">
                    <img src="{{ asset('assets/images/resource/signin-image.svg') }}" alt="" />
                </div>
                <div class="shape-image">
                    <img src="{{ asset('assets/images/resource/shape.svg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="signup-wrapper">
            <div class="form-wrapper">
                <div class="login-form default-form">
                    <div class="form-inner">
                        <h3>Login to Superio</h3>
                        <p class="text-sm mb-25">
                            Start creating the best possible user experience for you
                            customers.
                        </p>
                
                
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label>{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Password') }}</label>
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="field-outer">
                                    <div class="input-group checkboxes square">
                                        <input type="checkbox" name="remember" value="" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember" class="remember"><span class="custom-checkbox"></span> {{ __('Remember Me') }}</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="pwd">{{ __('Forgot Your Password?') }}</a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one" type="submit" name="log-in"> {{ __('Log In') }}</button>
                            </div>
                        </form>
                        <div class="bottom-box">
                            <div class="text">{{ __('Don\'t have an account?') }} <a href="{{ route('register') }}" class="signup">{{ __('Signup') }}</a></div>
                            <div class="divider"><span>{{ __('or') }}</span></div>
                            <div class="btn-box row">
                                <div class="col-lg-6 col-md-12">
                                    <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> {{ __('Log In via Facebook') }}</a>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> {{ __('Log In via Gmail') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection