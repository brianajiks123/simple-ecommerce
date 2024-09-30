<!DOCTYPE html>
<html>

<head>
    @include('home.head')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <!-- end hero area -->

    <!-- shop section -->
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>All Products</h2>
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
                                        JPY. {{ $product->price }}
                                    </span>
                                </h6>
                            </div>
                            <div class="detail-box mt-3">
                                <a href="{{ url('product', $product->id) }}"
                                    class="btn btn-primary text-white">Details</a>
                                <a href="{{ url('add-cart', $product->id) }}" class="btn btn-success text-white">Add
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end shop section -->

    <!-- footer section -->
    @include('home.footer')
    <!-- end footer section -->

    <script src="{{ asset('ecommerce/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('ecommerce/js/custom.js') }}"></script>
</body>

</html>
