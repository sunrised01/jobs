@extends('layouts.employerlayout')
@section('content')
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Change Password</h3>
            <div class="text">Ready to jump back in?</div>
        </div>

        <!-- Ls widget -->
        <div class="ls-widget">
            <div class="widget-title">
                <h4>Change Password</h4>
            </div>

            <div class="widget-content">
                 <form class="default-form" method="POST" enctype="multipart/form-data" id="change-password">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row">
                        <!-- Input -->
                        <div class="form-group col-lg-7 col-md-12">
                            <label>Old Password </label>
                            <input type="password" name="old_password" id="old_password" data-type="password" data-required="yes" placeholder="">
                        </div>

                        <!-- Input -->
                        <div class="form-group col-lg-7 col-md-12">
                            <label>New Password</label>
                            <input type="password"  name="new_password" id="new_password" data-type="password" data-required="yes" placeholder="">
                        </div>

                        <!-- Input -->
                        <div class="form-group col-lg-7 col-md-12">
                            <label>Confirm Password</label>
                            <input type="password"  name="password_confirmation" id="password_confirmation" data-type="password" data-required="yes" placeholder="">
                        </div>

                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                            <button type="submit" class="theme-btn btn-style-one">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection