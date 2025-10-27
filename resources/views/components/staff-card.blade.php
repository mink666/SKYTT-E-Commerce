@props([
  'name'       => '',
  'avatar'     => '',         // images/staff/abc.jpg
  'branch'     => '',         // Cửa hàng trưởng CN1 (Quận 2)
  'address'    => '',         // 128 Nguyễn Thị Định, ...
  'hotline'    => '',         // 0968 172 217
  'experience' => '',         // 7+ năm bán lẻ xe...
  'cta'        => ['label' => 'Liên hệ ngay', 'href' => '#'],
])

<article
  {{ $attributes->merge([
      'class' =>
        // BỎ "border" ở đây
        'relative w-[344px] h-[279px] rounded-[20px] bg-white
         shadow-[0_10px_28px_rgba(16,24,40,.08)] overflow-hidden
         px-5 pt-6 pb-5'
  ]) }}
>
  {{-- Avatar giữ nguyên --}}
  @if($avatar)
    <img
      src="{{ asset($avatar) }}" alt="{{ $name }}"
      class="absolute right-5 top-5 w-[88px] h-[88px] rounded-full object-cover ring-4 ring-white shadow-md"
    >
  @endif

  {{-- Nút Liên hệ ngay: nền xanh, chữ trắng, chấm tròn trắng --}}
  <a href="{{ $cta['href'] ?? '#' }}"
     class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-[13px]
            bg-[var(--skytt-btn)] text-white transition-colors
            hover:bg-[#2f4510]">
    {{ $cta['label'] ?? 'Liên hệ ngay' }}

    <span class="grid place-items-center w-6 h-6 rounded-full bg-white text-[var(--skytt-btn)]">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 5l8 7l-8 7"/>
      </svg>
    </span>
  </a>

  {{-- phần còn lại giữ nguyên --}}
  <h3 class="mt-3 text-[18px] font-semibold leading-tight pr-[110px]">
    {{ $name }}
  </h3>

  <div class="mt-3 text-[13px] leading-relaxed text-slate-600 pr-[110px]">
    @if($branch) <div>{{ $branch }}</div> @endif
    @if($address) <div>{{ $address }}</div> @endif
  </div>

  <div class="mt-4 space-y-1 text-[13px] leading-relaxed pr-[5px]">
    @if($hotline)
      <div>
        <span class="text-slate-600">Hotline CN1:</span>
        <span class="font-semibold">{{ $hotline }}</span>
      </div>
    @endif
    @if($experience)
      <div class="text-slate-600">{{ $experience }}</div>
    @endif
  </div>
</article>
