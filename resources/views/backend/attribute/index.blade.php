@extends('layouts.app_backend')
@section('title')
KeyWord
@endsection

@section('content')
<a href="{{ route('get_backend.attribute.create') }}" class="btn btn-success">Thêm Mới</a>
<div class=" row">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Group</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($attributes as $attribute )
        <tbody>
            <tr>
                <td>{{ $attribute->id }}</td>
                <td>{{ $attribute->name }}</td>
                <td>{{ $attribute->category->name }}</td>
                <td>{{ $attribute->type->name ?? "N\A"}}</td>
                <td>
                    <form action="{{ route('get_backend.attribute.destroy', $attribute->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Xoá</button>
                        <a href="{{ route('get_backend.attribute.edit', $attribute) }}" class="btn btn-primary">Sửa</a>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection