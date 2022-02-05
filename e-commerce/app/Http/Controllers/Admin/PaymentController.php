<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function paymentDashboard(){
        $data_payment = DB::table('payments')->get();
        return view('admin.payment.payment')->with('data_payment',$data_payment);
    }

    public function insertPayment($orderID,$payerID){

        $payment_info = Session::get('payment_info');


        $order_id = $payment_info['order_id'];
        $status = $payment_info['status'];

        if ($status == 'Not Paid') {
            //เปลี่ยนสถานะการชำระเงิน
            DB::table('orders')->where('order_id', '=' ,$order_id)->update(['status' => "complete"]);

            //บันทึกข้อมูลการชำระเงิน
            $date = date('d-m-y');
            $newPayment = array(
                'date'=>$date,
                'amount' => $payment_info['price'],
                'paypal_order_id' =>$orderID,
                'payer_id' =>$payerID,
                'order_id'=>$order_id
            );
            DB::table('payments')->insert($newPayment);
            Session::forget('payment_info');
            return redirect('/')->with('payment_success', "ชำระเงินสำเร็จ");
        }
    }
}
