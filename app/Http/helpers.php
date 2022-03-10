<?php
use App\Models\Usermeta;


function get_user_meta($user_id, $meta_key){
    $result = DB::table('usermetas')
                ->where('user_id', '=', $user_id)
                ->where('meta_key', '=', $meta_key)
                ->first();
    if(!empty($result)){
        return $result->meta_value;
    }
    else{
        return false;
    }
   
}

function update_user_meta($user_id, $meta_key, $meta_value){

    $User = Usermeta::updateOrCreate(
        ['user_id' => $user_id, 'meta_key' => $meta_key],
        ['meta_value' => $meta_value]
    );

    return true;
}

function getJobType($key = null){
    $jobType = array(
        '1' => 'Full Time',
        '2' => 'Part Time'
    );

    if($key == null){
        return $jobType;
    }
    else{
        return $jobType[$key];
    }
}