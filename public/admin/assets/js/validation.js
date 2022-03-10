$(document).ready(function(){
    $('input[type=text], input[type=email], input[type=password]').on('focus', function(){
        var id = $(this).attr('id');
        $('#error_'+id).remove();
    });
});

function checkPassword(password) { 
    var paswd=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@~#$!%^.*()&])[A-Za-z\d@~#$!%^.*()&]{8,}$/;
    if(password.match(paswd)) { 
        return true;
    }
    else{ 
     return false;
    }
}  

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    }else{
        return true;
    }
}


function password_validate(arg){
    var password = arg.value;
    var id = arg.getAttribute('id');
    jQuery('#error_'+id+'').remove();
    
    if(password.length < 8){
        jQuery('#'+id).parent().append('<label class="form_error" id="error_'+id+'">Password should be greater than 8 characters.</label>')
    }
    else if(checkPassword(password) == false){
        jQuery('#'+id).parent().append('<label class="form_error" id="error_'+id+'">Password must have at least 8 characters with at least one Capital letter, at least one lower case letter and at least one number, at least one special characters. Special Symbols accepted: @~#$!%^.*()&</label>')
    }
}

function match_password(arg){

    var cpassword = arg.value;
    var password = jQuery('#password').val();
    var id = arg.getAttribute('id');
    jQuery('#error_'+id+'').remove();
    
    if(cpassword != password){
        jQuery('#'+id).parent().append('<label class="form_error" id="error_'+id+'">Your password and confirmation password do not match.</label>')
    }
    
}


function is_form_validate(form_id) {
    var error = 0;
    jQuery('.form_error').remove();
    jQuery('#'+form_id+' input[type=text], #'+form_id+' textarea, #'+form_id+' input[type=email], #'+form_id+' input[type=password], #'+form_id+' select, #'+form_id+' input[type=number], #'+form_id+' input[type=tel]').each(function(){

        var id = jQuery(this).attr('id');
        var required = jQuery(this).data('required');
        var type = jQuery(this).data('type');

        var input_val = jQuery.trim(jQuery(this).val());
        if(required == 'yes'){
            if(input_val == ''){
                error = 1;
                jQuery(this).parent().append('<label class="form_error" id="error_'+id+'">This field is required.</label>');
            }
            else{
                if(type == 'email'){
                    if(IsEmail(input_val) == false){
                        error = 1;
                        jQuery(this).parent().append('<label class="form_error" id="error_'+id+'">Enter valid email address.</label>');
                    }
                }
                if(type == 'phone'){
                    if(phonenumber(input_val) == false){
                        error = 1;
                        jQuery(this).parent().append('<label class="form_error" id="error_'+id+'">Enter valid phone number.</label>');
                    }
                }

                if(id == 'password'){
                    if(input_val.length < 8){
                        error = 1;
                        jQuery(this).parent().append('<label class="form_error" id="error_'+id+'">Password should be greater than 8 characters.</label>')
                    }
                    else if(checkPassword(input_val) == false){
                        error = 1;
                        jQuery(this).parent().append('<label class="form_error" id="error_'+id+'">Password must have at least 8 characters with at least one Capital letter, at least one lower case letter and at least one number, at least one special characters. Special Symbols accepted: @~#$!%^.*()&</label>')
                    }
                    
                }

                if(id == 'cpassword'){
                    if(input_val != jQuery('#password').val()){
                        error = 1;
                        jQuery(this).parent().append('<label class="form_error" id="error_'+id+'">Your password and confirmation password do not match.</label>')
                    }
                }
            }
        }
    });



    if(error == 0){
        return true;
    }
    else{
        return false;
    }
}

function populate(selector) {
    var select = jQuery(selector);
    var hours, minutes, ampm;

    var select_val = select.attr('data-select');

    select.append('<option value="">Please Select</option>');

    for(var i = 0; i <= 1425; i += 15){
        hours = Math.floor(i / 60);
        minutes = i % 60;
        if (minutes < 10){
            minutes = '0' + minutes; // adding leading zero
        }
        ampm = hours % 24 < 12 ? 'AM' : 'PM';
        hours = hours % 12;
        if (hours === 0){
            hours = 12;
        }

        var options = hours + ':' + minutes + ' ' + ampm;
        var s = '';
        if(select_val == options){
            s = 'selected';
        }

        select.append('<option value="'+options+'" '+s+'>'+options+'</option>');
    }
}

function phonenumber(number) {
    var regex = /^\d{10}$/;
    if(!regex.test(number)) {
        return false;
    }else{
        return true;
    }
}

function checkPrice(price){
    var regex = /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/;
    if(!regex.test(price)) {
        return false;
    }else{
        return true;
    }
}