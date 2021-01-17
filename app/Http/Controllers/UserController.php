<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Session;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function get_user_data()
    {
        $query = User::select('id','full_name','email','mobile')->where('role','!=','3');
        return datatables($query)->make(true);
    }

    public function create()
    {
        $data = new User();
        return view('admin.user.create',compact('data'));
    }

    
    public function store()
    {
        $data = Validator::make(request()->all(),[
            'full_name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'country'=>'required',
            'state'=>'required',
            'district'=>'required',
            'password'=>'required',
            'profile_image'=>'required',
            'role'=>'required',
            'status'=>'required',
        ]);
        if($data->fails())
        {
            return redirect()->back()->withErrors($data)->withInput();
        }
        else
        {
            $data = request()->all();
        }
        $response = $this->user->store_user($data);
        if($response['status'] == '1')
        {
            Session::flash('success','User Added Successfully !!');
            return redirect()->route('user.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.edit',compact('data','id'));
    }
    
    public function update($id)
    {
        $data = Validator::make(request()->all(),[
            'full_name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'country'=>'required',
            'state'=>'required',
            'district'=>'required',
            'password'=>'required',
            'profile_image'=>'sometimes|required',
            'old_image'=>'sometimes|required',
            'role'=>'required',
            'status'=>'required',
        ]);
        if($data->fails())
        {
            return redirect()->back()->withErrors($data)->withInput();
        }
        else
        {
            $data = request()->except(['_method','_token']);
        }
        $response = $this->user->update_user($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','User Updated Successfully !!');
            return redirect()->route('user.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function destroy($id)
    {
        try{
            $data = User::find($id);
            $data->delete();
            Session::flash('success','User Deleted Successfully !!');
            return redirect()->route('user.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }
}
