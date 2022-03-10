@php  $currentURL = \Request::segment(2); @endphp
<div class="sidebar-inner">
    <ul class="navigation">
        @if(Auth::user()->role == 'employer')
            <li class="{{ ($currentURL == 'dashboard' ? 'active' : '') }}"><a href="{{ route('employer.dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
            <li class="{{ ($currentURL == 'profile' ? 'active' : '') }}" ><a href="{{ route('employer.profile') }}"><i class="la la-user-tie"></i>Company Profile</a></li>
            <li class="{{ ($currentURL == 'postjob' ? 'active' : '') }}" ><a href="{{ route('employer.postjob') }}"><i class="la la-paper-plane"></i>Post a New Job</a></li>
            <li class="{{ ($currentURL == 'jobs' ? 'active' : '') }}" ><a href="{{ route('employer.jobs') }}"><i class="la la-briefcase"></i> Manage Jobs </a></li>
            <li class="{{ ($currentURL == 'applicants' ? 'active' : '') }}" ><a href="{{ route('employer.applicants') }}"><i class="la la-file-invoice"></i> All Applicants</a></li>
            <li class="{{ ($currentURL == 'changepassword' ? 'active' : '') }}"><a href="{{ route('employer.changepassword') }}"><i class="la la-lock"></i>Change Password</a></li>
        @elseif(Auth::user()->role == 'candidate')
            <li class="{{ ($currentURL == 'dashboard' ? 'active' : '') }}"><a href="{{ route('account.dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
            <li class="{{ ($currentURL == 'profile' ? 'active' : '') }}"><a href="{{ route('account.profile') }}"><i class="la la-user-tie"></i>My Profile</a></li>
            <li class="{{ ($currentURL == 'resume' ? 'active' : '') }}"><a href="{{ route('account.resume') }}"><i class="la la-file-invoice"></i>My Resume</a></li>
            <li class="{{ ($currentURL == 'applied-jobs' ? 'active' : '') }}"><a href="{{ route('account.applied-jobs') }}"><i class="la la-briefcase"></i> Applied Jobs </a></li>
            <li class="{{ ($currentURL == 'job-alerts' ? 'active' : '') }}"><a href="{{ route('account.job-alerts') }}"><i class="la la-bell"></i>Job Alerts</a></li>
            <li class="{{ ($currentURL == 'cv-manager' ? 'active' : '') }}"><a href="{{ route('account.cv-manager') }}"><i class="la la-file-invoice"></i> CV manager</a></li>
            <li class="{{ ($currentURL == 'messages' ? 'active' : '') }}"><a href="{{ route('account.messages') }}"><i class="la la-comment-o"></i>Messages</a></li>
            <li class="{{ ($currentURL == 'change-password' ? 'active' : '') }}"><a href="{{ route('account.change-password') }}"><i class="la la-lock"></i>Change Password</a></li>
        @else
            <li class="{{ ($currentURL == 'dashboard' ? 'active' : '') }}"><a href="{{ route('account.dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
                <li class="{{ ($currentURL == 'profile' ? 'active' : '') }}"><a href="{{ route('account.profile') }}"><i class="la la-user-tie"></i>My Profile</a></li>
                <li class="{{ ($currentURL == 'resume' ? 'active' : '') }}"><a href="{{ route('account.resume') }}"><i class="la la-file-invoice"></i>My Resume</a></li>
                <li class="{{ ($currentURL == 'applied-jobs' ? 'active' : '') }}"><a href="{{ route('account.applied-jobs') }}"><i class="la la-briefcase"></i> Applied Jobs </a></li>
                <li class="{{ ($currentURL == 'job-alerts' ? 'active' : '') }}"><a href="{{ route('account.job-alerts') }}"><i class="la la-bell"></i>Job Alerts</a></li>
                <li class="{{ ($currentURL == 'cv-manager' ? 'active' : '') }}"><a href="{{ route('account.cv-manager') }}"><i class="la la-file-invoice"></i> CV manager</a></li>
                <li class="{{ ($currentURL == 'messages' ? 'active' : '') }}"><a href="{{ route('account.messages') }}"><i class="la la-comment-o"></i>Messages</a></li>
                <li class="{{ ($currentURL == 'change-password' ? 'active' : '') }}"><a href="{{ route('account.change-password') }}"><i class="la la-lock"></i>Change Password</a></li>
        @endif
       
       
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="la la-sign-out"></i>Logout</a></li>
    </ul>
</div>