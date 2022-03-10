<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Response;
use App\Models\Usermeta;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Hash;
use Auth;

class AjaxController extends Controller
{
    
    public function uploadLogo(Request $request)
    {

        $validatedData = $request->validate([
            'attachments' => 'required|mimes:jpg,png|max:1000',
        ]);

        $orignal_name = $request->file('attachments')->getClientOriginalName();

        $fileName = time().'_'.$orignal_name;  

        $request->file('attachments')->move(public_path('uploads'), $fileName);

        $url = url('uploads/'.$fileName);

        update_user_meta($request->input('user_id'), 'user_logo_file', $fileName);

         return response()->json(array('sts' => true, 'file_url' => $url));
    }
    
    public function uploadCover(Request $request)
    {

        $validatedData = $request->validate([
            'attachments' => 'required|mimes:jpg,png|max:1000',
        ]);

        $orignal_name = $request->file('attachments')->getClientOriginalName();

        $fileName = time().'_'.$orignal_name;  

        $request->file('attachments')->move(public_path('uploads'), $fileName);

        $url = url('uploads/'.$fileName);

        update_user_meta($request->input('user_id'), 'user_cover_file', $fileName);

         return response()->json(array('sts' => true, 'file_url' => $url));
    }

    public function updateInfo(Request $request)
    {
        $input = $request->input();
        $user_id = $input['user_id'];
        unset($input['user_id']);
        if(!empty($input)){
            foreach($input as $key => $value){
                update_user_meta($user_id, $key, $value);
            }
        }
     
         return response()->json(array('sts' => true, 'msg' => 'Information has been updated!'));
    }

    public function changePassword(Request $request)
    {


        $validatedData = $request->validate([
            'old_password' => ['required', 'string'],
            //'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if($request->new_password != $request->password_confirmation){
            return response()->json(array('sts' => false, 'msg' => 'The new password confirmation does not match!'));
        }

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(array('sts' => false, 'msg' => 'New Password cannot be same as your current password!'));
        }

        //Change Password
        $user->password = Hash::make($request->new_password);
        $user->save();
       

         return response()->json(array('sts' => true, 'msg' => 'Password has been updated!'));
    }

    
}