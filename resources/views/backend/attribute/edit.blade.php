@extends('layouts.app_backend')
@section('title')
KeyWord
@endsection

@section('content')
<div class="row">
    <div class="card">
        <form action="{{ route('get_backend.keyword.update', $keyword) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{$keyword->name}}">
            </div>
            <div class="form-group">
                <label for="des">Description</label>
                <input type="text" class="form-control" name="description" value="{{ $keyword->description }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection