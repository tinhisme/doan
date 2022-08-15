@extends('layouts.app_backend')
@section('title')
KeyWord
@endsection

@section('content')
<div class="row">
    <div class="card">
        <form action="{{ route('get_backend.keyword.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" id="name">
                @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="des">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Description"
                    id="des">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection