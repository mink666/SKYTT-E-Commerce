@props([
  'href'    => '#',
  'label'   => 'Tìm hiểu thêm',
  'variant' => 'primary',     // primary | outline | light
  'size'    => 'md',          // sm | md | lg
  'full'    => false,
  'target'  => null,
  'arrow'   => false,         // true -> thêm icon mũi tên tròn
])

@php
  $variants = [
    'primary' => 'bg-[var(--skytt-btn)] text-white hover:opacity-95',
    'outline' => 'border border-slate-300 text-[var(--skytt-text)] hover:bg-slate-100',
    'light'   => 'bg-white text-[var(--skytt-text)] border hover:bg-slate-100',
  ];
  $sizes = [
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-5 py-3',
    'lg' => 'px-6 py-3 text-base',
  ];
  $classes = implode(' ', [
    'inline-flex items-center justify-center rounded-full fw-semibold transition',
    $variants[$variant] ?? $variants['primary'],
    $sizes[$size] ?? $sizes['md'],
    $full ? 'w-full' : '',
    $arrow ? 'gap-3 pr-3' : '', // chừa khoảng cho bubble
  ]);
@endphp

<a href="{{ $href }}"
   {{ $attributes->merge(['class' => $classes]) }}
   @if($target) target="{{ $target }}" rel="noopener" @endif>
  <span>{{ $label }}</span>

  @if($arrow)
    <span class="arrow-bubble">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M9 7h8v8"/>
      </svg>
    </span>
  @endif
</a>
