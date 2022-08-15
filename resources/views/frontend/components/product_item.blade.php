@isset($product)
    @php
    $prevPrice = $product->price * ((100 - $product->sale) / 100);
    @endphp
    <div class="single-product">
        <div class="pro-img">
            <a href="{{ route('get.product.detail', $product->slug . '-' . $product->id) }}">
                <img class="primary-img" src="{{ pare_url_file($product->avatar) }}" alt="single-product">
            </a>
            <a href="{{ route('get.product.detail', 'san-pham-1') }}" class="quick_view" data-toggle="modal"
                data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
        </div>
        <div class="pro-content">
            <div class="pro-info">
                <h4>
                    <a href="{{ route('get.product.detail', 'san-pham-1') }}">
                        {{ $product->name }}
                    </a>
                </h4>
                @if ($product->sale > 0)
                    <p>
                        <span class="price">{{ $prevPrice }}</span>
                        <del class="prev-price">{{ $product->price }}</del>
                    <div class="label-product l_sale">
                        {{ $product->sale }}<span class="symbol-percent">%</span>
                    </div>
                    </p>
                @else
                    <span class="price">{{ $product->price }}</span>
                @endif
            </div>
            <div class="pro-actions">
                <div class="actions-primary">
                    <a href="{{ route('shopping.add', $product->id) }}" title="Add to Cart"> + Add To Cart</a>
                </div>
                <div class="actions-secondary">
                    <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i>
                        <span>Add to WishList</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endisset
