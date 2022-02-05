<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function adminDashboard(){
        $order = DB::table('orders')->get();
        $payment = DB::table('payments')->get();
        $totalPrice = DB::table('orders')->where('orders.status','=',"complete")->sum('orders.price');
        return view('admin.index')
        ->with('totalPrice',$totalPrice)
        ->with('payment',$payment)
        ->with('orders',$order)
        ->with('category',Category::all())
        ->with('product',Product::all());
    }

}
