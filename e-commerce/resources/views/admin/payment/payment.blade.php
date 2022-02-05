@extends('layouts.admin.master')
@section('title')
    Payment
@endsection
@section('content')
<div class="col-md-10">
    @if ($data_payment->count()>0)
    <div class="card shadow">
        <div class="card-header shadow-sm">
            <h2 class="text-center">รายการชำระเงิน</h2>
        </div>
        <div class="card-body table table-responsive md-0 p-4">
            <table class="table text-center" id="table">
                <thead class="table table-dark">
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">รหัสสั่งซื้อ</th>
                        <th scope="col">รหัส Paypal Order ID</th>
                        <th scope="col">รหัส Payer ID</th>
                        <th scope="col">วันที่สั่งสินค้า</th>
                        <th scope="col">จำนวนเงิน</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($data_payment as $payment)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $payment->order_id }}</td>
                        <td>{{ $payment->paypal_order_id }}</td>
                        <td>{{ $payment->payer_id }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ number_format($payment->amount) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="alert alert-danger text-center">
                    <span>ไม่มีรายการชำระเงิน</span>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
