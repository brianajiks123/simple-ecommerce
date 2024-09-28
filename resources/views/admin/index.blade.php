<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple E-Commerce | Home Page</title>
</head>
<body>
    <h1>Admin Page</h1>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <input type="submit" value="Logout">
    </form>
</body>
</html>
