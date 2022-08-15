@extends('layouts.app_frontend')
@section('content')
@include('frontend.components.slider')
<!-- new product -->
<div class="like-product ptb-95 ptb-sm-55 off-white-bg">
    <div class="container">
        <div class="like-product-area">
            <h2 class="section-ttitle2 mb-30">New Products </h2>
            <div class="like-pro-active owl-carousel">
                @foreach ($productNews as $product)
                @include('frontend.components.product_item', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- hot product -->
<div class="like-product ptb-95 ptb-sm-55 off-white-bg">
    <div class="container">
        <div class="like-product-area">
            <h2 class="section-ttitle2 mb-30">Hot Products</h2>
            <div class="like-pro-active owl-carousel">
                @foreach ($productHots as $productHot)
                @include('frontend.components.product_item', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Best seller -->
<div class="second-arrivals-product pb-45 pb-sm-5">
    <div class="container">
        <div class="main-product-tab-area">
            <div class="tab-menu mb-25">
                <div class="section-ttitle">
                    <h2>Best Seller</h2>
                </div>
            </div>
            <div class="tab-content">
                <div id="electronics2" class="tab-pane fade show active">
                    <div class="best-seller-pro-active owl-carousel">
                        @for ($i = 0; $i < 10; $i++) @include('frontend.components.product_item') @endfor </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection