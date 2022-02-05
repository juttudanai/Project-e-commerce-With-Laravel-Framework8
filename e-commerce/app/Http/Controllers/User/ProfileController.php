<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
    public function index()
    {
        $cart = Session::get('Cart');
        return view('user.index')
        ->with('cartItem',$cart);
    }

    public function editProfile(){
        $cart = Session::get('Cart');
        return view('user.formUpdateProfile')
        ->with('cartItem',$cart);
    }

    public function updateProfile(Request $request,$id){

            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'newpassword' => 'required|min:8',
                'againpassword' => 'required|min:8'
            ],[
                'name.required' => "* กรุณากรอกชื่อ",
                'email.required' => "* กรุณากรอกอีเมล",
                'newpassword.min' => "* รหัสผ่านต้องมีความยาว 8 ตัวอักษร",
                'againpassword.required' => "* รหัสผ่านต้องมีความยาว 8 ตัวอักษร",
                'againpassword.min' =>  "* รหัสผ่านต้องมีความยาว 8 ตัวอักษร"
            ]);

            if ($request->newpassword == $request->againpassword) {
                User::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->againpassword)
                ]);

                return redirect()->route('user.profile')->with('success', "อัพเดทข้อมูลสำเร็จ");
            }else{
                return redirect()->back()->with('error' ,"รหัสผ่านไม่ตรงกัน");
            }
    }

    public function paymentUser(){
        $dataPayment = DB::table('orders')
        ->where('orders.user_id','=',Auth::User()->id)
        ->where('orders.status','=',"complete")
        ->get();
        return view('user.checkoutHistory')->with('dataPayment',$dataPayment);
    }

    public function detailPaymentUser($id){

        $detailPayment = DB::table('orderitems')
        ->where('orderitems.order_id','=',$id)
        ->get();

        return view('user.detailCheckout')->with('detail',$detailPayment);
    }
}
