@extends('layouts.app_backend')
@section('title')
    Sản Phẩm
@endsection

@section('content')
    <h1>Trang Sản Phẩm</h1>
    <a href="{{ route('get_backend.product.create') }}" class="btn btn-success">Thêm Mới</a>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Purchase Price</th>
                    <th>Hot</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($products as $product)
                <tbody>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src="{{ pare_url_file($product->avatar) }}" height="100" width="100" alt="">
                        </td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->price_entry }}</td>
                        <td>
                            @if ($product->hot == 1)
                                <a href="{{ route('get_backend.product.hot', $product->id) }}"
                                    class="badge badge-info">Hot</a>
                            @else
                                <a href="{{ route('get_backend.product.hot', $product->id) }}"
                                    class="badge badge-secondary">None</a>
                            @endif
                        </td>
                        <td>
                            @if ($product->status == 0)
                                <a href="{{ route('get_backend.product.status', $product->id) }}"
                                    class="badge badge-secondary">Hide</a>
                            @else
                                <a href="{{ route('get_backend.product.status', $product->id) }}"
                                    class="badge badge-info">Show</a>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('get_backend.product.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Xoá</button>
                                <a href="{{ route('get_backend.product.edit', $product) }}"
                                    class="btn btn-primary">Sửa</a>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{ $products->links() }}
    </div>
@endsection
