@extends('layouts.app_backend')
@section('title')
Attribute
@endsection

@section('content')
<div class="row">
    <div class="card">
        <form action="{{ route('get_backend.attribute.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" id="name">
                @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    <option>-- Chọn loại --</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Group</label>
                <select class="form-control" name="type">
                    <option>-- Group --</option>
                    <option value="1">RAM</option>
                    <option value="2">Hệ điều hành</option>
                    <option value="3">Bộ nhớ trong</option>
                    <option value="4">Camera</option>
                    <option value="5">Màn hình</option>
                    <option value="6">Pin</option>
                    <option value="7">Giá</option>
                    <option value="8">Tính năng đặc biệt</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection