@extends('layouts.employerlayout')

@section('content')

<section class="user-dashboard">
    <div class="dashboard-outer">
        

        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Edit Job</h4>
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

                            <form class="default-form" method="POST" enctype="multipart/form-data" id="edit-job">
                                
                                <input type="hidden" name="id" value="{{ $job_data->id }}">
                                <div class="row">
                                    <!-- Input -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Job Title</label>
                                        <input type="text" name="title" id="title" value="{{ $job_data->title }}" placeholder="Title"  data-type="text" data-required="yes">
                                    </div>

                                    <!-- About Company -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>Job Description</label>
                                        <textarea placeholder="" name="job_description" id="job_description">{{ $job_data->job_description }}</textarea>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Job Type</label>
                                        <select class="chosen-select" name="job_type" id="job_type" data-type="select" data-required="yes">
                                            <option value="">Select</option>
                                            @foreach(getJobType() as $key => $value)
                                            @php $select = ''; @endphp;
                                                @if( $job_data->job_type == $key)
                                                    $select = 'sele';
                                                @endif

                                                @php $select = ($job_data->job_type == $key ? 'selected' : '') @endphp
                                                <option value="{{ $key }}" {{ $select }}>{{$value}}</option>
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
                                        <input type="text" name="offered_salary" id="offered_salary" placeholder="Offered Salary" value="{{ $job_data->offered_salary }}"  data-type="text" data-required="yes">

                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Experience</label>
                                        <input type="text" name="experience" id="experience" placeholder="Experience" value="{{ $job_data->experience }}"  data-type="text" data-required="yes">
                                    </div>
                                  
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Qualification</label>
                                        <input type="text" name="qualification" id="qualification" placeholder="Qualification" value="{{ $job_data->qualification }}"  data-type="text" data-required="yes">
                                    </div>

                                  

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Country</label>

                                        <select id="country-dd" name="country" data-type="select" data-required="yes" class="form-control">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $data)
                                                @php $select = ($job_data->country == $data->id ? 'selected' : '') @endphp
                                                <option value="{{$data->id}}" {{ $select }} >
                                                        {{$data->name}}
                                                    </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>State</label>
                                        <select id="state-dd" name="state" data-type="select" data-required="yes" class="form-control">
                                            @if(!empty($states))
                                                <option value="">Select State</option>
                                                @foreach ($states as $data)
                                                @php $select = ($job_data->state ==  $data->id ? 'selected' : '') @endphp
                                                    <option value="{{$data->id}}" {{ $select }} >
                                                        {{$data->name}}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>City</label>
                                        <select id="city-dd" name="city" data-type="select" data-required="yes" class="form-control">
                                            @if(!empty($cities))
                                                <option value="">Select City</option>
                                                @foreach ($cities as $data)
                                                @php $select = ($job_data->city ==  $data->id ? 'selected' : '') @endphp
                                                 <option value="{{$data->id}}" {{ $select }} >
                                                        {{$data->name}}
                                                    </option>
                                                @endforeach
                                            @endif
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