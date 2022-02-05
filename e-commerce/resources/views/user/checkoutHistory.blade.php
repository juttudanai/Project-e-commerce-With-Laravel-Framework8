@extends('layouts.app')
@section('titleMember')
    Order History
@endsection
@section('navabr-brand')
    Payment History
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
                    <i class="fas fa-home"><span class="mx-3">หน้าเเรก</span></i>
                </a>
                <a href="{{ url('/') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-shopping-cart"><span class="mx-3">เลือกซื้อสินค้า</span></i>
                </a>
                <a href="{{ url('history/Payment') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-shopping-cart"><span class="mx-3">ประวัติการสั่งซื้อ</span></i>
                </a>
                <a href="{{ url('ProfileUser/editProfile/') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-id-card"><span class="mx-3">แก้ไขข้อมูลส่วนตัว</span></i>
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
            @if ($dataPayment->count() > 0)
            <div class="card shadow text-center shadow-sm">
                <div class="card-header">
                    <h4>ประวัติการสั่งซื้อสินค้า</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm">
                        <thead class="table table-dark">
                          <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชื่อผู้สั่งสินค้า</th>             {{-- ตาราง orderitems --}}
                            <th scope="col">ราคารวม</th>             {{-- ตาราง orders --}}
                            <th scope="col">วันที่สั่งสินค้า</th>          {{-- ตาราง orders --}}
                            <th scope="col">สถานะการชำระเงิน</th>     {{-- ตาราง orders --}}
                            <th scope="col">รายละเอียดการสั่งซื้อ</th>    {{-- ตาราง orders --}}
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                          @foreach ($dataPayment as $data)
                          <tr>
                            <th>{{ $count++ }}</th>
                            <td>{{ $data->fname }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->date }}</td>
                            @if ($data->status == "Not Paid")
                            <td> <span class="badge bg-danger">ยังไม่ได้ชำระเงิน</span></td>
                            @else
                            <td> <span class="badge bg-success">ชำระเงินเรียบร้อย</span></td>
                            @endif
                            <td>
                                <a href="{{ url('history/Payment/detail/'.$data->order_id) }}" class="btn btn-primary btn-sm" role="button">รายละเอียด</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="alert alert-danger text-center">
                <p>ไม่มีประวัติการสั่งซื้อ</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
