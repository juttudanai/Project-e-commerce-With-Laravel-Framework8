@extends('layouts.app')
@section('titleMember')
    Home
@endsection
@section('navabr-brand')
    Profile
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
                    <h4>ข้อมูลส่วนตัว</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 row ms-3">
                        <label for="name" class="col-sm-4 col-form-label">ชื่อ</label>
                        <div class="col-sm-8">
                          <input type="text" readonly class="form-control-plaintext" value="{{ Auth::User()->name }}">
                        </div>
                    </div>
                    <div class="mb-3 row ms-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">อีเมล</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ Auth::User()->email }}">
                        </div>
                    </div>
                    <div class="mb-3 row ms-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">วันที่สมัครสมาชิก</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext"  value="{{ Auth::User()->created_at }}">
                        </div>
                    </div>
                    <div class="mb-3 row ms-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">อัพเดตข้อมูลล่าสุด</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext"  value="{{ Auth::User()->updated_at }}">
                        </div>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <script>
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: '{{ session("success") }}',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif
        </div>
    </div>

</div>



@endsection
