<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.shopping.head')
</head>
<body class="body">
    @include('layouts.shopping.header')
    @include('layouts.shopping.sidebar')
    @yield('content')
    @include('layouts.shopping.footer')
</body>
</html>
