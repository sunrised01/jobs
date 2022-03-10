@extends('layouts.employerlayout')

@section('content')


<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Company Profile!</h3>
            <div class="text">Ready to jump back in?</div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>My Profile</h4>
                        </div>

                        <div class="widget-content">

                            <div class="uploading-outer">
                                <div class="uploadButton">
                                    <form method="POST" enctype="multipart/form-data" id="upload-logo">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input class="uploadButton-input" type="file" name="attachments" accept="image/*" id="upload_logo" />
                                        <div class="logo_photo">
                                            @if(get_user_meta(Auth::user()->id, 'user_logo_file') !== false)
                                            <img src="{{ url('uploads/'.get_user_meta(Auth::user()->id, 'user_logo_file')) }}" />
                                            @else
                                            <label class="uploadButton-button ripple-effect" for="upload">Browse Logo</label>
                                            @endif
                                        </div>

                                    </form>
                                </div>
                                <div class="text">Max file size is 1MB, Suitable files are .jpg & .png</div>
                            </div>

                            <div class="uploading-outer">
                                <div class="uploadButton">
                                    <form method="POST" enctype="multipart/form-data" id="upload-cover">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input class="uploadButton-input" type="file" name="attachments" accept="image/*" id="upload_cover" />
                                        <div class="cover_photo">
                                            @if(get_user_meta($user_data->id, 'user_cover_file') !== false)
                                            <img src="{{ url('uploads/'.get_user_meta(Auth::user()->id, 'user_cover_file')) }}" />
                                            @else
                                            <label class="uploadButton-button ripple-effect" for="upload">Browse Cover</label>
                                            @endif
                                        </div>

                                    </form>
                                </div>
                                <div class="text">Max file size is 1MB, Suitable files are .jpg & .png</div>
                            </div>


                            <form class="default-form" method="POST" enctype="multipart/form-data" id="update-info">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="row">
                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Company Name</label>
                                        <input type="text" name="company_name" placeholder="Company Name" value="{{ get_user_meta($user_data->id, 'company_name') }}">
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Email Address</label>
                                        <input type="text" readonly placeholder="Email Address" value="{{ $user_data->email }}">
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Phone</label>
                                        <input type="text" name="phone_number" value="{{ get_user_meta($user_data->id, 'phone_number') }}" placeholder="0 123 456 7890">
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Website</label>
                                        <input type="text" name="website" value="{{ get_user_meta($user_data->id, 'website') }}" placeholder="www.invision.com">
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Team Size</label>
                                        <select class="chosen-select" name="team_size">
                                            <option value="50" @php echo (get_user_meta($user_data->id, 'team_size') == 50 ? 'selected' : '') @endphp>50</option>
                                            <option value="100" @php echo (get_user_meta($user_data->id, 'team_size') == 100 ? 'selected' : '') @endphp >100</option>
                                            <option value="200" @php echo (get_user_meta($user_data->id, 'team_size') == 200 ? 'selected' : '') @endphp >200</option>
                                            <option value="300" @php echo (get_user_meta($user_data->id, 'team_size') == 300 ? 'selected' : '') @endphp >300</option>
                                            <option value="500" @php echo (get_user_meta($user_data->id, 'team_size') == 500 ? 'selected' : '') @endphp >500</option>
                                        </select>
                                    </div>

                                    <!-- Search Select -->
                                    <!-- <div class="form-group col-lg-6 col-md-12">
                                        <label>Multiple Select boxes </label>
                                        <select data-placeholder="Categories" class="chosen-select multiple" multiple tabindex="4">
                                            <option value="Banking">Banking</option>
                                            <option value="Digital&Creative">Digital & Creative</option>
                                            <option value="Retail">Retail</option>
                                            <option value="Human Resources">Human Resources</option>
                                            <option value="Management">Management</option>
                                        </select>
                                    </div> -->

                                    <!-- Input -->
                                    <!-- <div class="form-group col-lg-6 col-md-12">
                                        <label>Allow In Search & Listing</label>
                                        <select class="chosen-select">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div> -->

                                    <!-- About Company -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>About Company</label>
                                        <textarea name="user_bio" placeholder="Spent several years working on sheep on Wall Street.">{{ get_user_meta($user_data->id, 'user_bio') }}</textarea>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <button class="theme-btn btn-style-one">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Social Network</h4>
                        </div>

                        <div class="widget-content">
                            <form class="default-form" method="POST" enctype="multipart/form-data" id="update-social-info">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="row">
                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook_url" value="{{ get_user_meta($user_data->id, 'facebook_url') }}" placeholder="">
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Twitter</label>
                                        <input type="text" name="twitter_url" value="{{ get_user_meta($user_data->id, 'twitter_url') }}" placeholder="">
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Linkedin</label>
                                        <input type="text" name="linkedin_url" value="{{ get_user_meta($user_data->id, 'linkedin_url') }}" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Google</label>
                                        <input type="text" name="google_url" value="{{ get_user_meta($user_data->id, 'google_url') }}" placeholder="">
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <button class="theme-btn btn-style-one">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Contact Information</h4>
                        </div>

                        <div class="widget-content">
                            <form class="default-form" method="POST" enctype="multipart/form-data" id="update-contact-info">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="row">
                                    <!-- Input -->
                                    <div class="form-group col-lg-4 col-md-12">
                                        <label>Country</label>

                                        <select id="country-dd" name="country" data-type="select" data-required="yes" class="form-control">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $data)
                                                @php $select = (get_user_meta($user_data->id, 'country') == $data->id ? 'selected' : '') @endphp
                                                <option value="{{$data->id}}" {{ $select }}>
                                                    {{$data->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-4 col-md-12">
                                        <label>State</label>
                                        <select id="state-dd" name="state" data-type="select" data-required="yes" class="form-control">

                                            @if(!empty($states))
                                                <option value="">Select State</option>
                                                @foreach ($states as $data)
                                                @php $select = (get_user_meta($user_data->id, 'state') == $data->id ? 'selected' : '') @endphp
                                                    <option value="{{$data->id}}" {{ $select }}>
                                                        {{$data->name}}
                                                    </option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12">
                                        <label>City</label>
                                        <select id="city-dd" name="city" data-type="select" data-required="yes" class="form-control">
                                            @if(!empty($cities))
                                                <option value="">Select City</option>
                                                @foreach ($cities as $data)
                                                @php $select = (get_user_meta($user_data->id, 'city') == $data->id ? 'selected' : '') @endphp
                                                    <option value="{{$data->id}}" {{ $select }} >
                                                        {{$data->name}}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Complete Address</label>
                                        <input type="text" name="company_address" value="{{ get_user_meta($user_data->id, 'company_address') }}" data-type="select" data-required="yes" placeholder="329 Queensberry Street, North Melbourne VIC 3051, Australia.">
                                    </div>


                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="theme-btn btn-style-one">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</section>

@endsection