@extends('layouts.app_backend')
@section('title')
    Danh Mục
@endsection

@section('content')
    <h1>Sửa Danh Mục Sản Phẩm</h1>
    <div class="row">
        <div class="card">
            <form action="{{ route('get_backend.category.update', $category) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                    @if ($errors->has('name'))
                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="des">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $category->description }}">
                    @if ($errors->has('description'))
                        <div class="error text-danger">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Sửa Danh Mục</button>
            </form>
        </div>
    </div>
@endsection
