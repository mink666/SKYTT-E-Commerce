<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SKYTT')</title>
</head>

<body>
    <div>
        <header>
            @include('layouts.navbar')
        </header>

        <div class="content">
            @yield('content')
        </div>

        <footer>
            @include('layouts.footer')
        </footer>
    </div>
</body>

</html>
