<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->where('status','1')->get();
        return view('welcome',compact('products'));
    }

    public function login()
    {
        return view('login');
    }

    public function admin_login(Request $request)
    {
        $credentials = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == '3')
            {
                return redirect()->route('admin_dashboard');
            }
            else
            {
                Session::flash('success','Not Permit');
                return back();
            }
        }
        else
        {
            Session::flash('success','Wrong Credentials');
            return back();
        }
   }

   public function logout()
   {
       Auth::logout();
       return redirect()->route('login');
   }

   public function description($slug)
   {
       $product = DB::table('products')->where('slug',$slug)->first();
       return view('product_description',compact('product','slug'));
   }

   public function success()
   {
       return view('success');
   }
}
