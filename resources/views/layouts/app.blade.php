<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>VinFast SKYTT — Demo</title>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@vite(['resources/js/app.js'])
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body x-data="{ isContactModalOpen: false }" class="min-h-screen antialiased text-slate-800 bg-white">

    @include('layouts.navbar')

  <main>
    {{ $slot ?? '' }}
    @yield('content')
  </main>


  @include('layouts.footer')
  @include('components.contact-modal')
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
      AOS.init({
        duration: 1000, // Tốc độ chạy hiệu ứng (ms)
        once: true     // Chỉ chạy hiệu ứng 1 lần duy nhất
      });
    </script>
  @stack('scripts')
</body>
</html>
