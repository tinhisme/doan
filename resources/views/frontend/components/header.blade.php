<div class="wrapper">
    <header>
        <div class="header-top-area home-4">
            <div class="container">
                <div class="header-top">
                    <ul>
                        <li><a href="#">Free Shipping on order over $99</a></li>
                        <li><a href="#">Shopping Cart</a></li>
                        <li><a href="#">Checkout</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">My Account<i class="lnr lnr-chevron-down"></i></a>
                            <ul class="ht-dropdown">
                                @if (Auth::check())
                                    <li><a href="">{{ Auth::user()->name }}</a></li>
                                    <li><a href="{{ route('logout') }}">Logout</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-middle ptb-15 black-bg2 home-4">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-lg-3 col-md-12">
                        <div class="logo mb-all-30">
                            <a href="index.html"><img src="{{ asset('img\logo\logo2.png') }}" alt="logo-image"></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-8 col-10 ml-auto mr-auto">
                        <div class="categorie-search-box">
                            <form>
                                <input type="text" name="search" placeholder="I’m shopping for...">
                                <button><i class="lnr lnr-magnifier"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="cart-box mt-all-30">
                            <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                <li>
                                    <a href="{{ route('shopping.list') }}">
                                        <i class="lnr lnr-cart"></i>
                                        <span class="my-cart">
                                            <span class="total-pro">{{ Cart::count() }}</span>
                                            <span>cart</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"><i class="lnr lnr-heart"></i>
                                        <span class="my-cart">
                                            <span>Wish</span><span>list (0)</span>
                                        </span>
                                    </a>
                                </li>
                                <li><a href="#"><i class="lnr lnr-user"></i><span class="my-cart"><span>
                                                <strong>Sign
                                                    in</strong> Or</span><span> Join My Site</span></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-sticky black-bg2 home-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                        <span class="categorie-title">Shop by Categories</span>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-12">
                        <nav class="d-none d-lg-block">
                            <ul class="header-bottom-list d-flex">
                                <li class="active">
                                    <a href="{{ route('get.home') }}">home</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.product.list') }}">Shop</a>
                                </li>
                                <li>
                                    <a href="#">blog</a>
                                </li>
                                <li>
                                    <a href="#">About us</a>
                                </li>
                                <li>
                                    <a href="#">contact us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
