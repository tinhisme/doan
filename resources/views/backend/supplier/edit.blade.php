@extends('layouts.app_backend')
@section('title')
    Danh Mục
@endsection

@section('content')
    <h1>Sửa Nhà Cung Cấp</h1>
    <div class="row">
        <div class="card">
            <form action="{{ route('supplier.update', $supplier) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $supplier->name }}">
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $supplier->phone }}">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $supplier->address }}">
                </div>
                <div class="form-group">
                    <label for="des">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $supplier->description }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
