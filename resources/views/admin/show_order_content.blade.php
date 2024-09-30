<div class="page-header">
    <div class="container-fluid d-flex">
        <div class="col text-start">
            <h2 class="h5 no-margin-bottom">Order Product</h2>
        </div>

        <div class="col text-end">
            <form action="{{ route('adminSearchOrderProduct') }}" method="get">
                @csrf

                <div class="row">
                    <div class="col-8">
                        <input type="search" name="search_order_product" id="search_order_product"
                            class="form-control fs-6" placeholder="search order product">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-outline-secondary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Show Order Product --}}
<div class="m-3">
    <div class="table-responsive">
        <table class="table table-sm table-hover table-dark text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price (JPY)</th>
                    <th>Status</th>
                    <th>Payment Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $ord => $order)
                    <tr>
                        <td class="align-middle">{{ $ord + 1 }}</td>
                        <td class="align-middle">{{ $order->name }}</td>
                        <td class="align-middle">{{ $order->receiver_address }}</td>
                        <td class="align-middle">{{ $order->phone }}</td>
                        <td class="align-middle">
                            <img src="{{ asset('products/' . $order->product->image) }}"
                                alt="{{ $order->product->title }}" height="120" width="120"
                                class="img-fluid mx-auto d-block">
                        </td>
                        <td class="align-middle">{{ $order->product->title }}</td>
                        <td class="align-middle">{{ $order->product->price }}</td>
                        <td class="align-middle">
                            @if ($order->status === 'in progress')
                                <span class="badge text-bg-danger">in progress</span>
                            @elseif($order->status === 'On the way')
                                <span class="badge text-bg-warning">On the way</span>
                            @elseif($order->status === 'Delivered')
                                <span class="badge text-bg-success">Delivered</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($order->payment_status === 'Paid')
                                <span class="badge text-bg-success">Paid</span>
                            @elseif($order->payment_status === 'Cash on Delivery')
                                <span class="badge text-bg-warning">Cash on Delivery</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            <div class="row d-flex flex-column justify-content-center align-items-center">
                                <div class="col mb-3">
                                    <a href="{{ url('/admin/process-otw', $order->id) }}" class="btn btn-sm btn-warning">On the
                                        way</a>
                                </div>
                                <div class="col">
                                    <a href="{{ url('/admin/process-delivered', $order->id) }}"
                                        class="btn btn-sm btn-success">Delivered</a>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <a href="{{ url('/admin/print-order-product', $order->id) }}" class="btn btn-sm btn-primary">Print
                                PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 d-flex justify-content-center align-items-center">
            {{ $orders->onEachSide(1)->links() }}
        </div>
    </div>
</div>
