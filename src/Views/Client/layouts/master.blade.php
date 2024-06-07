<!DOCTYPE html>
<html lang="zxx">
<head>
    @include('layouts.partials.head')
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.partials.nav')
    @include('layouts.partials.header')

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.partials.footer')
</body>
</html>
