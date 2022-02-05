@extends('layouts.shopping.master')
@section('titleName')
    Payment Status
@endsection
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p> Shipping/Bill To</p>
                            <div class="form-one">
                                <div class="total_area" style="padding:10px">
                                    <ul>
                                        <li>Payment status
                                            @if ($payment_info['status'] == 'Not Paid')
                                                <span>ยังไม่ชำระเงิน</span>
                                            @endif
                                        </li>
                                        <li>Total Price
                                            <span>{{ number_format($payment_info['price']) }} &nbsp;<span>บาท</span></span>
                                        </li>
                                        <li>
                                            <div id="paypal-button-container"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>

<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{ $payment_info['price'] }}'     //ดึง $payment_info['price'] มากำหนดราคาในการชำระเงิน
                    }
                }]
            });
        },
        onApprove: function(data, actions) {      //หลังจากชำระเงิน data จะเก็บข้อมูล order_id กับ payer_id | payer_id เป็นรหัสผู้ชำระเงิน
            return actions.order.capture().then(function(details) {

                //หลังจากชำระเงินให้ไปที่ url ที่กำหนดเเละส่ง parameter 2 ค่า oderID กับ PayerID
                window.location = '/paymentreciept/'+data.orderID+'/'+data.payerID;
            });
        }
  }).render('#paypal-button-container');
</script>

@endsection
