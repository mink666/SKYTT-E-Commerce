<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VinFast SKYTT — Demo</title>
@vite(['resources/js/app.js'])
</head>
<body class="min-h-screen antialiased text-slate-800 bg-white">
  {{-- NAVBAR từ layouts/navbar.blade.php --}}
  @include('layouts.navbar')

  <main>
    {{ $slot ?? '' }}
    @yield('content')
  </main>

  {{-- FOOTER từ layouts/footer.blade.php --}}
  @include('layouts.footer')

  @stack('scripts') 
</body>
</html>