@extends('layouts.admin.master')
@section('title')
    Manage Category
@endsection
@section('content')
    <div class="col">
        <div class="d-grid gap-2 d-md-flex justify-content-end pe-0">
            <a href="{{ route('formInsertCategory') }}" class="btn btn-success me-md-2 mb-3 shadow">
                <i class="fas fa-plus"></i>
                เพิ่มประเภทสินค้า
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
        @elseif(session('error'))
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
        @if (count($category)>0)
        <div class="card shadow">
            <div class="card-header shadow-sm">
                <h2 class="text-center py-2">ข้อมูลประเภทสินค้า</h2>
            </div>
                <div class="card-body table table-responsive p-4 mb-0">
                    <table class="table text-center" id="table">
                        <thead class="table table-dark">
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อประเภทสินค้า</th>
                                <th scope="col">จำนวนสินค้า</th>
                                <th scope="col">เเก้ไขข้อมูล</th>
                                <th scope="col">ลบข้อมูล</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($category as $item)
                            <tr>
                                <th>{{ $count ++ }}</th>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ $item->product->count() }}</td>
                                <td>
                                    <a href="{{ url('admin/category/editCategory/'.$item->id) }}" class="btn btn-warning btn-sm" role="button">เเก้ไขข้อมูล</a>
                                </td>
                                <td>
                                    <a href="" data-name="{{ $item->category_name }}" data-id="{{ $item->id }}"  class="btn btn-danger btn-sm sweetAlertCategory" role="button">ลบข้อมูล</a>
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
                    ไม่มีประเภทสินค้าในระบบ
                </p>
            </div>
        @endif
    </div>
@endsection
