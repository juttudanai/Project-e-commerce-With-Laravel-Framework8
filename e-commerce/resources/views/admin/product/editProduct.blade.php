@extends('layouts.admin.master')
@section('title')
    Update Product
@endsection
@section('content')
    <div class="header">
        <h2 class="text-center mb-5">แบบฟอร์มเเก้ไขสินค้า</h2>
    </div>
    <div class="col-md-6 shadow mb-5">
        <form action="{{ url('admin/product/updateProduct/'.$product->id) }}" method="post" class="row g-3 py-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-2 col-md-12 mx-auto px-5">
                <label for="product_name" class="form-label">ชื่อสินค้า</label>
                <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                @error('product_name')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2 col-md-12 mx-auto px-5">
                <label for="product_description" class="form-label">คำอธิบายสินค้า</label>
                <textarea name="product_description" id="" cols="30" rows="4" class="form-control">{{ $product->product_description }}</textarea>
                @error('product_description')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2 col-md-7 px-5">
                <label for="product_price" class="form-label">ราคาสินค้า</label>
                <input type="number" class="form-control" name="product_price" value="{{ $product->product_price }}">
                @error('product_price')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-2 px-5 col-md-7">
                <label for="category" class="form-label">ประเภทสินค้า</label>
                <select class="form-select" name="category_id">
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}"
                        @if ($item->id == $product->category_id)
                        selected
                        @endif
                        >{{ $item->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <input type="hidden" name="old_image" value="{{ $product->product_image }}">
            <div class="mb-2 col-12 px-5">
                <label for="product_image" class="form-label">รูปภาพสินค้า</label>
                <input type="file" class="form-control" name="product_image" value="{{ $product->product_image }}">
                @error('product_image')
                    <span class="form-text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2 d-flex justify-content-center">
                <a href="{{ route('admin.product') }}" class="btn btn-primary" role="button">กลับ</a>
                <button class="btn btn-success me-md-2" type="submit">อัพเดตสินค้า</button>
            </div>
        </form>
    </div>
@endsection
