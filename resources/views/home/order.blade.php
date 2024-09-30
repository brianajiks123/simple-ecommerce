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

    <!-- order section -->
    <div class="container">
        <div class="heading_container heading_center my-3">
            <h2>My Order</h2>
        </div>
        <div class="row d-flex flex-column justify-content-center align-items-center my-3">
            <div class="col-md">
                <div class="table-responsive">
                    <table class="table table-sm table-hover text-center">
                        <thead class="fw-bold">
                            <tr>
                                <th class="align-middle">#</th>
                                <th class="align-middle">Image</th>
                                <th class="align-middle">Product Name</th>
                                <th class="align-middle">Price (Rp)</th>
                                <th class="align-middle">Order Time</th>
                                <th class="align-middle">Delivery Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_orders as $uorder => $user_order)
                                <tr>
                                    <td class="align-middle">{{ $uorder + 1 }}</td>
                                    <td class="align-middle">
                                        <img src="/products/{{ $user_order->product->image }}"
                                            alt="{{ $user_order->product->title }}" height="150">
                                    </td>
                                    <td class="align-middle">{{ $user_order->product->title }}</td>
                                    <td class="align-middle">{{ $user_order->product->price }}</td>
                                    <td class="align-middle">{{ \Carbon\Carbon::parse($user_order->created_at)->format('d-m-Y H:i:s') }}</td>
                                    <td class="align-middle">
                                        @if ($user_order->status === 'in progress')
                                            <span class="badge text-bg-danger">in progress</span>
                                        @elseif($user_order->status === 'On the way')
                                            <span class="badge text-bg-warning">On the way</span>
                                        @elseif($user_order->status === 'Delivered')
                                            <span class="badge text-bg-success">Delivered</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4 d-flex justify-content-center align-items-center">
                        {{ $user_orders->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end order section -->

    <!-- footer section -->
    @include('home.footer')
    <!-- end footer section -->

    <script src="{{ asset('ecommerce/js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('ecommerce/js/custom.js') }}"></script>
</body>

</html>
