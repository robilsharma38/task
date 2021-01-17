<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;
use DB;
use File;

class User extends Authenticatable
{
    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsActiveAttribute($attribute)
    {
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions()
    {
       return [
            1 => 'Active',
            0 => 'Inactive',
        ];
    }

    public function store_user($data)
    {
        $image = $data['profile_image'];
        $data['password'] = Hash::make($data['password']);
        $data['loginIp'] = $_SERVER['REMOTE_ADDR'];
        unset($data['old_image']);
        $response = array();
        try{

            $user = User::create($data);
            unset($user->profile_image);
            $id = $user->id;
            // Uploading image and making folder
            $this->uploadPic($image,$id);
            $response['status'] = 1;
        }catch(\Exception $e)
        {
            dd($e);
            $response['status'] = 2;
        }
        return $response;
    }

    public function update_user($data,$id)
    {
        $image = $data['old_image'];
        $data['password'] = Hash::make($data['password']);
        $imageValue = User::select('profile_image','id')->find($id);
        if(!empty($data['profile_image']))
        {
            $path = public_path()."/images/user/".$id.'/'.$imageValue->profile_image;
            File::delete($path);
            $image = $data['profile_image'];
        }
        try{
            unset($data['old_image']);
            $user = DB::table('users')->where('id',$id)->update($data);
            $this->uploadPic($image,$id);
            $response['status'] = 1;
        }catch(\Exception $e)
        {
            dd($e);
            $response['status'] = 2;
        }
        return $response;
    }

    public function uploadPic($image,$id)
    {
        // Uploading image and making folder
        if(!is_string($image))
        {
            if (! File::exists(public_path('images/user/'.$id))) {
                File::makeDirectory(public_path('images/user/'.$id));
            }
            $u_image = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/user/'.$id);
            $image->move($destinationPath, $u_image);
            DB::table('users')->where('id',$id)->update(['profile_image'=>$u_image]);
        }
        else
        {
            DB::table('users')->where('id',$id)->update(['profile_image'=>$image]);
        }
        
    }
}
