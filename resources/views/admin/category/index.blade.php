@extends('layouts.adminlayout')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            
                <div class="col-xl-5 col-md-6">
                <div class="card-box">
                    <h4>Add New Category</h4>
                    <form id="addCategory" method="post" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" data-type="text" data-required="yes" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                        </div>
                      
                        <button type="submit" class="btn btn-primary">Add New Category</button>
                    </form>
                </div>
            </div>
            <div class="col-xl-7 col-md-6">
                <div class="card-box">
                    <table id='categoryTable' class="table table-bordered mb-0" width='100%'>
                        <thead class="thead-light">
                            <tr>
                                <td>Title</td>
                                <td>Slug</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        callCategoryListing();
    });

    function callCategoryListing(){
        $('#categoryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('admin.fetch-categories')}}",
            columns: [{
                    data: 'title'
                },
                {
                    data: 'slug'
                },
                {
                    data: 'action',
                    width: 150
                }
            ]
        });
    }
</script>
@endsection