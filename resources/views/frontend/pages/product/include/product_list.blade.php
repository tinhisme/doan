<div class="col-lg-9 order-lg-2 order-1">
    <div
        class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
        <div class="grid-list-view mb-sm-15">
            <ul class="nav tabs-area d-flex align-items-center">
                <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- Grid & List View End -->
    <div class="main-categorie mb-all-40">
        <div class="tab-content fix">
            <div id="grid-view" class="tab-pane fade show active">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            @include('frontend.components.product_item')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Single Product End -->
    </div>
