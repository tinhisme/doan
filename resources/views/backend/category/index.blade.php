@extends('layouts.app_backend')
@section('title')
Danh Mục
@endsection

@section('content')
<h1>Trang Danh Mục</h1>

<a href="{{ route('get_backend.category.create') }}" class="btn btn-success">Thêm Mới</a>
<div class=" row">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Hot</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($categories as $category )
        <tbody>
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    @if ($category->hot == 1)
                    <a href="{{ route('get_backend.category.hot',$category->id) }}" class="badge badge-info">Hot</a>
                    @else
                    <a href="{{ route('get_backend.category.hot',$category->id) }}"
                        class="badge badge-secondary">None</a>
                    @endif
                </td>
                <td>
                    @if ($category->status == 0)
                    <a href="{{ route('get_backend.category.status',$category->id) }}"
                        class="badge badge-secondary">Hide</a>
                    @else
                    <a href="{{ route('get_backend.category.status',$category->id) }}" class="badge badge-info">Show</a>
                    @endif
                </td>
                <td>
                    <form action="{{ route('get_backend.category.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Xoá</button>
                        <a href="{{ route('get_backend.category.edit', $category) }}" class="btn btn-primary">Sửa</a>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    {{ $categories->links()}}
</div>
@endsection