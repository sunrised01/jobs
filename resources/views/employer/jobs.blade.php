@extends('layouts.employerlayout')

@section('content')

<section class="user-dashboard">
    <div class="dashboard-outer">
        <!-- <div class="upper-title-box">
            <h3>All Jobs</h3>
        </div> -->

        <div class="row">
            <div class="col-lg-12">
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>All Jobs</h4>
                    </div>
                    <div class="widget-content">
                    <div class="table-outer">
                        <table  id='jobTable' class="default-table manage-job-table" width='100%'>
                            <thead class="thead-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Job Type</th>
                                    <th>Applications</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>   
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>


@endsection