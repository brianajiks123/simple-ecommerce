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

    <!-- product section strats -->
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Latest Products</h2>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md">
                    <div class="box">
                        <div class="d-flex justify-content-center align-items-center p-3">
                            <img src="/products/{{ $product->image }}" alt="{{ $product->title }}" height="400">
                        </div>
                        <div class="detail-box mb-2">
                            <h6>{{ $product->title }}</h6>
                            <h6>
                                <span>
                                    Rp. {{ $product->price }}
                                </span>
                            </h6>
                        </div>
                        <div class="detail-box mb-2">
                            <h6>Category: {{ $product->category }}</h6>
                            <h6>Qty:
                                <span>
                                    {{ $product->quantity }}
                                </span>
                            </h6>
                        </div>
                        <div class="detail-box m-2 text-center">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center mt-5">
                <div class="col-md text-center">
                    <a href="{{ url('add-cart', $product->id) }}" class="btn btn-success text-white">Add
                        Cart</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end product section -->

    <!-- footer section -->
    @include('home.footer')
    <!-- end footer section -->

    <script src="{{ asset('ecommerce/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('ecommerce/js/custom.js') }}"></script>
</body>

</html>
