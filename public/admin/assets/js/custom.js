$(document).ready(function(){
	toastr.options = {
	  "closeButton": false,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": false,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "3000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}


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