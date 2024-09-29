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
        <div class="heading_container heading_center my-3">
            <h2>Checkout Cart</h2>
        </div>
        <div class="row d-flex justify-content-between my-3">
            <div class="col-md-4">
                <form action="{{ route('userOrderProduct') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="receiver_name">Full Name</label>
                        <input type="text" name="receiver_name" id="receiver_name" class="form-control fs-3"
                            placeholder="full name" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="receiver_address">Address</label>
                        <textarea name="receiver_address" id="receiver_address" class="form-control fs-3" cols="30" rows="10"
                            placeholder="address">{{ Auth::user()->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="receiver_phone">Phone</label>
                        <input type="number" name="receiver_phone" id="receiver_phone" class="form-control fs-3"
                            value="{{ Auth::user()->phone }}">
                        <small>Example: 81390xxx</small>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Order</button>
                    </div>
                </form>
            </div>
            <div class="col-md">
                <div class="row d-flex flex-column justify-content-center align-items-center my-3">
                    <div class="col-md">
                        <div class="table-responsive">
                            <table class="table table-sm text-center">
                                <thead class="fw-bold">
                                    <tr>
                                        <th class="align-middle">#</th>
                                        <th class="align-middle">Image</th>
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">Description</th>
                                        <th class="align-middle">Price (Rp)</th>
                                        <th class="align-middle"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $price_co = 0;
                                    @endphp
                                    @foreach ($user_carts as $ucart => $user_cart)
                                        <tr>
                                            <td class="align-middle">{{ $ucart + 1 }}</td>
                                            <td class="align-middle">
                                                <img src="/products/{{ $user_cart->product->image }}"
                                                    alt="{{ $user_cart->product->title }}" class="w-100 img-thumbnail">
                                            </td>
                                            <td class="align-middle">{{ $user_cart->product->title }}</td>
                                            <td class="align-middle">{{ $user_cart->product->description }}</td>
                                            <td class="align-middle">{{ $user_cart->product->price }}</td>
                                            <td class="align-middle">
                                                <a href="{{ url('/delete-product-cart', $user_cart->product->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="confirmation(event)">Delete</a>
                                            </td>
                                        </tr>
                                        @php
                                            $price_co += $user_cart->product->price;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="4" class="align-middle"><b>Total Price (Rp)</b></td>
                                        <td class="align-middle"><b>{{ $price_co }}</b></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart section -->

    <!-- footer section -->
    @include('home.footer')
    <!-- end footer section -->

    <script src="{{ asset('ecommerce/js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>
