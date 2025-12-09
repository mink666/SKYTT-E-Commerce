<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>VinFast SKYTT — Demo</title>

  {{-- Vite must come first --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  {{-- AOS CSS --}}
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

  {{-- Load scripts at the END of body --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  {{-- Initialize AOS after it loads --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      if (typeof AOS !== 'undefined') {
        AOS.init({
          duration: 1000,
          once: true
        });
      }
    });
  </script>

  @stack('scripts')
</body>
</html>
