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

    <!-- cart section -->
    <div class="container">
        <div class="heading_container heading_center mt-3">
            <h2>Checkout Cart</h2>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md">
                <div class="table-responsive">
                    <table class="table table-sm table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price (Rp)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_carts as $ucart => $user_cart)
                                <tr>
                                    <td class="align-middle">{{ $ucart + 1 }}</td>
                                    <td class="align-middle">
                                        <img src="/products/{{ $user_cart->product->image }}"
                                            alt="{{ $user_cart->product->title }}" width="250">
                                    </td>
                                    <td class="align-middle">{{ $user_cart->product->title }}</td>
                                    <td class="align-middle">{{ $user_cart->product->description }}</td>
                                    <td class="align-middle">{{ $user_cart->product->price }}</td>
                                    <td class="align-middle">
                                        <a href="{{ url('/delete-product-cart', $user_cart->product->id) }}"
                                            class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart section -->

    <!-- footer section -->
    @include('home.footer')
    <!-- end footer section -->

    <script src="{{ asset('ecommerce/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('ecommerce/js/custom.js') }}"></script>

    {{-- Sweet Alert v2.1.2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Custom Script --}}
    <script type="text/javascript">
        function confirmation(event) {
            event.preventDefault();

            var urlToRedirect = event.currentTarget.getAttribute('href');

            swal({
                title: "Delete Confirmation",
                text: "Are you sure to delete this?",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((canceled) => {
                if (canceled) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
</body>

</html>
