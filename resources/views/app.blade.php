<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Laravel</title>
    <!-- <link rel="stylesheet" href="{{ asset('mystyle.css') }}"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    @include('partials.header')

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
