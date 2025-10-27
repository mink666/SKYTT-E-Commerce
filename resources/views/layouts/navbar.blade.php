<nav class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b" style="--nav-h: 96px;">
  <div class="container mx-auto px-4 h-[var(--nav-h)] flex items-center justify-between">
    <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
      <img
        src="{{ asset('images/logo.png') }}"
        alt="VinFast SKYTT"
        class="h-12 md:h-16 w-auto object-contain"
      >
    </a>

    {{-- Menu giữa --}}
    <ul class="hidden md:flex list-none gap-8 text-sm fw-semibold text-[var(--skytt-text)]">
      <li><a href="{{ route('about') }}" class="hover:opacity-70">Giới thiệu</a></li>
      <li><a href="{{ route('products.index') }}"  class="hover:opacity-70">Sản phẩm</a></li>
      <li><a href="{{ route('news.index') }}"   class="hover:opacity-70">Tin tức</a></li>
      <li><a href="{{ route('promotions.index') }}" class="hover:opacity-70">Khuyến mãi</a></li>
      <li><a href="#phu-tung"  class="hover:opacity-70">Phụ tùng</a></li>
      <li><a href="{{ route('service') }}"   class="hover:opacity-70">Dịch vụ</a></li>
    </ul>

    {{-- CTA phải: Liên hệ (pill xanh) --}}
    <a href="#lien-he" class="btn-pil">
      Liên hệ
      <span class="arrow-bubble">
        {{-- mũi tên lên phải --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M9 7h8v8"/>
        </svg>
      </span>
    </a>
  </div>
</nav>
