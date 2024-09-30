<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap core css -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Message From Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table th,
        .details-table td {
            border: 1px solid #f2f2f2;
            padding: 8px;
            text-align: center;
        }

        .details-table th {
            background-color: #f2f2f2;
        }

        .order-details {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="order-details">
            <table class="details-table">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $data['name'] }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td>{{ $data['email'] }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>:</td>
                        <td>{{ $data['phone'] }}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>:</td>
                        <td>{{ $data['msg'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
