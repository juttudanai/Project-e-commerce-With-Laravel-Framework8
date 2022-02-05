@extends('layouts.admin.master')
@section('title')
    Insert Product
@endsection
@section('content')
    <div class="col-md-6 shadow mb-5">
        <div class="header my-3 pt-4">
            <h2 class="text-center">แบบฟอร์มเพิ่มสินค้า</h2>
        </div>
        <form action="{{ route('addProduct') }}" method="post" class="row g-3 py-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-2 col-md-12 mx-auto px-5">
                <label for="product_name" class="form-label">ชื่อสินค้า</label>
                <input type="text" class="form-control" name="product_name" placeholder="กรุณากรอกชื่อสินค้า">
                @error('product_name')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2 col-md-12 mx-auto px-5">
                <label for="product_description" class="form-label">คำอธิบายสินค้า</label>
                <textarea name="product_description" id="" cols="30" rows="4" class="form-control" placeholder="กรุณากรอกคำอธิบายสินค้า"></textarea>
                @error('product_description')
                <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2 col-md-7 px-5">
                <label for="product_price" class="form-label">ราคาสินค้า</label>
                <input type="number" class="form-control" name="product_price" product_price placeholder="กรุณากรอกราคาสินค้า">
                @error('product_price')
                <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2 px-5 col-md-7">
                <label for="category" class="form-label">ประเภทสินค้า</label>
                <select class="form-select" name="category_id">
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2 col-12 px-5">
                <label for="product_image" class="form-label">รูปภาพสินค้า</label>
                <input type="file" class="form-control" name="product_image">
                @error('product_image')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2 d-flex justify-content-center">
                <a href="{{ route('admin.product') }}" class="btn btn-primary" role="button">กลับ</a>
                <button class="btn btn-success me-md-2" type="submit">เพิ่มสินค้า</button>
            </div>
        </form>
    </div>
@endsection
