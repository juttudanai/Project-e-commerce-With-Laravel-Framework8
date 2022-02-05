@extends('layouts.admin.master')
@section('title')
    Member
@endsection
@section('content')
    <div class="col-md-10">
        @if ($members->count()>0)
        <div class="card shadow">
            <div class="card-header shadow-sm">
                <h2 class="text-center">รายการสมาชิก</h2>
            </div>
            <div class="card-body table table-responsive md-0 p-4">
                <table class="table text-center" id="table">
                    <thead class="table table-dark">
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">อีเมล</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($members as $item)
                        <tr>
                            <th>{{ $count++ }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="alert alert-danger text-center">
                        <span>ไม่มีรายการสมาชิก</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
