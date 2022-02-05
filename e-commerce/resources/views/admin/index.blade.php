@extends('layouts.admin.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="title text-center mb-5">
        <h2>ภาพรวมของระบบ</h2>
    </div>
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-4 card-dashboard">
            <div class="card text-center shadow">
                <div class="card-header header-dashboard" >
                    <h3>ยอดขายทั้งหมด</h3>
                </div>
                <div class="card-body text-center fs-4 body-dashboard">
                    <span>{{ $totalPrice }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 card-dashboard">
        <div class="card text-center shadow">
            <div class="card-header header-dashboard">
                <h3>ประเภทสินค้าทั้งหมด</h3>
            </div>
            <div class="card-body fs-4 body-dashboard">
                <span>{{ count($category) }}</span>
            </div>
            <div class="card-footer list-group-item list-group-item-action footer-dashboard">
                <a href="{{ route('admin.category') }}" class="text-decoration-none text-dark">
                    ไปที่ประเภทสินค้า
                    <i class="fas fa-arrow-right rounded-circle bg-dark text-light p-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3 card-dashboard">
        <div class="card text-center shadow">
            <div class="card-header header-dashboard">
                <h3>จำนวนสินค้าทั้งหมด</h3>
            </div>
            <div class="card-body fs-4 body-dashboard">
                <span>{{ count($product) }}</span>
            </div>
            <div class="card-footer list-group-item list-group-item-action footer-dashboard">
                <a href="{{ route('admin.product') }}" class="text-decoration-none text-dark">
                    ไปที่สินค้า
                    <i class="fas fa-arrow-right rounded-circle bg-dark text-light p-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3 card-dashboard">
        <div class="card text-center  shadow">
            <div class="card-header header-dashboard">
                <h3>รายการสั่งซื้อ</h3>
            </div>
            <div class="card-body fs-4 body-dashboard">
                <span>{{ count($orders) }}</span>
            </div>
            <div class="card-footer list-group-item list-group-item-action footer-dashboard">
                <a href="{{ route('admin.order') }}" class="text-decoration-none text-dark">
                    ไปที่รายการสั่งซื้อ
                    <i class="fas fa-arrow-right rounded-circle bg-dark text-light p-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3 card-dashboard">
        <div class="card text-center shadow">
            <div class="card-header header-dashboard">
                <h3>รายการชำระเงิน</h3>
            </div>
            <div class="card-body text-center fs-4 body-dashboard">
                <span>{{ count($payment) }}</span>
            </div>
            <div class="card-footer list-group-item list-group-item-action footer-dashboard">
                <a href="{{ route('admin.payment') }}" class="text-decoration-none text-dark">
                    ไปที่รายการชำระเงิน
                    <i class="fas fa-arrow-right rounded-circle bg-dark text-light p-1"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
