@extends('layouts.admin.master')
@section('title')
    Member Order Detail
@endsection
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header shadow-sm">
                <h2 class="text-center">รายละเอียดผู้สั่งซื้อสินค้า</h2>
            </div>
            <div class="card-body shadow">
                <form class="row g-4 p-4">
                    <div class="col-md-6">
                        <label for="fname" class="form-label">ชื่อจริง</label>
                        <input type="text" class="form-control" readonly value="{{ $orderDetailUser['0']->fname }}">
                    </div>
                    <div class="col-md-6">
                        <label for="lname" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" readonly value="{{ $orderDetailUser['0']->lname }}">
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <textarea name="address" id="" cols="30" class="form-control" rows="3" readonly>{{ $orderDetailUser['0']->address }}</textarea>
                    </div>
                    <div class="col-md-2">
                        <label for="zip" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" readonly value="{{ $orderDetailUser['0']->zipcode }}">
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" readonly value="{{ $orderDetailUser['0']->phone }}">
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">อีเมล</label>
                        <input type="text" class="form-control" readonly value="{{ $orderDetailUser['0']->email }}">
                    </div>
                </form>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-center mt-4">
            <a href="{{ url('admin/order') }}" class="btn btn-primary me-md-2" role="button">กลับ</a>
          </div>
    </div>
@endsection

