@extends('layouts.admin.master')
@section('title')
    Order
@endsection
@section('content')
    <div class="col-md-10">
        @if ($orders->count()>0)
        <div class="card shadow">
            <div class="card-header shadow-sm">
                <h2 class="text-center">รายการสั่งซื้อ</h2>
            </div>
            <div class="card-body table table-responsive md-0 p-4">
                <table class="table text-center" id="table">
                    <thead class="table table-dark">
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">รหัสสั่งซื้อ</th>
                            <th scope="col">วันที่สั่งสินค้า</th>
                            <th scope="col">ยอดการสั่งซื้อทั้งหมด</th>
                            <th scope="col">สถานะการชำระเงิน</th>
                            <th scope="col">ข้อมูลสินค้า</th>
                            <th scope="col">ข้อมูลลูกค้า</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($orders as $item)
                        <tr>
                            <th>{{ $count++ }}</th>
                            <th>{{ $item->order_id }}</th>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->price }}</td>
                            @if ($item->status == "Not Paid")
                            <td>
                                <span class=" badge rounded-pill bg-danger">Not Paid</span>
                            </td>
                            @else
                            <td>
                                <span class=" badge rounded-pill bg-success">Complete</span>
                            </td>
                            @endif
                            <td>
                                <a href="{{ url('admin/order/orderDetailProduct/'.$item->order_id) }}" class="btn btn-primary btn-sm" role="button">รายละเอียด</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/order/orderDetailUser/'.$item->order_id) }}" class="btn btn-success btn-sm" role="button">รายละเอียด</a>
                            </td>
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
                        <span>ไม่มีรายการสั่งซื้อ</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
