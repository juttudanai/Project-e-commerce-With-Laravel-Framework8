@extends('layouts.admin.master')
@section('title')
    Profile
@endsection
@section('content')
    <div class="col-md-5 mx-auto">
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
                        <input type="email" readonly class="form-control-plaintext" id="staticEmail" value="{{ Auth::User()->email }}">
                    </div>
                </div>
                <div class="mb-3 row ms-3">
                    <label for="staticEmail" class="col-sm-4 col-form-label">อัพเดตข้อมูลล่าสุด</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext"  value="{{ Auth::User()->updated_at }}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-center">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary me-md-2 my-2" role="button">กลับ</a>
                    <a href="{{ route('admin.editProfile') }}" class="btn btn-warning me-md-2 my-2" role="button">เเก้ไขข้อมูลส่วนตัว</a>
                </div>
            </div>
        </div>
    </div>
@endsection
