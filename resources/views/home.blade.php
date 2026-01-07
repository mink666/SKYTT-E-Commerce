@extends('layouts.app')

@section('content')

{{-- ========================================================= --}}
{{-- 1. SETUP DATA & LOGIC (Fetching Actual DB Data)           --}}
{{-- ========================================================= --}}
@php
    use App\Models\Bike;
    use Illuminate\Support\Str;

    // 1. STATIC ASSETS (Dual Arrays for Responsive Switching)
    // Ensure both arrays have the same number of slides if you add more later
    $desktopSlides = [ asset('images/hero-new.jpg') ];
    $mobileSlides  = [ asset('images/hero-mb.jpg') ];

    $starHtml = '<svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>';
    $fiveStars = '<div class="flex items-center gap-0.5">' . str_repeat($starHtml, 5) . '</div>';

    // 2. HELPER TO FORMAT SPECS
    function getBikeStats($bike) {
        if (!$bike) return [];
        return $bike->specs->take(3)->map(function($spec) {
            return [
                'label' => $spec->label,
                'value' => $spec->value
            ];
        })->toArray();
    }

    // 3. FETCH FEATURED BIKES
    $theon    = Bike::where('name', 'like', '%Feliz 2025%')->where('is_active', 1)->with(['variants', 'specs'])->first();
    $vero     = Bike::where('name', 'like', '%Vero%')->where('is_active', 1)->with(['variants', 'specs'])->first();
    $evoLite  = Bike::where('name', 'like', '%Evo%Lite%')->where('is_active', 1)->with(['variants', 'specs'])->first();

    // 4. FETCH BEST SELLERS
    $highEnd  = Bike::where('type', 'CAO CẤP')->where('is_active', 1)->with('variants')->inRandomOrder()->first();
    $midRange = Bike::where('type', 'TRUNG CẤP')->where('is_active', 1)->with('variants')->inRandomOrder()->first();
    $economy  = Bike::where('type', 'PHỔ THÔNG')->where('is_active', 1)->with('variants')->inRandomOrder()->take(2)->get();

    // Merge into one collection
    $bestSellers = collect([]);
    if($highEnd) $bestSellers->push($highEnd);
    if($midRange) $bestSellers->push($midRange);
    foreach($economy as $eco) { $bestSellers->push($eco); }

@endphp
{{-- ========================================================= --}}
{{-- 2. HERO SECTION (Strict Responsive Scaling: Mobile -> Laptop -> PC) --}}
{{-- ========================================================= --}}
<section id="hero" class="relative bg-gray-50" data-aos="fade-up">

    {{--
        CONTAINER HEIGHT LOGIC:
        - h-[540px]: Mobile
        - md:h-[470px]: Laptop/Tablet (Desktop base)
        - xl:h-[600px]: Large PC screens
    --}}
    <div class="relative w-full mx-auto overflow-hidden group shadow-sm
                h-[540px] md:h-[470px] xl:h-[600px]"
         data-hero>

        <div class="h-full w-full">
            <div class="flex h-full transition-transform duration-700 ease-out" data-hero-track>
                @foreach($desktopSlides as $index => $desktopSrc)
                    <div class="w-full h-full shrink-0 relative">

                        {{-- 1. MOBILE IMAGE --}}
                        <img src="{{ $mobileSlides[$index] ?? $desktopSrc }}"
                             alt="Hero Mobile"
                             class="block md:hidden w-full h-full object-cover object-center">

                        {{-- 2. DESKTOP/PC IMAGE --}}
                        {{--
                            IMAGE HEIGHT LOGIC:
                            - md:h-[470px]: Laptop
                            - xl:h-[600px]: PC
                            - max-w-[1920px]: Prevents image from over-stretching on ultra-wide monitors
                        --}}
                        <img src="{{ $desktopSrc }}"
                             alt="Hero Desktop"
                             class="hidden md:block w-full h-[470px] xl:h-[600px] max-w-[1920px] object-cover object-center mx-auto">
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Arrows --}}
        @if(count($desktopSlides) > 1)
        <button type="button" aria-label="Previous" class="hidden md:grid absolute left-3 top-1/2 -translate-y-1/2 place-items-center rounded-full p-2 bg-white/70 hover:bg-white shadow" data-hero-prev>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41 7.41L14 6l-6 6l6 6l1.41-1.41L10.83 12z"/></svg>
        </button>
        <button type="button" aria-label="Next" class="hidden md:grid absolute right-3 top-1/2 -translate-y-1/2 place-items-center rounded-full p-2 bg-white/70 hover:bg-white shadow" data-hero-next>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6l6 6l-6 6z"/></svg>
        </button>
        {{-- Dots --}}
        <div class="absolute bottom-4 inset-x-0 flex items-center justify-center gap-2" data-hero-dots></div>
        @endif
    </div>
</section>

{{-- ========================================================= --}}
{{-- 4. PRODUCT SHOWCASE                                       --}}
{{-- ========================================================= --}}
<section id="san-pham" class="!p-0 space-y-0">

    {{-- 1) THEON S --}}
    @if($theon)
        @php
            $theonImg = $theon->variants->first()->image_url ?? 'images/theon-s.png';
            $theonPrice = number_format($theon->variants->min('price'), 0, ',', '.');
        @endphp
        <x-product-feature
            class="bg-white !py-20 md:!py-40 !min-h-0 h-auto text-center md:text-left [&_.flex-col]:!items-center md:[&_.flex-col]:!items-start [&_.flex-col]:!mx-auto md:[&_.flex-col]:!mx-0"
            :image="$theonImg"
            :title="$theon->name"
            :price="'Giá niêm yết: ' . $theonPrice . ' VND'"
            :stats="getBikeStats($theon)"
            :link="route('products.show', $theon)"
            :reverse="false"
        />
    @endif

    {{-- 2) EVO LITE NEO --}}
    @if($evoLite)
        @php
            $evoImg = $evoLite->variants->first()->image_url ?? 'images/evo-lite-neo.png';
            $evoPrice = number_format($evoLite->variants->min('price'), 0, ',', '.');
        @endphp
        <x-product-feature
            class="bg-slate-50 !py-20 md:!py-40 !min-h-0 h-auto [&_.flex-col]:!items-center md:[&_.flex-col]:!items-start [&_.flex-col]:!text-center md:[&_.flex-col]:!text-left [&_.flex-col]:!mx-auto md:[&_.flex-col]:!ml-auto md:[&_.flex-col]:!mr-0"
            :image="$evoImg"
            :title="$evoLite->name"
            :price="'Giá niêm yết: ' . $evoPrice . ' VND'"
            :stats="getBikeStats($evoLite)"
            :link="route('products.show', $evoLite)"
            :reverse="true"
        />
    @endif

    {{-- 3) VERO-X --}}
    @if($vero)
        @php
            $veroImg = $vero->variants->first()->image_url ?? 'images/evogrand.png';
            $veroPrice = number_format($vero->variants->min('price'), 0, ',', '.');
        @endphp
        <x-product-feature
            class="bg-white !py-20 md:!py-40 !min-h-0 h-auto text-center md:text-left [&_.flex-col]:!items-center md:[&_.flex-col]:!items-start [&_.flex-col]:!mx-auto md:[&_.flex-col]:!mx-0"
            :image="$veroImg"
            :title="$vero->name"
            :price="'Giá niêm yết: ' . $veroPrice . ' VND'"
            :stats="getBikeStats($vero)"
            :link="route('products.show', $vero)"
            :reverse="false"
        />
    @endif

</section>

{{-- ========================================================= --}}
{{-- 3. CTA BUTTON                                             --}}
{{-- ========================================================= --}}
<section class="bg-white md:py-12" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 flex justify-center">
        <x-btn href="{{ route('products.index') }}" label="Xem tất cả sản phẩm" :arrow="true" />
    </div>
</section>

{{-- ========================================================= --}}
{{-- 5. BEST SELLERS                                           --}}
{{-- ========================================================= --}}
<x-section id="ban-chay" class="bg-white py-2 md:py-4" data-aos="fade-up">
    <div class="mb-6 px-4 md:px-0 text-center md:text-left">
        <h2 class="text-2xl md:text-3xl font-bold">SẢN PHẨM BÁN CHẠY</h2>
        <p class="mt-1 text-slate-600 text-sm md:text-base">Các dòng xe được yêu thích nhất</p>
    </div>

    <div class="relative" data-carousel>
        <div class="overflow-hidden">
            <div class="flex transition-transform duration-500 ease-out" data-carousel-track>

                @foreach($bestSellers as $bike)
                    @php
                        $variant = $bike->variants->first();
                        $image = $variant ? $variant->image_url : '';
                        $price = $variant ? number_format($variant->price, 0, ',', '.') : 'Liên hệ';
                        $typeLabel = ucwords(strtolower($bike->type));
                    @endphp

                    {{-- Item --}}
                    <div class="flex-shrink-0 w-full md:w-1/3 px-3" data-carousel-item>
                        <x-card
                            variant="thumb"
                            :image="$image"
                            :title="$bike->name"
                            :newBadge="true"
                            :topRightTitle="Str::limit($bike->name, 10)"
                            :topRightSubtitle="$typeLabel"
                        />
                        <div class="mt-4 space-y-2 text-center md:text-left">
                            <p class="text-slate-600">Xe máy điện {{ $bike->name }}</p>
                            <p class="font-extrabold text-lg">{{ $price }} VNĐ</p>
                        </div>
                        <div class="mt-4 flex justify-center md:justify-start">
                            <x-btn :href="route('products.show', $bike)" label="Xem thêm" :arrow="true" />
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- Nav --}}
        <div class="mt-8 flex items-center justify-center gap-4">
            <button type="button" class="grid place-items-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500" data-carousel-prev>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41 7.41L14 6l-6 6l6 6l1.41-1.41L10.83 12z"/></svg>
            </button>
            <div class="flex items-center justify-center gap-2" data-carousel-dots></div>
            <button type="button" class="grid place-items-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500" data-carousel-next>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6l6 6l-6 6z"/></svg>
            </button>
        </div>
    </div>
</x-section>

{{-- ========================================================= --}}
{{-- 6. REVIEWS                                                --}}
{{-- ========================================================= --}}
<x-section id="danh-gia" class="s-danh-gia bg-slate-50 py-12 md:py-20" data-aos="fade-up">
    <div class="s-danh-gia__header mb-10 text-center">
        <h2 class="s-danh-gia__title text-2xl md:text-3xl font-bold">Đánh giá từ khách hàng</h2>
    </div>

    <div class="relative" data-carousel>
        <div class="overflow-hidden">
            <div class="flex transition-transform duration-500 ease-out" data-carousel-track>
                <div class="flex-shrink-0 w-full px-3 pb-12" data-carousel-item>
                    <x-testimonial class="s-danh-gia__item" quote="Rất tốt, dịch vụ rất tận tình. Nhân viên vui vẻ hoạt bát tư vấn kĩ càng" author="Quân Huỳnh" title="{!! $fiveStars !!}" avatar="images/avatars/guy-hawkins.png" />
                </div>
                <div class="flex-shrink-0 w-full px-3 pb-12" data-carousel-item>
                    <x-testimonial class="s-danh-gia__item" quote="Bạn nhân viên tư vấn rất kỹ, rất nhiệt tình luôn. Chốt ngay con evo200 đen." author="lucica job" title="{!! $fiveStars !!}" avatar="images/avatars/anh-minh.png" />
                </div>
                <div class="flex-shrink-0 w-full px-3 pb-12" data-carousel-item>
                    <x-testimonial class="s-danh-gia__item" quote="Tư vấn hỗ trợ mình cực kì nhiệt tình, mình sẽ giới thiệu cho người nhà." author="Trang Phạm" title="{!! $fiveStars !!}" avatar="images/avatars/chi-hanh.png" />
                </div>
                <div class="flex-shrink-0 w-full px-3 pb-12" data-carousel-item>
                    <x-testimonial class="s-danh-gia__item" quote="Nhân viên rất nhiệt tình, và chăm sóc khách hàng tận tình lắm, làm khách hàng rất vừa ý." author="Phuong Pham" title="{!! $fiveStars !!}" avatar="images/avatars/ban-khoi.png" />
                </div>
            </div>
        </div>
        <button type="button" data-carousel-prev class="hidden"></button>
        <button type="button" data-carousel-next class="hidden"></button>
        <div class="mt-8 flex items-center justify-center gap-2" data-carousel-dots></div>
    </div>
</x-section>

{{-- ========================================================= --}}
{{-- 7. STORE SYSTEM                                           --}}
{{-- ========================================================= --}}
<x-section class="s-cua-hang-header bg-white pt-10 md:pt-16 pb-4 px-4 text-center md:text-left" data-aos="fade-up">
    <h2 class="text-2xl md:text-3xl font-bold text-skytt-text">Hệ thống cửa hàng</h2>
</x-section>

<section id="cua-hang" class="bg-white relative z-10" data-aos="fade-up"
         x-data="{
             stores: [
                 {
                     id: 1,
                     name: 'VinFast SKYTT (CN1)',
                     address: '12B Nguyễn Thị Định, P. Bình Trưng, Q.2',
                     hotline: '0862 172 217',
                     mapLink: 'https://maps.app.goo.gl/c5Sob9dvprTopfcx9',
                     embedUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2758781854095!2d106.75184097508881!3d10.790169889359468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527006f9d42c3%3A0x20055157c879cb8e!2zVmluZmFzdCBTS1lUVCBUaOG7pyDEkOG7qWM!5e0!3m2!1sen!2s!4v1767695281286!5m2!1sen!2s'
                 },
                 {
                     id: 2,
                     name: 'VinFast SKYTT (CN2)',
                     address: '300A-B Nguyễn Tất Thành, P. Xóm Chiếu, Q.4',
                     hotline: '096 4432766',
                     mapLink: 'https://maps.app.goo.gl/2AGNHWTZbMeRAJA7A',
                     embedUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6550580746507!2d106.70569657961067!3d10.761045362021347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fdeeddc2309%3A0xad2ec736a47cca2b!2zU2hvd3Jvb20gWGUgTcOheSDEkGnhu4duIFZpbkZhc3QgU0tZVFQgLSBRdeG6rW4gNA!5e0!3m2!1sen!2s!4v1767695520411!5m2!1sen!2s'
                 }
             ],
             activeStore: null,
             init() {
                 this.activeStore = this.stores[0];
             }
         }">

    <div class="relative bg-cover bg-center py-16 md:py-32" style="background-image: url('{{ asset('images/address-bg.png') }}')">
        <div class="absolute inset-0 bg-black/20"></div>

        <div class="relative max-w-5xl mx-4 md:mx-auto grid grid-cols-1 md:grid-cols-2 rounded-3xl overflow-hidden shadow-2xl bg-white/60 backdrop-blur-lg border border-white/20">

            {{-- LEFT COLUMN: Store List --}}
            <div class="p-6 md:p-8 text-skytt-text flex flex-col justify-between h-full">

                <div class="space-y-2">
                    <template x-for="store in stores" :key="store.id">
                        <div @click="activeStore = store"
                             class="group relative p-4 rounded-2xl transition-all duration-300 cursor-pointer border border-transparent"
                             :class="activeStore.id === store.id
                                ? 'bg-white/80 shadow-md scale-[1.02] border-white/40'
                                : 'hover:bg-white/40 hover:shadow-sm'">

                            <div class="relative z-10">
                                <h3 class="font-bold text-lg mb-1" x-text="store.name"></h3>

                                <a :href="store.mapLink" target="_blank"
                                   class="block text-sm mt-4 mb-4 font-bold underline decoration-slate-400/50 underline-offset-4 decoration-2 hover:text-[#3D5A17] hover:decoration-[#3D5A17] transition-all">
                                    <span x-text="store.address"></span>
                                </a>

                                <p class="text-sm text-slate-600 mt-6">
                                    Hotline: <span class="font-semibold" x-text="store.hotline"></span>
                                </p>
                            </div>

                            <div class="absolute top-1/2 right-4 -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-[#3D5A17] opacity-0 translate-x-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Footer: Socials & Email --}}
                <div class="mt-2 pt-4 border-t border-slate-400/30 space-y-3">
                    <div>
                        <a href="mailto:skytt.vinfast@gmail.com" class="hover:text-[#3D5A17] font-semibold transition-colors text-sm">
                            skytt.vinfast@gmail.com
                        </a>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="https://www.facebook.com/SKYTT.VINFAST/" target="_blank" class="transition-transform hover:-translate-y-1">
                            <img src="{{ asset('images/icons/facebook.png') }}" class="w-6 h-6 opacity-80 hover:opacity-100">
                        </a>
                        <a href="https://www.tiktok.com/@skyttvinfast" target="_blank" class="transition-transform hover:-translate-y-1">
                            <img src="{{ asset('images/icons/tiktok.png') }}" class="w-6 h-6 opacity-80 hover:opacity-100">
                        </a>
                        <a href="#" target="_blank" class="transition-transform hover:-translate-y-1">
                            <img src="{{ asset('images/icons/instagram.png') }}" class="w-6 h-6 opacity-80 hover:opacity-100">
                        </a>
                    </div>
                </div>
            </div>

            {{-- RIGHT COLUMN: Dynamic Map --}}
            <div class="block overflow-hidden h-[250px] md:h-auto bg-gray-200 relative group/map">
                <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                    <svg class="animate-spin h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>

                <iframe :src="activeStore.embedUrl"
                        class="w-full h-full object-cover relative z-10 transition-opacity duration-500"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================= --}}
{{-- 8. ABOUT US                                               --}}
{{-- ========================================================= --}}
<x-section id="gioi-thieu" class="bg-white relative z-5 py-12 md:py-24" data-aos="fade-up">
    <div class="mb-6 md:mb-10 text-center md:text-left">
        <h2 class="text-2xl md:text-3xl font-bold text-skytt-text">Công ty VinFast SKYTT</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 items-start">
        <div class="order-2 md:order-1">
            <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                VinFast SKYTT là đại diện ủy quyền chính thức của VinFast, cam kết mang đến trải nghiệm xe điện thông minh, hiện đại và đồng hành cùng bạn trong mọi hành trình. Với hệ thống phục vụ chuyên nghiệp, từ lái thử, tư vấn, giao xe đến hậu mãi – mọi dịch vụ đều nhanh chóng, trong sáng và tận tâm
            </p>
            <div class="mt-6 md:mt-8 flex justify-center md:justify-start">
                <x-btn href="{{ route('about') }}" label="Xem thêm" :arrow="true" />
            </div>
        </div>
        <div class="order-1 md:order-2 md:-mt-[4.75rem]">
            <img src="{{ asset('images/about-image.png') }}" alt="Công ty VinFast SKYTT" class="w-full rounded-3xl object-cover shadow-lg">
        </div>
    </div>
</x-section>

@endsection

@push('scripts')
  @vite('resources/js/home.js')
@endpush
