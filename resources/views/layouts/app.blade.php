<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('include.styles')
    <title>app</title>
</head>

<body>
    @include('layouts.navbar')
    <div class="container">
        @yield('content')
    </div>
</body>
    @include('include.scripts')
</html>