@extends('layouts.app_backend')
@section('title')
    Order Detail
@endsection

@section('content')
    <h1> chi tiet don hang #{{ $id }}</h1>
    <div class="card-body">
        <table class="table-bordered table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Avatar</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($order_product as $item)
                <tbody>
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td><img src="{{ pare_url_file($item->product->avatar) }}" height="50" width="50" /></td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price * $item->quantity }}</td>
                        <td>
                            <form action="{{ route('get_backend.order.destroy_order', $item) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
