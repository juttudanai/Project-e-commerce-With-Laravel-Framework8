<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderDashboard(){
        $orders = DB::table('orders')->get();
        return view('admin.order.order')->with('orders',$orders);
    }

    public function orderDetailProduct($id){
        $orderDetailProduct = DB::table('orderitems')->where('orderitems.order_id','=',$id)->get();
        return view('admin.order.orderDetailProduct')->with('orderDetail',$orderDetailProduct);
    }
    public function orderDetailUser($id){
        $orderDetailUser = DB::table('orders')->where('orders.order_id','=',$id)->get();
        return view('admin.order.orderdetailUser')->with('orderDetailUser',$orderDetailUser);
    }
}
