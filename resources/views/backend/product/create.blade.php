@extends('layouts.app_backend')
@section('title')
Sản Phẩm
@endsection

@section('content')
<div class="container form-text">
    <h1>Thêm Sản Phẩm</h1>
    <form action="{{ route('get_backend.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <!-- Tên sản phẩm -->
                <div class="form-group">
                    <label for="txtname">Tên sản phẩm</label>
                    <input class="form-control" id="txtname" type="text" name="name">
                    @if($errors->has('name'))
                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <!-- Mô tả sản phẩm -->
                <div class="form-group">
                    <label for="txtdesc">Mô tả sản phẩm</label>
                    <textarea class="form-control" type="text" id="txtdesc" name="description" rows="3"></textarea>
                </div>
                <!-- Conetent -->
                <div class="form-group">
                    <label for="content">Content</label>
                    <input class="form-control" id="content" type="text" name="conetent">
                </div>
                <!-- Loại sản phẩm -->
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select class="form-control" name="category_id">
                        <option>-- Chọn loại --</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Nhà cung cấp -->
                <div class="form-group">
                    <label>Nhà cung cấp</label>
                    <select class="form-control" name="supplier_id">
                        <option>-- Chọn nhà cung cấp --</option>
                        @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Hình ảnh -->
                <div class="form-group">
                    <label for="txtpic">Hình ảnh</label>
                    <div class="custom-file">
                        <input type="file" id="txtpic" name="avatar" accept=".png,.gif,.jpg,.jpeg">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- Số lượng sản phẩm -->
                <div class="form-group">
                    <label for="txtquantity">Số lượng sản phẩm</label>
                    <input class="form-control" type="number" id="txtquantity" name="quantity">
                </div>
                <!-- Giá nhập sản phẩm -->
                <div class="form-group">
                    <label for="txtprice">Giá nhập</label>
                    <input class="form-control" type="number" id="txtprice" name="price_entry">
                    @if($errors->has('price_entry'))
                    <div class="error text-danger">{{ $errors->first('price_entry') }}</div>
                    @endif
                </div>
                <!-- Giá sản phẩm -->
                <div class="form-group">
                    <label for="price">Giá bán sản phẩm</label>
                    <input class="form-control" type="number" id="price" name="price">
                    @if($errors->has('price'))
                    <div class="error text-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>
                <!-- Giảm giá -->
                <div class="form-group">
                    <label for="sale">Giảm giá</label>
                    <input class="form-control" type="number" id="sale" name="sale">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="btnsubmit">Thêm sản phẩm</button>
    </form>
</div>
@endsection