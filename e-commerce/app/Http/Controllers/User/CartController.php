<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showCart(){
        $cart = Session::get('Cart');
        if ($cart) {
            return view('cart')
            ->with('cartItem',$cart);
        }else{
            return redirect('/');
        }
    }

    public function insertCart($id){
        $product = Product::find($id);
        $sessionCart = Session::get('Cart');
        $cart = New Cart($sessionCart);
        $cart->addItemToCart($id,$product);
        $cart->updateCart();
        Session::put('Cart',$cart);
        // dd($cart);
        return redirect()->route('showCart');
    }

    public function increment($id){
        $product = Product::find($id);
        $sessionCart = Session::get('Cart');
        $cart = New Cart($sessionCart);
        $cart->addItemToCart($id,$product);
        $cart->updateCart();
        Session::put('Cart',$cart);
        return view('cart')->with('cartItem',$cart);
    }

    public function decrement($id){
        $product = Product::find($id);
        $sessionCart = Session::get('Cart');
        $cart = New Cart($sessionCart);
        if ($cart->item[$id]['quantity'] > 1) {
            $cart->item[$id]['quantity'] = $cart->item[$id]['quantity'] - 1;
            $cart->item[$id]['price'] = $cart->item[$id]['quantity'] * $product->product_price;
            $cart->updateCart();
            Session::put('Cart',$cart);
        }
        return redirect()->route('showCart');

    }

    public function deleteProductFormCart($id){
        $cart = Session::get('Cart');
        if(array_key_exists($id,$cart->item)){
            unset($cart->item[$id]);
        }
        $afterCart = Session::get('Cart');
        $afterCart = New Cart($afterCart);
        $afterCart->updateCart();
        Session::put('Cart',$afterCart);
        return redirect()->route('showCart');
    }

    public function insertQuantityToCart(Request $request){
        $id = $request->_id;
        $amount = $request->product_quantity;

        $product = Product::find($id);
        $sessionCart = Session::get('Cart');
        $cart = New Cart($sessionCart);
        $cart->addQuantity($id, $product, $amount);
        $cart->updateCart();
        Session::put('Cart',$cart);
        // dd($cart);
        return redirect()->route('showCart');
    }

    public function checkOut(){
        $cart = Session::get('Cart');
        return view('checkOut')->with('cartItem',$cart);
    }
    public function insertCheckout(Request $request){
        $cart = Session::get('Cart');

        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $address = $request->address;
        $zip = $request->zip;
        $phone = $request->phone;
        $user_id = Auth::user()->id;
        $date = date('d-m-y,H:i:s');
        if ($cart) {
            $newOrder = array("date" => $date,
            "price" => $cart->totalPrice,
            "status" => "Not Paid",
            "del_date" => $date,
            "fname" => $fname,
            "lname" => $lname,
            "email" => $email,
            "address"=> $address,
            "zipcode"=>$zip,
            "phone" => $phone,
            "user_id" => $user_id);

            $create_order = DB::table('orders')->insert($newOrder); //insert table orders

            $order_id = DB::getPdo()->lastInsertId();       //เก็บข้อมูล id ล่าสุดจากตาราง orders

            // loop ข้อมูลจาก ตะกร้าสินค้า $cart มาบันทึกไว้ที่ตาราง orderitems
            foreach ($cart->item as $items) {
                $item_id = $items['data']['id'];
                $item_name = $items['data']['product_name'];
                $item_image = $items['data']['product_image'];
                $item_price = $items['data']['product_price'];
                $item_quantity = $items['quantity'];

                $newOrderItem = array(
                    "item_id" => $item_id,
                    "order_id" => $order_id,
                    "item_name" => $item_name,
                    "item_price" => $item_price,
                    "item_image" => $item_image,
                    "quantity" => $item_quantity,
                    "user_id" => Auth::User()->id
                );
                $create_order_item = DB::table('orderitems')->insert($newOrderItem );
            }
            Session::forget('Cart');
            $payment_info = $newOrder;
            $payment_info['order_id'] = $order_id;
            Session::put('payment_info',$payment_info);
            return redirect('showPayment');
        }else{
            return redirect('/');
        }
    }
    public function showPayment(){
        $payment_info = Session::get('payment_info');

        if($payment_info['status'] == "Not Paid"){
            return view('user.showPayment')->with('payment_info',$payment_info);
        }else{
            return redirect('/');
        }

    }
}
