@extends('layouts.app_frontend')
@section('content')
<div class="main-shop-page pt-100 pb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            @include('frontend.pages.product.include.sidebar')
            @include('frontend.pages.product.include.product_list')
        </div>
    </div>
</div>
@endsection