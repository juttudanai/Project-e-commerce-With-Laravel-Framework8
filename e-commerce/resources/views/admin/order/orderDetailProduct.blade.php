@extends('layouts.admin.master')
@section('title')
    Product Order Detail
@endsection
@section('content')
    <div class="col">
        <div class="card">
            <div class="card-header shadow-sm">
                <h2 class="text-center">รายการสั่งซื้อสินค้า</h2>
            </div>
            <div class="card-body table-responsive shadow p-4">
                <table class="table text-center" id="table">
                    <thead class="table table-dark">
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">รูปภาพ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($orderDetail as $item)
                        <tr>
                            <th>{{ $count++ }}</th>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->item_price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <img src="{{ asset($item->item_image) }}" width="50px" alt="">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-center mt-4">
            <a href="{{ url('admin/order') }}" class="btn btn-primary me-md-2" role="button">กลับ</a>
          </div>
    </div>
@endsection

