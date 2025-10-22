@props([
  'image'  => null,
  'title',
  'badge'  => 'Xe điện',
  'price'  => null,
  'stats'  => [],
  'cta'    => ['label' => 'Tìm hiểu thêm','href' => '#'],
  'variant' => 'default',

  // === PROPS MỚI (VẪN GIỮ NGUYÊN) ===
  'newBadge' => false,
  'topRightTitle' => null,
  'topRightSubtitle' => null,
])

@if($variant === 'thumb')
  {{-- 
    === ĐIỀU CHỈNH BIẾN THỂ THUMB ===
    Chỉ render hộp ảnh (nền xám) và các text overlay.
    Text chính, giá, nút bấm sẽ nằm BÊN NGOÀI component (trong home.blade.php)
  --}}
  <article class="rounded-2xl border border-slate-200 bg-gray-100 shadow-sm overflow-hidden relative aspect-square">
    
    {{-- Ảnh sản phẩm --}}
    @if($image)
     <img src="{{ asset($image) }}" alt="{{ $title }}"
           class="w-full h-full object-contain px-2 pt-12 pb-1">
    @endif

    {{-- Nhãn "Mới" (Góc trái) --}}
    @if($newBadge)
      <span class="absolute top-4 left-0 bg-[#F66E7A] text-white text-xs font-bold px-6 py-1.5"
            style="clip-path: polygon(0 0, 100% 0, calc(100% - 10px) 50%, 100% 100%, 0 100%);">
        Mới
      </span>
    @endif

    {{-- Text (Góc phải) --}}
    <div class="absolute top-4 right-4 text-right">
      @if($topRightTitle)
       <div class="text-xl font-extrabold text-slate-700 uppercase">{{ $topRightTitle }}</div>
      @endif
      @if($topRightSubtitle)
        <div class="text-sm text-slate-500">{{ $topRightSubtitle }}</div>
      @endif
    </div>

    {{-- Mũi tên mờ --}}
    <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-300 select-none">‹</span>
    <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-slate-300 select-none">›</span>
    
    {{-- 
      PHẦN NỘI DUNG (TITLE, PRICE, CTA) ĐÃ BỊ XOÁ KHỎI ĐÂY.
      Nó sẽ được đặt trở lại trong home.blade.php
    --}}
  </article>

@else
  {{-- Biến thể DEFAULT: giữ nguyên layout cũ --}}
  <article class="rounded-xl border shadow-sm overflow-hidden bg-white">
    {{-- ... (phần này giữ nguyên không đổi) ... --}}
    @if($image)
      <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    @endif
    <div class="p-5">
      <div class="text-xs uppercase tracking-wide text-slate-500">{{ $badge }}</div>
      <h3 class="mt-1 text-xl font-semibold">{{ $title }}</h3>
      @if($price)
        <div class="mt-1 font-medium text-emerald-600">{{ $price }}</div>
      @endif
      @if(!empty($stats))
        <dl class="mt-4 grid grid-cols-3 gap-4 text-sm">
          @foreach($stats as $s)
            <div>
              <dt class="text-slate-500">{{ $s['label'] }}</dt>
              <dd class="font-medium">{{ $s['value'] }}</dd>
            </div>
          @endforeach
        </dl>
      @endif
      <div class="mt-5">
        <x-btn :href="$cta['href'] ?? '#'" :label="$cta['label'] ?? 'Tìm hiểu thêm'" />
      </div>
    </div>
  </article>
@endif