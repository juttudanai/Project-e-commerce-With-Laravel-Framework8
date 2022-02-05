@extends('layouts.admin.master')
@section('title')
    Insert Category
@endsection
@section('content')
    @if(session('error'))
    <script>
        Swal.fire({
            position: 'top',
            icon: 'error',
            title: '{{ session("error") }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
    <div class="col-md-6 shadow">
        <div class="header my-3 pt-4">
            <h2 class="text-center">แบบฟอร์มเพิ่มประเภทสินค้า</h2>
        </div>
        <form action="{{ route('addCategory') }}" method="post" class="row g-3 py-4">
            @csrf
            <div class="mb-2 col-6 mx-auto">
                <label for="category_name" class="form-label">ชื่อประเภทสินค้า</label>
                <input type="text" class="form-control" name="category_name" placeholder="กรุณากรอกชื่อประเภทสินค้า">
                @error('category_name')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2 d-flex justify-content-center">
                <a href="{{ route('admin.category') }}" class="btn btn-primary" role="button">กลับ</a>
                <button class="btn btn-success me-md-2" type="submit">เพิ่มประเภทสินค้า</button>
            </div>
        </form>
    </div>
@endsection
