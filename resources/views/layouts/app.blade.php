<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images\ecology.png')}}" alt="Seeds of Change Logo" width="30" height="30" class="d-inline-block align-top" loading="lazy">
            Seeds of Change
        </a>
        <!-- Add navigation links, dropdown menus, etc. here -->
    </nav>
</header>

    @yield('content')


<footer class="footer">
        <div class="container">
            <span class="text-muted">Your footer content goes here.</span>
        </div>
</footer>
</body>
</html>

