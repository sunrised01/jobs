@extends('layouts.auth')

@section('content')


<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">Get Started</h1>
                    <p class="text-medium">
                    Start creating the best possible user experience
                                        <br className="d-sm-block" />
                                        for you customers.
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
                        <h3>Create a Free Superio Account</h3>
                        <p class="text-sm mb-25">
                            Start creating the best possible user experience for you
                            customers.
                        </p>
                
                
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <div class="btn-box row">
                                    <div class="col-lg-6 col-md-12">
                                        <label class="theme-btn btn-style-four active-role"><i class="la la-user"></i><input type="radio" name="role" class="role-btn" value="candidate" checked>Candidate</label>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label class="theme-btn btn-style-four"><i class="la la-briefcase"></i><input type="radio" name="role" class="role-btn" value="employer">Employer</label>
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address"  autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"  autocomplete="new-password">
                            </div>

                           

                            <div class="form-group">
                                <button class="theme-btn btn-style-one" type="submit" name="log-in"> {{ __('Register') }}</button>
                            </div>
                        </form>
                        <div class="bottom-box">
                            <div class="text">{{ __('Already have an account?') }} <a href="{{ route('login') }}" class=" signup">{{ __('Log In') }}</a></div>
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