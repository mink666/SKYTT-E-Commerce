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
  // nửa khối chứa text: lẻ -> xám, chẵn -> xanh lá
  $toneClass = $tone === 'green'
    ? 'bg-[var(--skytt-footer-bg)]'  // #E5EBDE đã khai báo trong :root
    : 'bg-slate-50';
@endphp

<section {{ $attributes->merge(['class' => 'rounded-[28px] overflow-hidden']) }}>  <div class="grid lg:grid-cols-2 items-stretch">

    @if(!$reverse)
      {{-- TEXT first --}}
      <div class="flex items-center justify-center p-8 md:p-12 {{ $toneClass }}">
        <div class="text-center max-w-xl">
          @if($icon)
            <img src="{{ asset($icon) }}" alt="" class="mx-auto mb-6 w-20 h-20 object-contain" />
          @endif
          <h3 class="text-xl md:text-2xl font-semibold">{{ $title }}</h3>
          <p class="mt-3 text-slate-600">{{ $desc }}</p>
        </div>
      </div>

      {{-- IMAGE second --}}
      <div class="relative {{ $height }}">
        <img src="{{ asset($image) }}" alt="{{ $title }}"
             class="absolute inset-0 w-full h-full object-cover" />
      </div>

    @else
      {{-- IMAGE first (đảo) --}}
      <div class="relative {{ $height }}">
        <img src="{{ asset($image) }}" alt="{{ $title }}"
             class="absolute inset-0 w-full h-full object-cover" />
      </div>

      {{-- TEXT second (đảo) --}}
      <div class="flex items-center justify-center p-8 md:p-12 {{ $toneClass }}">
        <div class="text-center max-w-xl">
          @if($icon)
            <img src="{{ asset($icon) }}" alt="" class="mx-auto mb-6 w-20 h-20 object-contain" />
          @endif
          <h3 class="text-xl md:text-2xl font-semibold">{{ $title }}</h3>
          <p class="mt-3 text-slate-600">{{ $desc }}</p>
        </div>
      </div>
    @endif

  </div>
</section>
