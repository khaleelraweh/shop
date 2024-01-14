<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminInfoRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;


class BackendController extends Controller
{
    public function login(){
        return view('backend.admin-login');
    }

    public function register(){
        return view('backend.admin-register');
    }

    public function lock_screen(){
        return view('backend.admin-lock-screen');
    }

    public function recover_password(){
        return view('backend.admin-recoverpw');
    }

    public function index(){
        return view('backend.index');
    }

    public function account_settings(){
        return view('backend.account_settings');
    }


    public function update_account_settings(AdminInfoRequest $request){

        $user = auth()->user();
        $data['first_name'] =   $request->first_name;
        $data['last_name']  =   $request->last_name;
        $data['username']   =   $request->username;
        $data['email']      =   $request->email;
        $data['mobile']     =   $request->mobile;

        if(!empty($request->password) && !Hash::check($request->password , $user->password ) ){
            $data['password'] = bcrypt($request->password);
        }

        if($user_image = $request->file('user_image')){
            if($user->user_image != ''){
                if(File::exists('assets/users/' . $user->user_image )){
                    unlink('assets/users/' .$user->user_image);

                }
            }

            $file_name = $user->username . '.' . $user_image->extension();
            $path = public_path('assets/users/'.$file_name);
            Image::make($user_image->getRealPath())->resize(300,null,function($constraints){
                $constraints->aspectRatio();
            })->save($path,100);

            $data['user_image'] = $file_name;

        }

        $user->update($data);

        // toast('Profile updated' , 'success');
        return back();
    }

    public function remove_image(Request $request){
        


        $user = auth()->user();
    
        if($user->user_image != ''){
            if(File::exists('assets/users/' . $user->user_image )){
                unlink('assets/users/' .$user->user_image);

            }

            $user->user_image = null;
            $user->save();

            // toast('profile Image deleted' ,'success');
            // return back();
            return true;

        }
    }

}
