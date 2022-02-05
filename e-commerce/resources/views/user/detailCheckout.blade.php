@extends('layouts.app')
@section('titleMember')
    Order Detail
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group-item mb-4 shadow">
                <div><strong>ยินดีต้อนรับ</strong> :  <span class="ms-2">{{ Auth::User()->email }}</span></div>
            </div>
            <div class="list-group shadow">
                <a href="{{ route('user.profile') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-sign-out-alt"><span class="mx-3">หน้าเเรก</span></i>
                </a>
                <a href="{{ url('/') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-sign-out-alt"><span class="mx-3">เลือกซื้อสินค้า</span></i>
                </a>
                <a href="{{ url('history/Payment') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-sign-out-alt"><span class="mx-3">ประวัติการสั่งซื้อ</span></i>
                </a>
                <a href="{{ url('ProfileUser/editProfile/') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-sign-out-alt"><span class="mx-3">แก้ไขข้อมูลส่วนตัว</span></i>
                </a>
                <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"><span class="mx-3">ออกจากระบบ</span></i>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </div>
        </div>

        <div class="col-md-8 mx-auto mt-5">
            <div class="card shadow text-center">
                <div class="card-header shadow-sm">
                    <h4>รายละเอียดการสั่งซื้อสินค้า</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm">
                        <thead class="table table-dark">
                          <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">ราคาต่อหน่วย</th>
                            <th scope="col">จำนวนสินค้า</th>
                            <th scope="col">รูปสินค้า</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($detail as $item)
                                <tr>
                                    <th>{{ $count ++ }}</th>
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->item_price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        <img src="{{ asset($item->item_image) }}" width="100px" alt="">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-center mt-4">
                <a href="{{ url('history/Payment') }}" class="btn btn-primary me-md-2" role="button">กลับ</a>
            </div>
        </div>
    </div>
</div>

@endsection
