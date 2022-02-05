@extends('layouts.app')
@section('titleMember')
    Update Profile
@endsection
@section('navabr-brand')
    Update Profile
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
        <div class="col-md-5 mx-auto">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>แบบฟอร์มแก้ไขข้อมูลส่วนตัว</h4>
                </div>
                <form action="{{ url('ProfileUser/updateProfile/'.Auth::User()->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3 row ms-3">
                            <label for="name" class="col-md-4 col-form-label">ชื่อ</label>
                            <div class="col-md-8">
                            <input type="text" name="name" class="form-control" value="{{ Auth::User()->name }}">
                            @error('name')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row ms-3">
                            <label for="email" class="col-md-4 col-form-label">อีเมล</label>
                            <div class="col-md-8">
                                <input type="email" name="email"  class="form-control" id="staticEmail" value="{{ Auth::User()->email }}">
                                @error('email')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row ms-3">
                            <label for="password" class="col-md-4 col-form-label">รหัสผ่านใหม่</label>
                            <div class="col-md-8">
                                <input type="password" name="newpassword"  class="form-control">
                                @error('newpassword')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row ms-3">
                            <label for="password" class="col-md-4 col-form-label">ยืนยันรหัสผ่านใหม่</label>
                            <div class="col-md-8">
                                <input type="password" name="againpassword"  class="form-control">
                                @error('againpassword')
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-grid gap-2 d-md-flex justify-content-center">
                            <a href="{{ route('user.profile') }}" class="btn btn-primary me-md-2 my-2" role="button">กลับ</a>
                            <button class="btn btn-success me-md-2 my-2" type="submit">อัพเดตข้อมูลส่วนตัว</button>
                        </div>
                    </div>
                </form>
            </div>
            @if (session('error'))
                <div class="alert alert-danger text-center mt-4">
                    <span>{{ session("error") }}</span>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection


