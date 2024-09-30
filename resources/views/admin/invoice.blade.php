<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simple E-Commerce | Print Order Product</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="robots" content="all,follow">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .title {
            text-align: center;
        }

        .order-table, .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-table th, .details-table th,
        .order-table td, .details-table td {
            border: 1px solid #f2f2f2;
            padding: 8px;
            text-align: center;
        }

        .order-table th, .details-table th {
            background-color: #f2f2f2;
        }

        .order-details {
            margin-top: 20px;
        }

        .product-image {
            width: 100%;
            display: block;
            margin: 20px auto;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }

        .badge.danger {
            background-color: red;
        }

        .badge.warning {
            background-color: orange;
        }

        .badge.success {
            background-color: green;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="title">Simple E-Commerce</h1>
        <hr>
        <table class="order-table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Order Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->receiver_address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i:s') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="order-details">
            <table class="details-table">
                <tbody>
                    <tr>
                        <th>Product Name</th>
                        <td>:</td>
                        <td>{{ $order->product->title }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>:</td>
                        <td>{{ $order->product->description }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>:</td>
                        <td>{{ $order->product->price }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td>
                            @if ($order->status === 'in progress')
                                <span class="badge danger">in progress</span>
                            @elseif($order->status === 'On the way')
                                <span class="badge warning">On the way</span>
                            @elseif($order->status === 'Delivered')
                                <span class="badge success">Delivered</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            <img src="products/{{ $order->product->image }}" alt="{{ $order->product->title }}" class="product-image">
        </div>
    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Brian Aji Pamungkas</p>
    </footer>
</body>

</html>
