<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use Session;
use Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function get_product_data()
    {
        $query = Product::select('id','name','quantity','price');
        return datatables($query)->make(true);
    }

    public function create()
    {
        $data = new Product();
        return view('admin.product.create',compact('data'));
    }

    
    public function store()
    {
        $data = Validator::make(request()->all(),[
            'name'=>'required',
            'image'=>'required',
            'quantity'=>'required',
            'description'=>'required',
            'price'=>'required',
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
        $response = $this->product->store_product($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Product Added Successfully !!');
            return redirect()->route('product.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    
    public function edit($id)
    {
        $data = Product::find($id);
        return view('admin.product.edit',compact('data','id'));
    }
    
    public function update($id)
    {
        $data = Validator::make(request()->all(),[
            'name'=>'required',
            'image'=>'sometimes|required',
            'quantity'=>'required',
            'description'=>'required',
            'price'=>'required',
            'old_image'=>'sometimes|required',
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
        $response = $this->product->update_product($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Product Updated Successfully !!');
            return redirect()->route('product.index');
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
            $data = Product::find($id);
            $data->delete();
            Session::flash('success','Product Deleted Successfully !!');
            return redirect()->route('product.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }
}
