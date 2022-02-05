@extends('layouts.admin.master')
@section('title')
    Update Profile
@endsection
@section('content')
    <div class="col-md-5 mx-auto">
        @if (session('error'))
        <script>
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: '{{ session("error") }}',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
        @endif
        <div class="card shadow">
            <div class="card-header text-center">
                <h4>แบบฟอร์มแก้ไขข้อมูลส่วนตัว</h4>
            </div>
            <form action="{{ url('admin/profile/updateProfile/'.Auth::User()->id) }}" method="POST">
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
                            <input type="email"  class="form-control" name="email"  value="{{ Auth::User()->email }}">
                            @error('email')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-3 row ms-3">
                        <label for="password" class="col-md-4 col-form-label">รหัสผ่าน</label>
                        <div class="col-md-8">
                            <input type="password" name="password"  class="form-control">
                            @error('password')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-3 row ms-3">
                        <label for="password" class="col-md-4 col-form-label">ยืนยันรหัสผ่าน</label>
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
                        <a href="{{ route('admin.profile') }}" class="btn btn-primary me-md-2 my-2" role="button">กลับ</a>
                        <button class="btn btn-success me-md-2 my-2" type="submit">อัพเดต</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
