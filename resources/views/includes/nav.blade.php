<!-- Main box -->
<div class="main-box">
    <!--Nav Outer -->
    <div class="nav-outer">
        <div class="logo-box">
            <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.svg') }}" alt="" title=""></a></div>
        </div>

        <nav class="nav main-menu">
            <ul class="navigation" id="navbar">
                <li class="current">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="">
                    <a href="{{ route('home') }}">Jobs Listing</a>
                </li>
                <li class="">
                    <a href="{{ route('home') }}">Employers</a>
                </li>
                <li class="">
                    <a href="{{ route('home') }}">Candidates</a>
                </li>
                <li class="">
                    <a href="{{ route('home') }}">Blog</a>
                </li>

                <!-- Only for Mobile View -->
                <li class="mm-add-listing">
                    <a href="#" class="theme-btn btn-style-one">Job Post</a>
                    <span>
                        <span class="contact-info">
                            <span class="phone-num"><span>Call us</span><a href="tel:1234567890">123 456 7890</a></span>
                            <span class="address">329 Queensberry Street, North Melbourne VIC <br>3051, Australia.</span>
                            <a href="mailto:support@superio.com" class="email">support@superio.com</a>
                        </span>
                        <span class="social-links">
                            <a href="#"><span class="fab fa-facebook-f"></span></a>
                            <a href="#"><span class="fab fa-twitter"></span></a>
                            <a href="#"><span class="fab fa-instagram"></span></a>
                            <a href="#"><span class="fab fa-linkedin-in"></span></a>
                        </span>
                    </span>
                </li>
            </ul>
        </nav>
        <!-- Main Menu End-->
    </div>

    <div class="outer-box">
        <!-- Add Listing -->
        <!-- <a href="#" class="upload-cv"> Upload your CV</a> -->
        <!-- Login/Register -->
        <div class="btn-box">
            @guest
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="theme-btn btn-style-three">{{ __('Login') }} </a>
            @endif

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="theme-btn btn-style-three">{{ __('Register') }} </a>

            @endif
            @else


            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->role == 'employer')
                        <a class="dropdown-item" href="{{ route('employer.dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                        @elseif(Auth::user()->role == 'admin')
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                        @else
                        <a class="dropdown-item" href="{{ route('account.dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            @endguest

            <!-- <a href="dashboard-post-job.html" class="theme-btn btn-style-one">Job Post</a> -->
        </div>
    </div>
</div>

<!-- Mobile Header -->
<div class="mobile-header">
    <div class="logo"><a href="{ route('home') }"><img src="{{ asset('assets/images/logo.svg') }}" alt="" title=""></a></div>

    <!--Nav Box-->
    <div class="nav-outer clearfix">

        <div class="outer-box">
            <!-- Login/Register -->
            <div class="login-box">
                <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
            </div>

            <a href="#nav-mobile" class="mobile-nav-toggler"><span class="flaticon-menu-1"></span></a>
        </div>
    </div>
</div>

<!-- Mobile Nav -->
<div id="nav-mobile"></div>