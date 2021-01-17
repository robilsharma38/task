<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Country;
use App\UserOrder;
use Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart');
    }

    public function addToCart()
    {
        $q = request()->quantity;
        $slug = request()->slug;
        $product = DB::table('products as p')->select('id','name','quantity','slug','price')->where('slug',$slug)->first();
        $cart = session()->get('cart');
        $amount = Round(($q * $product->price));
        if(!$cart)
        {
            $cart = [
                $product->id => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'quantity' => $q,
                    'price' => $amount,
                    ]
                ];
            session()->put('cart', $cart);
        }
        else
        {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'quantity' => $q,
                'price' => $amount,
            ];
            session()->put('cart', $cart);
        }
        return view('cart');
    }

    public function checkout()
    {
        $product = unserialize(base64_decode(request()->product));
        $cart = unserialize(base64_decode(request()->cart));
        $price = unserialize(base64_decode(request()->price));
        try{
            $order_id = 'OR-'.rand(10,100).time();
            foreach($product as $key => $value)
            {
                $products = array(
                    'order_id'=>$order_id,
                    'ref_no'=>$product[$key],
                    'quantity'=>$cart[$key],
                    'price'=>$price[$key],
                    'total_price'=>$price[$key],
                    'user_name'=>request()->firstname,
                    'user_mobile'=>request()->mobile,
                    'user_email'=>request()->email,
                    'user_address'=>request()->address,
                    'discount'=>'0',
                );
                UserOrder::create($products);
                Session::forget('cart');
            }
            return redirect()->route('success')->with('order_id',$order_id);
        }catch(\Exception $e)
        {
            dd($e);
           return back();
        }
    }
}
