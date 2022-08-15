@extends('layouts.app_backend')
@section('title')
Nhà Cung Cấp
@endsection

@section('content')
<h1>Trang Nhà Cung Cấp</h1>
<a href="{{ route('supplier.create') }}" class="btn btn-success">Thêm Mới</a>
<div class=" row">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($suppliers as $supplier )
        <tbody>
            <tr>
                <td>{{ $supplier->id }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->address }}</td>
                <td>{{ $supplier->description }}</td>
                <td>{{ $supplier->created_at }}</td>
                <td>
                    <form action="{{ route('supplier.destroy', $supplier) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Xoá</button>
                        <a href="{{ route('supplier.edit', $supplier) }}" class="btn btn-primary">Sửa</a>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection