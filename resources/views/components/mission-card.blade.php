@props([
  'title' => 'Tiêu đề sứ mệnh',
  'desc'  => 'Mô tả ngắn cho sứ mệnh.',
  // icon: bolt | users | headset (có thể mở rộng thêm)
  'icon'  => 'bolt',
  // màu nền nhẹ của card
  'bg'    => 'bg-slate-100',
])

@php
  $icons = [
    'bolt' => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h6v7l9-11h-6z"/>',
    'users' => '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-4-4h-1m-4 6H2v-2a4 4 0 014-4h6m-3-4a4 4 0 110-8 4 4 0 010 8z"/>',
    'headset' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 13a8 8 0 1116 0v4a2 2 0 01-2 2h-2v-6h4M6 19H4a2 2 0 01-2-2v-4a8 8 0 018-8"/>',
  ];
@endphp

<article {{ $attributes->merge(['class' => "rounded-2xl {$bg} p-8"]) }}>
  <div class="w-12 h-12 rounded-full bg-white/70 grid place-items-center shadow-sm">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      {!! $icons[$icon] ?? $icons['bolt'] !!}
    </svg>
  </div>
  <h3 class="mt-3 text-xl font-semibold">{{ $title }}</h3>
  <p class="mt-2 text-slate-600 leading-relaxed">{{ $desc }}</p>
</article>
