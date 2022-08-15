<!-- Categorie Menu & Slider Area Start Here -->
<div class="main-page-banner black-bg2 home-3">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <nav>
                        <ul class="vertical-menu-list">
                            <!-- More Categoies Start -->
                            <li id="cate-toggle" class="category-menu v-cat-menu">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a
                                                href="{{ route('get.category', $category->slug . '-' . $category->id) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- More Categoies End -->
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Vertical Menu End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Categorie Menu & Slider Area End Here -->
