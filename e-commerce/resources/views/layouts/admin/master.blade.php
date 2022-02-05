<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.admin.head')
</head>
<body>
    @include('layouts.admin.header')

    <!-- content -->
    <div class="container mt-5">
        <div class="wrapper row d-flex justify-content-center">
            @yield('content')
        </div>
    </div>

    {{-- data table --}}
    <script src="{{ asset('js/datatable.js') }}"></script>
</body>
</html>
