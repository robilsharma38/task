<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\UserOrder;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = User::where('role','!=','3')->count();
        $live_product = Product::where('status','1')->count();
        $disable_product = Product::where('status','2')->count();
        return view('admin.index',compact('user','live_product','disable_product'));
    }

}
