@extends('layouts.employerlayout')

@section('content')

<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Post a New Job!</h3>
            <div class="text">Ready to jump back in?</div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Post Job</h4>
                        </div>

                        <div class="widget-content">

                            <div class="post-job-steps">
                                <div class="step">
                                    <span class="icon flaticon-briefcase"></span>
                                    <h5>Job Detail</h5>
                                </div>

                                <div class="step">
                                    <span class="icon flaticon-money"></span>
                                    <h5>Package & Payments</h5>
                                </div>

                                <div class="step">
                                    <span class="icon flaticon-checked"></span>
                                    <h5>Confirmation</h5>
                                </div>
                            </div>

                            <form class="default-form" method="POST" enctype="multipart/form-data" id="add-job">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="row">
                                    <!-- Input -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Job Title</label>
                                        <input type="text" name="title" id="title" placeholder="Title"  data-type="text" data-required="yes">
                                    </div>

                                    <!-- About Company -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Job Description</label>
                                        <textarea placeholder="" name="job_description" id="job_description"></textarea>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Job Type</label>
                                        <select class="chosen-select" name="job_type" id="job_type" data-type="select" data-required="yes">
                                            <option value="">Select</option>
                                            @foreach(getJobType() as $key => $value)
                                            <option value="{{ $key }}">{{$value}}</option>
                                            @endforeach                                          
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Categories</label>
                                        <select class="chosen-select" name="categories[]" id="categories" multiple>
                                            <option>Select</option>
                                            <option>Banking</option>
                                            <option>Digital & Creative</option>
                                            <option>Retail</option>
                                            <option>Human Resources</option>
                                            <option>Management</option>
                                        </select>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Offered Salary</label>
                                        <input type="text" name="offered_salary" id="offered_salary" placeholder="Offered Salary"  data-type="text" data-required="yes">

                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Experience</label>
                                        <input type="text" name="experience" id="experience" placeholder="Experience"  data-type="text" data-required="yes">
                                    </div>
                                  
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Qualification</label>
                                        <input type="text" name="qualification" id="qualification" placeholder="Qualification"  data-type="text" data-required="yes">
                                    </div>

                                  

                                    <div class="form-group col-lg-6 col-md-12">
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
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>State</label>
                                        <select id="state-dd" name="state" data-type="select" data-required="yes" class="form-control">
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>City</label>
                                        <select id="city-dd" name="city" data-type="select" data-required="yes" class="form-control">
                                            
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 text-right">
                                        <button class="theme-btn btn-style-one">Submit</button>
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