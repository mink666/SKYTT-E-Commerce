@props([
  'icon'   => '',
  'title'  => '',
  'desc'   => '',
  'image'  => '',
  'reverse'=> false,
  'height' => 'h-[380px] md:h-[440px] lg:h-[500px]',
  'tone'   => 'gray',     // 'gray' | 'green'
])

@php
  // Container background logic
  $toneClass = $tone === 'green'
    ? 'bg-[var(--skytt-footer-bg)]'
    : 'bg-slate-50';
@endphp

<section {{ $attributes->merge(['class' => 'rounded-[28px] overflow-hidden']) }}>
  {{-- CHANGED: Removed 'lg:' so it is ALWAYS 2 columns (horizontal) --}}
  <div class="grid grid-cols-2 items-stretch">

    @if(!$reverse)
      {{-- TEXT first --}}
      {{-- CHANGED: Reduced padding for mobile (p-4) to fit half-width --}}
      <div class="flex items-center justify-center p-4 md:p-12 {{ $toneClass }}">
        <div class="text-center max-w-xl">
          @if($icon)
            {{-- CHANGED: Responsive icon size (smaller on mobile) --}}
            <img src="{{ asset($icon) }}" alt="" class="mx-auto mb-3 md:mb-6 w-10 h-10 md:w-20 md:h-20 object-contain" />
          @endif
          {{-- CHANGED: Responsive text size --}}
          <h3 class="text-sm md:text-2xl font-semibold">{{ $title }}</h3>
          <p class="mt-2 md:mt-3 text-xs md:text-base text-slate-600">{{ $desc }}</p>
        </div>
      </div>

      {{-- IMAGE second --}}
      <div class="relative {{ $height }}">
        <img src="{{ asset($image) }}" alt="{{ $title }}"
             class="absolute inset-0 w-full h-full object-cover" />
      </div>

    @else
      {{-- IMAGE first (Reversed) --}}
      <div class="relative {{ $height }}">
        <img src="{{ asset($image) }}" alt="{{ $title }}"
             class="absolute inset-0 w-full h-full object-cover" />
      </div>

      {{-- TEXT second (Reversed) --}}
      {{-- CHANGED: Reduced padding for mobile --}}
      <div class="flex items-center justify-center p-4 md:p-12 {{ $toneClass }}">
        <div class="text-center max-w-xl">
          @if($icon)
            {{-- CHANGED: Responsive icon size --}}
            <img src="{{ asset($icon) }}" alt="" class="mx-auto mb-3 md:mb-6 w-10 h-10 md:w-20 md:h-20 object-contain" />
          @endif
          {{-- CHANGED: Responsive text size --}}
          <h3 class="text-sm md:text-2xl font-semibold">{{ $title }}</h3>
          <p class="mt-2 md:mt-3 text-xs md:text-base text-slate-600">{{ $desc }}</p>
        </div>
      </div>
    @endif

  </div>
</section>
