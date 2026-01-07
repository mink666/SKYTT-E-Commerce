{{-- WRAPPER: Holds state for Nav, Sidebar, and Scroll Logic --}}
<div x-data="{
         mobileMenuOpen: false,
         mobileProductOpen: false,
         navVisible: true,
         lastScrollY: 0,
         showBackToTop: false,

         handleScroll() {
             const currentScroll = window.pageYOffset;

             // 1. Navbar Logic (Hide on Down, Show on Up)
             if (currentScroll > 100) {
                 this.navVisible = (currentScroll < this.lastScrollY);
             } else {
                 this.navVisible = true;
             }
             this.lastScrollY = currentScroll;

             // 2. Back to Top Button Logic (Show after 300px)
             this.showBackToTop = currentScroll > 300;
         },

         scrollToTop() {
             window.scrollTo({ top: 0, behavior: 'smooth' });
         }
     }"
     @scroll.window="handleScroll()"
     @keydown.escape.window="mobileMenuOpen = false"
     class="relative">

    {{-- ========================================================= --}}
    {{-- 1. SMART STICKY NAV BAR --}}
    {{-- ========================================================= --}}
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b transition-transform duration-300 ease-in-out"
         style="--nav-h: 96px;"
         :class="navVisible ? 'translate-y-0' : '-translate-y-full'">

        <div class="container mx-auto px-4 h-[var(--nav-h)] flex items-center justify-between">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 relative z-50">
                <img src="{{ asset('images/logo.png') }}"
                     alt="VinFast SKYTT"
                     class="h-10 md:h-16 w-auto object-contain">
            </a>

            {{-- DESKTOP MENU --}}
            <ul class="hidden md:flex list-none gap-8 text-sm fw-semibold text-[var(--skytt-text)] items-center">
                <li><a href="{{ route('about') }}" class="hover:opacity-70">Giới thiệu</a></li>

                {{-- Desktop Product Mega Menu --}}
                @if(isset($bikesByType) && $bikesByType->isNotEmpty())
                    {{-- Initialize activeTab with the first key from your sorted collection --}}
                    <li x-data="{ isOpen: false, activeTab: '{{ $bikesByType->keys()->first() }}' }"
                        @click.away="isOpen = false">
                        <button type="button"
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
                             class="border-t fixed top-[var(--nav-h)] left-0 right-0 bg-white border-b shadow-lg">
                            <div class="container mx-auto p-6">

                                {{-- TABS (Categories) --}}
                                <nav class="flex justify-center gap-18 mt-4">
                                    @foreach($bikesByType->keys() as $type)
                                        <button @click="activeTab = '{{ $type }}'"
                                                class="no-underline pb-2 transition-all duration-200 ease-linear uppercase tracking-wide"
                                                :class="{
                                                    'text-[#3D5A17] font-bold text-lg scale-105 border-b-2 border-[#3D5A17]': activeTab === '{{ $type }}',
                                                    'font-normal text-base text-gray-500 hover:text-[#3D5A17]': activeTab !== '{{ $type }}'
                                                }">
                                            {{ $type }}
                                        </button>
                                    @endforeach
                                </nav>

                                {{-- CONTENT (Bikes Grid) --}}
                                <div class="py-4 relative min-h-[230px] mt-4">
                                    @foreach($bikesByType as $type => $bikes)
                                        <div class="absolute inset-0 transition-opacity duration-300 ease-in-out"
                                             :class="{
                                                 'opacity-100 pointer-events-auto z-10': activeTab === '{{ $type }}',
                                                 'opacity-0 pointer-events-none z-0': activeTab !== '{{ $type }}'
                                             }">
                                            <div class="flex flex-wrap justify-center gap-10 mt-1">
                                                @foreach($bikes as $bike)
                                                    @php
                                                        $displayImage = 'images/default-bike.png'; // Fallback

                                                        if ($bike->variants->isNotEmpty()) {
                                                            $heroName = trim($bike->hero_image);
                                                            $heroVariant = $bike->variants->first(function($v) use ($heroName) {
                                                                return trim($v->color_name) === $heroName;
                                                            });

                                                            if ($heroVariant) {
                                                                $displayImage = $heroVariant->image_url;
                                                            } else {
                                                                $displayImage = $bike->variants->first()->image_url;
                                                            }
                                                        }
                                                    @endphp

                                                    <a href="{{ route('products.show', $bike) }}" class="group flex flex-col items-center w-48 p-4 rounded-xl transition-all duration-300 hover:bg-gray-50 hover:shadow-md">
                                                        <div class="w-40 h-32 flex items-center justify-center">
                                                            {{-- IMAGE FIX APPLIED HERE --}}
                                                            <img src="{{ asset($displayImage) }}"
                                                                 alt="{{ $bike->name }}"
                                                                 loading="lazy"
                                                                 decoding="async"
                                                                 class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110 drop-shadow-md {{ $bike->slug === 'theon-s' ? 'p-4' : '' }}">
                                                        </div>
                                                        <span class="text-lg font-bold text-[#0B2434] text-center uppercase">
                                                            {{ $bike->name }}
                                                        </span>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="flex justify-center">
                                    <a href="{{ route('products.index') }}" class="text-sm font-semibold text-[#0B2434] hover:text-[#3D5A17] flex items-center gap-1">
                                        Xem tất cả sản phẩm
                                        <span>&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('products.index') }}" class="hover:opacity-70">Sản phẩm</a></li>
                @endif

                <li><a href="{{ route('news.index') }}" class="hover:opacity-70">Tin tức</a></li>
                <li><a href="{{ route('promotions.index') }}" class="hover:opacity-70">Khuyến mãi</a></li>
                <li><a href="{{ route('service') }}" class="hover:opacity-70">Dịch vụ</a></li>
            </ul>

            {{-- ACTIONS (Right) --}}
            <div class="flex items-center gap-4">
                {{-- Contact Button (Desktop) --}}
                <a href="#" @click.prevent="isContactModalOpen = true" class="hidden md:flex btn-pil">
                    Liên hệ
                    <span class="arrow-bubble">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M9 7h8v8"/>
                        </svg>
                    </span>
                </a>

                {{-- HAMBURGER BUTTON (Mobile Only) --}}
                <button class="md:hidden p-2 text-gray-600 focus:outline-none relative z-50"
                        @click="mobileMenuOpen = !mobileMenuOpen">
                    <div class="w-6 h-6 flex flex-col justify-center gap-1.5 overflow-hidden">
                         <span class="block h-0.5 w-full bg-black transition-all duration-300 origin-center"
                               :class="{'rotate-45 translate-y-2': mobileMenuOpen}"></span>
                         <span class="block h-0.5 w-full bg-black transition-all duration-300"
                               :class="{'-translate-x-full': mobileMenuOpen}"></span>
                         <span class="block h-0.5 w-full bg-black transition-all duration-300 origin-center"
                               :class="{'-rotate-45 -translate-y-2': mobileMenuOpen}"></span>
                    </div>
                </button>
            </div>
        </div>
    </nav>

    {{-- ========================================================= --}}
    {{-- 2. BACK TO TOP BUTTON --}}
    {{-- ========================================================= --}}
    <button x-show="showBackToTop"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-10"
            @click="scrollToTop()"
            class="fixed bottom-6 right-6 md:bottom-10 md:right-10 z-40 bg-white text-black border border-gray-100 shadow-xl rounded-full flex items-center justify-center hover:scale-110 hover:shadow-2xl transition-all duration-300 group
                   w-10 h-10 md:w-14 md:h-14"
            title="Back to Top">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 md:w-6 md:h-6 transition-transform duration-300 group-hover:-translate-y-1"
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>


    {{-- ========================================================= --}}
    {{-- 3. MOBILE MENU SIDEBAR (Outside Nav) --}}
    {{-- ========================================================= --}}

    {{-- Backdrop --}}
    <div x-show="mobileMenuOpen"
         x-cloak
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/50 z-[60] md:hidden backdrop-blur-sm"
         @click="mobileMenuOpen = false">
    </div>

    {{-- Sidebar Panel --}}
    <div class="fixed top-0 left-0 bottom-0 w-[80%] max-w-sm bg-white z-[70] shadow-2xl md:hidden flex flex-col overflow-y-auto"
         x-show="mobileMenuOpen"
         x-cloak
         x-transition:enter="transition ease-in-out duration-300 transform"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in-out duration-300 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full">

        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <span class="text-xl font-bold text-[#0B2434] uppercase tracking-wider">Menu</span>
            <button @click="mobileMenuOpen = false" class="text-gray-500 hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <ul class="flex flex-col p-6 gap-6 text-[#0B2434] font-medium text-lg">
            <li><a href="{{ route('about') }}" class="block hover:text-[#3D5A17]">Giới thiệu</a></li>

            @if(isset($bikesByType) && $bikesByType->isNotEmpty())
                <li>
                    <button @click="mobileProductOpen = !mobileProductOpen" class="flex items-center justify-between w-full hover:text-[#3D5A17]">
                        <span>Sản phẩm</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180': mobileProductOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="mobileProductOpen" x-collapse class="pl-4 mt-4 flex flex-col gap-3 border-l-2 border-gray-100 ml-1">
                         <a href="{{ route('products.index') }}" class="text-sm text-gray-500 hover:text-[#3D5A17] font-semibold">Tất cả sản phẩm</a>
                         @foreach($bikesByType as $type => $bikes)
                            <div x-data="{ subOpen: false }">
                                <button @click="subOpen = !subOpen" class="text-base text-gray-700 w-full text-left flex justify-between items-center py-1 font-semibold uppercase">
                                    {{ $type }}
                                    <span class="text-xs text-gray-400" x-text="subOpen ? '-' : '+'"></span>
                                </button>
                                <div x-show="subOpen" x-collapse class="pl-4 flex flex-col gap-2 mt-2">
                                    @foreach($bikes as $bike)
                                        <a href="{{ route('products.show', $bike) }}" class="text-sm text-gray-500 hover:text-[#3D5A17]">{{ $bike->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                         @endforeach
                    </div>
                </li>
            @else
                <li><a href="{{ route('products.index') }}" class="block hover:text-[#3D5A17]">Sản phẩm</a></li>
            @endif

            <li><a href="{{ route('news.index') }}" class="block hover:text-[#3D5A17]">Tin tức</a></li>
            <li><a href="{{ route('promotions.index') }}" class="block hover:text-[#3D5A17]">Khuyến mãi</a></li>
            <li><a href="{{ route('service') }}" class="block hover:text-[#3D5A17]">Dịch vụ</a></li>
        </ul>

        <div class="mt-auto p-6 border-t border-gray-100">
            <a href="#" @click.prevent="isContactModalOpen = true; mobileMenuOpen = false" class="flex items-center justify-center gap-2 bg-[#3D5A17] text-white py-3 rounded-full shadow-lg w-full">
                <span>Liên hệ ngay</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M9 7h8v8"/></svg>
            </a>
        </div>
    </div>
</div>
