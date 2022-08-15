@extends('layouts.app_backend')
@section('title')
    Orders
@endsection

@section('content')
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Info</th>
                    <th>Total Money</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($orders as $order)
                <tbody>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            <ul>
                                <li>Name : {{ $order->name }}</li>
                                <li>Phone : {{ $order->phone }}</li>
                                <li>Email : {{ $order->email }}</li>
                                <li>Address: {{ $order->address }}</li>
                            </ul>
                        </td>
                        <td>{{ $order->total_amount }}</td>
                        <td>
                            <span class="badge badge-{{ $order->getStatus($order->status)['class'] }}">
                                {{ $order->getStatus($order->status)['name'] }}
                            </span>
                        </td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{ route('get_backend.order.detail', $order->id) }}" class="btn btn-info">Xem</a>
                            <form action="{{ route('get_backend.order.destroy', $order->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Xoá</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{ $orders->links() }}
    </div>
@endsection
