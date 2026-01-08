<div class="relative w-full overflow-hidden flex flex-col justify-start py-0 md:py-0"
     x-data="{
         variants: {{ $bike->variants->toJson() }},
         currentIndex: 0,
         get selectedVariant() { return this.variants[this.currentIndex]; },
         formatPrice(price) {
             return new Intl.NumberFormat('vi-VN').format(price);
         },
         selectVariant(index) {
             this.currentIndex = index;
         }
     }"
     x-init="
         @if($bike->hero_image)
             {{-- Find the variant index that matches the hero_image color name --}}
             const heroColorName = '{{ $bike->hero_image }}';
             const matchIndex = variants.findIndex(v => v.color_name === heroColorName);
             if (matchIndex !== -1) {
                 currentIndex = matchIndex;
             }
         @endif
     ">

    {{-- DESKTOP BACKGROUND (Hidden on Mobile) --}}
    <div class="hidden md:block absolute top-0 left-0 w-full h-[85%] bg-[#F2F4F5] z-0 rounded-b-[3rem]"></div>

    {{-- Main Container --}}
    <div class="container mx-auto px-4 pt-4 md:pt-3 md:pb-10 relative z-10 flex flex-col items-center md:block text-center">

        {{-- 1. HEADER SECTION --}}
        <div class="text-center w-full">

            {{-- DESKTOP: "VINFAST" Label --}}
            <p class="hidden md:block text-5xl font-normal tracking-[0.3em] text-[#0B2434] uppercase mb-5"
               data-aos="fade-down"
               data-aos-duration="1000">
               VINFAST
            </p>

            {{-- TITLE --}}
            <h1 class="text-5xl md:text-[9rem] leading-tight md:leading-[0.9] font-bold text-[#0B2434] uppercase mb-4 md:mb-8 tracking-wider"
                data-aos="fade-down"
                data-aos-duration="1200"
                data-aos-delay="200">
                {{ $bike->name }}
            </h1>

            {{-- 2. MOBILE ONLY LAYOUT (md:hidden) --}}
            <div class="md:hidden flex flex-col items-center w-full">

                {{-- Motto --}}
                <div class="text-[#0B2434] uppercase tracking-widest font-medium text-sm mb-8"
                     data-aos="fade-down"
                     data-aos-delay="300"
                     data-aos-duration="900">
                    {{ $bike->description }}
                </div>

                {{-- Specs Grid (3 Cols) --}}
                <div class="w-full max-w-2xl grid grid-cols-3 gap-2 mb-8">
                    @if($spec = $bike->specs->firstWhere('label', 'Tốc độ tối đa'))
                    <div class="flex flex-col items-center" data-aos="fade-down" data-aos-delay="400" data-aos-duration="900">
                        <p class="text-lg font-bold text-[#0B2434]">{{ $spec->value }}</p>
                        <p class="text-[10px] text-gray-500 font-medium uppercase mt-1">Tốc độ tối đa</p>
                    </div>
                    @endif

                    @if($spec = $bike->specs->firstWhere('label', 'Quãng đường di chuyển'))
                    <div class="flex flex-col items-center" data-aos="fade-down" data-aos-delay="500" data-aos-duration="900">
                        <p class="text-lg font-bold text-[#0B2434]">{{ $spec->value }}</p>
                        <p class="text-[10px] text-gray-500 font-medium uppercase mt-1">Quãng đường</p>
                    </div>
                    @endif

                    @if($spec = $bike->specs->firstWhere('label', 'Độ rộng cốp xe'))
                    <div class="flex flex-col items-center" data-aos="fade-down" data-aos-delay="600" data-aos-duration="900">
                        <p class="text-lg font-bold text-[#0B2434]">{{ $spec->value }}</p>
                        <p class="text-[10px] text-gray-500 font-medium uppercase mt-1">Độ rộng cốp</p>
                    </div>
                    @endif
                </div>

                {{-- Price --}}
                <div class="mb-8 mt-4"
                     data-aos="fade-down"
                     data-aos-delay="700"
                     data-aos-duration="900">
                    <div class="font-bold text-lg uppercase text-[#0B2434]">
                        Giá niêm yết: <span class="text-[#0B2434]" x-text="formatPrice(selectedVariant.price)"></span> VNĐ
                    </div>
                    {{-- Updated Label Here --}}
                    <span class="block text-[10px] font-medium text-gray-500 mt-1 opacity-80">
                        {{ $bike->label }}
                    </span>
                </div>

                {{-- Colors (Mobile: Already using Image) --}}
                <div class="flex justify-center gap-3 mb-10 z-30"
                     data-aos="fade-down"
                     data-aos-delay="800"
                     data-aos-duration="900">
                    @foreach($bike->variants as $variant)
                        <button
                            @click="selectVariant({{ $loop->index }})"
                            class="w-8 h-8 rounded-full border-2 border-white/50 shadow-md transition-all duration-300 hover:scale-110 focus:outline-none bg-cover bg-center bg-no-repeat"
                            :class="selectedVariant.id === {{ $variant->id }} ? 'ring-2 ring-offset-2 ring-offset-[#0B2434] ring-white scale-110' : ''"
                            style="background-image: url('{{ asset($variant->color_url) }}');"
                            title="{{ $variant->color_name }}"
                        ></button>
                    @endforeach
                </div>
            </div>

            {{-- ========================================== --}}
            {{-- 3. DESKTOP ONLY LAYOUT (hidden md:flex) --}}
            {{-- ========================================== --}}
            <div class="hidden md:flex flex-row justify-between items-start w-full max-w-[90%] mx-auto relative z-20 pointer-events-none">
                <div class="text-left pointer-events-auto" data-aos="fade-right" data-aos-delay="400">
                    <span class="text-[#0B2434] uppercase tracking-widest font-medium text-lg md:text-xl">{{ $bike->description }}</span>
                </div>
                <div class="text-right pointer-events-auto" data-aos="fade-left" data-aos-delay="400">
                    <div class="font-medium text-xl uppercase text-[#0B2434]">
                        Giá niêm yết: <span class="text-xl text-[#0B2434]" x-text="formatPrice(selectedVariant.price)"></span> VNĐ
                        {{-- Updated Label Here --}}
                        <span class="block text-xs font-medium text-gray-500 mt-1 opacity-80">
                            {{ $bike->label }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- 4. IMAGE & FLOATING ELEMENTS --}}
        {{-- ========================================== --}}
        <div class="relative w-full max-w-[1400px] mx-auto md:min-h-[700px] flex items-center justify-center md:-mt-32 z-10">

            {{-- DESKTOP Floating Specs --}}
            <div class="hidden md:flex absolute left-0 md:left-10 top-40 flex-col gap-8 z-30 text-left pointer-events-none">
                @if($spec = $bike->specs->firstWhere('label', 'Tốc độ tối đa'))
                <div data-aos="fade-right" data-aos-delay="500">
                    <p class="text-xl font-medium text-[#0B2434] mb-1">{{ $spec->value }}</p>
                    <p class="text-sm text-gray-500 font-medium">Tốc độ tối đa</p>
                </div>
                @endif

                @if($spec = $bike->specs->firstWhere('label', 'Quãng đường di chuyển'))
                <div data-aos="fade-right" data-aos-delay="600">
                    <p class="text-xl font-medium text-[#0B2434] mb-1">{{ $spec->value }}</p>
                    <p class="text-sm text-gray-500 font-medium">Quãng đường di chuyển</p>
                </div>
                @endif

                @if($spec = $bike->specs->firstWhere('label', 'Độ rộng cốp xe'))
                <div data-aos="fade-right" data-aos-delay="700">
                    <p class="text-xl font-medium text-[#0B2434] mb-1">{{ $spec->value }}</p>
                    <p class="text-sm text-gray-500 font-medium">Độ rộng cốp xe</p>
                </div>
                @endif
            </div>

            {{-- SHARED IMAGE --}}
            <img :src="selectedVariant.image_url"
                :alt="selectedVariant.color_name"
                class="w-auto h-auto max-w-[90%] md:max-w-[85%] max-h-[50vh] md:max-h-[700px] object-contain mx-auto drop-shadow-2xl md:drop-shadow-none transition-all duration-300"
                :class="{
                'p-0': selectedVariant.color_name === 'Flazz Red',
                'p-8 md:p-12 lg:p-16': '{{ $bike->slug }}' === 'theon-s' && selectedVariant.color_name !== 'Flazz Red',
                'p-6': selectedVariant.color_name !== 'Flazz Red' && '{{ $bike->slug }}' !== 'theon-s'
            }"
                data-aos="fade-down"
                data-aos-duration="1000"
                data-aos-delay="900"
            >

            {{-- DESKTOP Floating Colors (UPDATED: Now using Background Image) --}}
            <div class="hidden md:flex absolute right-4 top-1/2 -translate-y-1/2 flex-col gap-4 z-30" data-aos="fade-left" data-aos-delay="800">
                @foreach($bike->variants as $variant)
                    <button
                        @click="selectVariant({{ $loop->index }})"
                        class="w-6 h-6 md:w-8 md:h-8 rounded-full border-2 border-white/50 shadow-lg transition-all duration-300 hover:scale-125 focus:outline-none bg-cover bg-center bg-no-repeat"
                        :class="selectedVariant.id === {{ $variant->id }} ? 'ring-2 ring-offset-2 ring-offset-[#0B2434] ring-white scale-125' : ''"
                        style="background-image: url('{{ asset($variant->color_url) }}');"
                        title="{{ $variant->color_name }}"
                    ></button>
                @endforeach
            </div>

        </div>
    </div>
</div>
