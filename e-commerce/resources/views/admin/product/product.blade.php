@extends('layouts.admin.master')
@section('title')
    Product
@endsection
@section('content')
    <div class="col">
        <div class="d-grid gap-2 d-md-flex justify-content-end pe-0">
            <a href="{{ url('admin/product/InsertProduct/') }}" class="btn btn-success me-md-2 mb-3 shadow" role="button">
                <i class="fas fa-plus"></i>
                เพิ่มสินค้า
            </a>
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
        @if (count($products)>0)
            <div class="card shadow">
                <div class="card-header shadow-sm">
                    <h2 class="text-center">ข้อมูลสินค้า</h2>
                </div>
                <div class="card-body table table-responsive mb-0 p-4">
                    <table class="table text-center" id="table">
                        <thead class="table table-dark">
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col">ราคาสินค้า</th>
                                <th scope="col">ประเภทสินค้า</th>
                                <th scope="col">คำอธิบายสินค้า</th>
                                <th scope="col">รูปภาพสินค้า</th>
                                <th scope="col">เเก้ไขข้อมูล</th>
                                <th scope="col">ลบข้อมูล</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($products as $item)
                            <tr>
                                <th>{{ $count++ }}</th>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->product_price }}</td>
                                <td>{{ $item->category->category_name}}</td>
                                <td>{{ Str::limit($item->product_description, 30, '...') }}</td>
                                <td>
                                    <img src="{{ asset($item->product_image) }}" width="100px" alt="">
                                </td>
                                <td>
                                    <a href="{{ url('admin/product/editProduct/'.$item->id) }}" class="btn btn-warning btn-sm" role="button">เเก้ไขข้อมูล</a>
                                </td>
                                <td>
                                    <a href="" data-name="{{ $item->product_name }}" data-id="{{ $item->id }}" class="btn btn-danger btn-sm sweetAlertProduct" class="btn btn-danger btn-sm" role="button">ลบข้อมูล</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="row d-flex justify-content-center">
                <p class="col-md-6 alert alert-danger text-center">
                    ไม่มีสินค้าในระบบ
                </p>
            </div>
        @endif
    </div>
@endsection
