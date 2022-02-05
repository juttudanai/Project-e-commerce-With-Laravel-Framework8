@extends('layouts.admin.master')
@section('title')
    Update Category
@endsection
@section('content')
    <div class="header">
        <h2 class="text-center mb-5">แบบฟอร์มเเก้ไขประเภทสินค้า</h2>
    </div>
    <div class="col-md-6 shadow">
        <form action="{{ url('admin/category/update/'.$category->id) }}" method="post" class="row g-3 py-5">
            @csrf
            <div class="mb-2 col-6 mx-auto">
                <label for="category_name" class="form-label">ชื่อประเภทสินค้า</label>
                <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
                @error('category_name')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2 d-flex justify-content-center">
                <a href="{{ route('admin.category') }}" class="btn btn-primary" role="button">กลับ</a>
                <button class="btn btn-success me-md-2" type="submit">อัพเดตประเภทสินค้า</button>
            </div>
        </form>
    </div>
@endsection
