@extends('layouts.app_backend')
@section('title')
KeyWord
@endsection

@section('content')
<a href="{{ route('get_backend.keyword.create') }}" class="btn btn-success">Thêm Mới</a>
<div class=" row">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Hot</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($keywords as $keyword )
        <tbody>
            <tr>
                <td>{{ $keyword->id }}</td>
                <td>{{ $keyword->name }}</td>
                <td>{{ $keyword->description }}</td>
                <td>{{ $keyword->created_at }}</td>
                <td>
                    @if ($keyword->hot == 1)
                    <a href="{{ route('get_backend.keyword.hot',$keyword->id) }}" class="badge badge-info">Hot</a>
                    @else
                    <a href="{{ route('get_backend.keyword.hot',$keyword->id) }}" class="badge badge-secondary">None</a>
                    @endif
                </td>
                <td>
                    <form action="{{ route('get_backend.keyword.destroy', $keyword->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Xoá</button>
                        <a href="{{ route('get_backend.keyword.edit', $keyword) }}" class="btn btn-primary">Sửa</a>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    {{ $keywords->links()}}
</div>
@endsection