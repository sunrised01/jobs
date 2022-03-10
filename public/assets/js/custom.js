$(document).ready(function(){

	$('#upload_logo').on('change', function(){
		$('#upload-logo').submit();
	});
	
	$('#upload-logo').submit(function(){
		var formData = new FormData(this);
		var ajaxurl = base_url+'/upload-logo';
		$('.ajax-loader').show();

		var request = $.ajax({
			url: ajaxurl,
			type: "POST",
			headers: {
				'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
			},
			data: formData,
			processData: false,
			contentType: false,
			dataType: "json"
		});
		request.done(function(response) {
		   $('.ajax-loader').hide();
			if(response.sts == false){
				toastr["error"](response.msg);
			} 
			else{
				toastr["success"]('Logo has been updated!');
				$('.logo_photo').html('<img src="'+response.file_url+'">')
			}
		});
		request.fail(function(jqXHR, textStatus, thrownError) {
			$('.ajax-loader').hide();
			var error = JSON.parse(jqXHR.responseText);
			toastr["error"]('Request failed: '+ error.message);
		}); 

		return false;
	});

	$('#upload_cover').on('change', function(){
		$('#upload-cover').submit();
	});
	
	$('#upload-cover').submit(function(){
		var formData = new FormData(this);
		var ajaxurl = base_url+'/upload-cover';
		$('.ajax-loader').show();

		var request = $.ajax({
			url: ajaxurl,
			type: "POST",
			headers: {
				'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
			},
			data: formData,
			processData: false,
			contentType: false,
			dataType: "json"
		});
		request.done(function(response) {
		   $('.ajax-loader').hide();
			if(response.sts == false){
				toastr["error"](response.msg);
			} 
			else{
				toastr["success"]('Cover has been updated!');
				$('.cover_photo').html('<img src="'+response.file_url+'">')
			}
		});
		request.fail(function(jqXHR, textStatus, thrownError) {
			$('.ajax-loader').hide();
			var error = JSON.parse(jqXHR.responseText);
			toastr["error"]('Request failed: '+ error.message);
		}); 

		return false;
	});

	$('#update-info').submit(function(){
		var formData = new FormData(this);
		var ajaxurl = base_url+'/update-info';
		$('.ajax-loader').show();

		var request = $.ajax({
			url: ajaxurl,
			type: "POST",
			headers: {
				'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
			},
			data: formData,
			processData: false,
			contentType: false,
			dataType: "json"
		});
		request.done(function(response) {
		   $('.ajax-loader').hide();
			if(response.sts == false){
				toastr["error"](response.msg);
			} 
			else{
				toastr["success"](response.msg);
			}
		});
		request.fail(function(jqXHR, textStatus, thrownError) {
			$('.ajax-loader').hide();
			var error = JSON.parse(jqXHR.responseText);
			toastr["error"]('Request failed: '+ error.message);
		}); 

		return false;
	});

	$('#update-social-info').submit(function(){
		var formData = new FormData(this);
		var ajaxurl = base_url+'/update-social-info';
		$('.ajax-loader').show();

		var request = $.ajax({
			url: ajaxurl,
			type: "POST",
			headers: {
				'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
			},
			data: formData,
			processData: false,
			contentType: false,
			dataType: "json"
		});
		request.done(function(response) {
		   $('.ajax-loader').hide();
			if(response.sts == false){
				toastr["error"](response.msg);
			} 
			else{
				toastr["success"](response.msg);
			}
		});
		request.fail(function(jqXHR, textStatus, thrownError) {
			$('.ajax-loader').hide();
			var error = JSON.parse(jqXHR.responseText);
			toastr["error"]('Request failed: '+ error.message);
		}); 

		return false;
	});

	$('#update-contact-info').submit(function(){
		if(is_form_validate('update-contact-info')){
			var formData = new FormData(this);
			var ajaxurl = base_url+'/update-contact-info';
			$('.ajax-loader').show();

			var request = $.ajax({
				url: ajaxurl,
				type: "POST",
				headers: {
					'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
				},
				data: formData,
				processData: false,
				contentType: false,
				dataType: "json"
			});
			request.done(function(response) {
			$('.ajax-loader').hide();
				if(response.sts == false){
					toastr["error"](response.msg);
				} 
				else{
					toastr["success"](response.msg);
				}
			});
			request.fail(function(jqXHR, textStatus, thrownError) {
				$('.ajax-loader').hide();
				var error = JSON.parse(jqXHR.responseText);
				toastr["error"]('Request failed: '+ error.message);
			}); 
		}

		return false;
	});

	$('#add-job').submit(function(){
        if(is_form_validate('add-job')){
        	
	        var formData = new FormData(this);
	        var ajaxurl = base_url+'/employer/job/save';
	        $('.ajax-loader').show();

	        var request = $.ajax({
	            url: ajaxurl,
	            type: "POST",
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
	            data: formData,
                processData: false,
                contentType: false,
	            dataType: "json"
	        });
	        request.done(function(response) {
	           $('.ajax-loader').hide();
	            if(response.sts == false){
	                toastr["error"](response.msg);
	            } 
	            else{
	            	toastr["success"](response.msg);
	            }
	        });
	        request.fail(function(jqXHR, textStatus) {
	            $('.ajax-loader').hide();
				var error = JSON.parse(jqXHR.responseText);
				toastr["error"]('Request failed: '+ error.message);
	        }); 
        }
		return false;
	});

	$('body').on('click', '.delete-job-btn', function(){
		if( confirm("Are you sure to delete this job?")){
			var ajaxurl = base_url+'/employer/job/delete';
			$('.ajax-loader').show();
			var id = $(this).data('id');
			
			var request = $.ajax({
				url: ajaxurl,
				type: "POST",
				headers: {
					'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
				},
				data: {id:id},
				dataType: "json"
			});
			request.done(function(response) {
				$('.ajax-loader').hide();
				if(response.sts == false){
					toastr["error"](response.msg);
				} 
				else{
					toastr["success"](response.msg);
				}
			});
			request.fail(function(jqXHR, textStatus) {
				$('.ajax-loader').hide();
				var error = JSON.parse(jqXHR.responseText);
				toastr["error"]('Request failed: '+ error.message);
			});
		}
	})

	$('#edit-job').submit(function(){
        if(is_form_validate('edit-job')){
        	
	        var formData = new FormData(this);
	        var ajaxurl = base_url+'/employer/job/update';
	        $('.ajax-loader').show();

	        var request = $.ajax({
	            url: ajaxurl,
	            type: "POST",
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
	            data: formData,
                processData: false,
                contentType: false,
	            dataType: "json"
	        });
	        request.done(function(response) {
	           $('.ajax-loader').hide();
	            if(response.sts == false){
	                toastr["error"](response.msg);
	            } 
	            else{
	            	toastr["success"](response.msg);
					window.location.reload();
	            }
	        });
	        request.fail(function(jqXHR, textStatus) {
	            $('.ajax-loader').hide();
				var error = JSON.parse(jqXHR.responseText);
				toastr["error"]('Request failed: '+ error.message);
	        }); 
        }
		return false;
	});

	$('#change-password').submit(function(){
        if(is_form_validate('change-password')){
        	
	        var formData = new FormData(this);
	        var ajaxurl = base_url+'/change-password';
	        $('.ajax-loader').show();

	        var request = $.ajax({
	            url: ajaxurl,
	            type: "POST",
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
	            data: formData,
                processData: false,
                contentType: false,
	            dataType: "json"
	        });
	        request.done(function(response) {
	           $('.ajax-loader').hide();
	            if(response.sts == false){
	                toastr["error"](response.msg);
	            } 
	            else{
	            	toastr["success"](response.msg);
	            }
	        });
	        request.fail(function(jqXHR, textStatus) {
	            $('.ajax-loader').hide();
				var error = JSON.parse(jqXHR.responseText);
				toastr["error"]('Request failed: '+ error.message);
	        }); 
        }
		return false;
	});

    $('#addCategory').submit(function(){
        if(is_form_validate('addCategory')){
        	
	        var formData = new FormData(this);
	        var ajaxurl = base_url+'admin/category/add';
	        $('.ajax-loader').show();

	        var request = $.ajax({
	            url: ajaxurl,
	            type: "POST",
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
	            data: formData,
                processData: false,
                contentType: false,
	            dataType: "json"
	        });
	        request.done(function(response) {
	           $('.ajax-loader').hide();
	            if(response.sts == false){
	                toastr["error"](response.msg);
	            } 
	            else{
	            	window.location.href = response.data.redirect_url;
	            }
	        });
	        request.fail(function(jqXHR, textStatus) {
	            $('.ajax-loader').hide();
                console.log(jqXHR);
	            toastr["error"]('Request failed: '+ jqXHR);
	        }); 
        }


        return false;
    });  
});

function callJobListing(){

	$('#jobTable').DataTable({
		processing: true,
		serverSide: true,
		ajax: base_url+'/employer/fetch-jobs',
		columns: [{
				data: 'title'
			},
			{
				data: 'job_type'
			},
			{
				data: 'applications'
			},
			{
				data: 'status'
			},
			{
				data: 'action',
			}
		]
	});
}

