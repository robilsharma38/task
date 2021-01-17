<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserOrder;
use App\Product;

class UserOrderController extends Controller
{
    public function order()
    {
        return view('admin.order');
    }

    public function get_order_data()
    {
        $query = UserOrder::select('user_orders.id','p.name','order_id','user_orders.quantity','user_orders.total_price','user_orders.user_name','user_orders.user_mobile','user_orders.user_email','user_orders.user_address')->join('products as p','user_orders.ref_no','=','p.id');
        return datatables($query)->make(true);
    }
}
