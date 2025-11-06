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
    <ul class="hidden md:flex list-none gap-8 text-sm fw-semibold text-[var(--skytt-text)] items-center"> <li><a href="{{ route('about') }}" class="hover:opacity-70">Giới thiệu</a></li>

      @if(isset($bikesByType) && $bikesByType->isNotEmpty())
        <li
            x-data="{
              isOpen: false,
              activeTab: '{{ $bikesByType->keys()->first() }}'
            }"
            @click.away="isOpen = false"
        >

            <button
               type="button"
               class="hover:opacity-70 flex items-center gap-1"
               @click.prevent="isOpen = !isOpen"
               :class="{ 'opacity-70': isOpen }">
                Sản phẩm
            </button>

            <div x-show="isOpen"
                 x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="border-t fixed top-[var(--nav-h)] left-0 right-0 bg-white border-b shadow-lg"
            >
                <div class="container mx-auto p-6">

                    <nav class="flex justify-center gap-18 mt-4">
                        @foreach($bikesByType->keys() as $type)
                            <button
                                @click="activeTab = '{{ $type }}'"
                                class="no-underline pb-2 transition-all duration-200 ease-linear"
                                :class="{
                                    'text-[#3D5A17] font-bold text-lg scale-105': activeTab === '{{ $type }}',
                                    'font-normal text-base': activeTab !== '{{ $type }}'
                                }"
                            >
                                {{ $type }}
                            </button>
                        @endforeach
                    </nav>

                    <div class="py-4 relative min-h-[200px]">
                        @foreach($bikesByType as $type => $bikes)
                            <div
                                 class="absolute inset-0 transition-opacity duration-300 ease-in-out"
                                 :class="{
                                     'opacity-100 pointer-events-auto': activeTab === '{{ $type }}',
                                     'opacity-0 pointer-events-none': activeTab !== '{{ $type }}'
                                 }"
                            >
                                <div class="flex flex-wrap justify-center gap-10">
                                    @foreach($bikes as $bike)
                                        <a href="{{ route('products.show', $bike) }}" class="flex flex-col items-center rounded-lg hover:bg-gray-100 w-40">

                                            <img src="{{ asset($bike->variants->first()->image_url ?? 'images/default-bike.png') }}"
                                                 alt="{{ $bike->name }}"
                                                 class="w-32 h-32 object-contain flex-shrink-0">
                                            <span class="text-xl font-normal text-gray-800 text-center mt-2">{{ $bike->name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-center mt-1">
                        <a href="{{ route('products.index') }}" class="text-sm text-[#0B2434] hover:underline">
                            See all products &rarr;
                        </a>
                    </div>

                </div>
            </div>
        </li>
      @else
        <li><a href="{{ route('products.index') }}" class="hover:opacity-70">Sản phẩm</a></li>
      @endif

      <li><a href="{{ route('news.index') }}"   class="hover:opacity-70">Tin tức</a></li>
      <li><a href="{{ route('promotions.index') }}" class="hover:opacity-70">Khuyến mãi</a></li>
      <li><a href="#phu-tung"  class="hover:opacity-70">Phụ tùng</a></li>
      <li><a href="{{ route('service') }}"   class="hover:opacity-70">Dịch vụ</a></li>
    </ul>

    {{-- CTA phải: Liên hệ (pill xanh) --}}
    <a href="#" @click.prevent="isContactModalOpen = true" class="btn-pil">
    Liên hệ
    <span class="arrow-bubble">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M9 7h8v8"/>
        </svg>
    </span>
    </a>
  </div>
</nav>
