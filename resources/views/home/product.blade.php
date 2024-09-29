<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <a href="">
                            <div class="img-box">
                                <img src="products/{{ $product->image }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    {{ $product->title }}
                                </h6>
                                <h6>
                                    <span>
                                        Rp. {{ $product->price }}
                                    </span>
                                </h6>
                            </div>
                            <div class="new bg-info fw-bold text-white">
                                <span>
                                    New
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="">
                View All Products
            </a>
        </div>
    </div>
</section>
