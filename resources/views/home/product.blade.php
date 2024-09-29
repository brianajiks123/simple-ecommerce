<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Latest Products</h2>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="products/{{ $product->image }}" alt="{{ $product->title }}">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $product->title }}</h6>
                            <h6>
                                <span>
                                    Rp. {{ $product->price }}
                                </span>
                            </h6>
                        </div>
                        <div class="new bg-info fw-bold text-white">
                            <span>New</span>
                        </div>

                        <div class="row d-flex justify-content-center align-items-center mt-3">
                            <div class="col">
                                <a href="{{ url('product', $product->id) }}" class="btn btn-primary text-white">Details</a>
                            </div>
                            <div class="col ml-3">
                                <a href="{{ url('add-cart', $product->id) }}" class="btn btn-success text-white">Add Cart</a>
                            </div>
                        </div>
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
