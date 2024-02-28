<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('include.styles')
    <title>app</title>
</head>

<body >
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')

    <!-- Scripts al final del cuerpo del documento -->
    @include('include.scripts')
</body>

</html>
