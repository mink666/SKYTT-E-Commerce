<div class="font-sans text-[#1A1A1A]"
     x-data="{
         variants: {{ $bike->variants->toJson() }},
         currentIndex: 0,
         get selectedVariant() { return this.variants[this.currentIndex]; },

         nextVariant() {
             this.currentIndex = (this.currentIndex + 1) % this.variants.length;
         },
         prevVariant() {
             this.currentIndex = (this.currentIndex - 1 + this.variants.length) % this.variants.length;
         }
     }"
     x-init="currentIndex = 0">

    {{-- ========================================================= --}}
    {{-- 1. SPEC HEADER SECTION        --}}
    {{-- ========================================================= --}}
    <div class="py-8 bg-white text-center">
        <div class="container mx-auto px-4">

            {{-- 1. Description --}}
            <p class="text-xs md:text-sm font-bold tracking-[0.2em] text-gray-500 uppercase mb-3"
               data-aos="fade-down"
               data-aos-duration="900">
                {{ $bike->description ?? 'LỰA CHỌN CHUẨN GEN Z' }}
            </p>

            {{-- 2. Title --}}
            <h2 class="text-4xl md:text-6xl font-black text-[#002C3E] uppercase mb-4 md:mb-6"
                data-aos="fade-down"
                data-aos-duration="900"
                data-aos-delay="150">
                {{ $bike->name }}
            </h2>

            {{-- 3. Image --}}
            <div class="relative mx-auto w-full max-w-[90%] md:max-w-4xl md:w-[893px] h-auto aspect-video md:h-[500px]"
                 data-aos="fade-down"
                 data-aos-duration="900"
                 data-aos-delay="300">

                {{-- IMAGE --}}
                <img :src="selectedVariant.image_url"
                     :alt="selectedVariant.color_name"
                     class="w-full h-full object-contain drop-shadow-2xl transition-all duration-300">

            </div>
        </div>
    </div>
{{-- ========================================================= --}}
    {{-- 2. SPECIFICATION TABLE                                    --}}
    {{-- ========================================================= --}}
    <div class="bg-[#F9F9F9]">
        {{-- CHANGED: Added 'mx-auto' here to center the whole section on PC --}}
        <div class="container mx-auto pt-10 px-4">
            <h3 class="text-lg md:text-xl font-bold tracking-widest text-gray-500 uppercase text-center mt-4 mb-6 md:mb-12"
                data-aos="fade"
                data-aos-duration="800">
                THÔNG SỐ SẢN PHẨM
            </h3>

            @php
                $specs = $bike->specs->take(12)->values();
                $rowCount = 4;
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-0 gap-x-12 md:gap-x-20 pb-15 max-w-7xl mx-auto">

                @for ($r = 0; $r < $rowCount; $r++)
                    @for ($c = 0; $c < 3; $c++)

                        @php
                            $index = $r + ($c * $rowCount);
                            $spec = $specs->get($index);
                            // Reverted to original alignment since you liked the inside fine
                            $classes = "flex justify-between items-start py-3 md:py-4";
                            if ($r < $rowCount - 1) {
                                $classes .= " border-b border-gray-200";
                            }
                        @endphp

                        <div class="{{ $classes }}">
                            @if($spec)
                                <span class="text-xs md:text-sm font-bold text-gray-500 uppercase tracking-wider w-[40%] text-left pr-2 leading-relaxed">
                                    {{ $spec->label }}
                                </span>

                                <span class="text-xs md:text-sm font-bold text-[#002C3E] text-right w-[60%] pl-2 leading-relaxed">
                                    {{ $spec->value }}
                                </span>
                            @else
                                <span></span>
                            @endif
                        </div>

                    @endfor
                @endfor
            </div>
        </div>
    </div>
{{-- ========================================================= --}}
{{-- 3. RELATED BIKES (Bottom)                                 --}}
{{-- ========================================================= --}}

@php
    // (PHP Logic remains exactly the same as your code)
    $bikesJson = $related_bikes
        ->where('is_active', 1)
        ->map(function($bike) {
            $preferredColor = $bike->hero_image;
            $variant = $bike->variants->firstWhere('color_name', $preferredColor);
            if (!$variant) {
                $variant = $bike->variants->first();
            }

            return [
                'id'    => $bike->id,
                'name'  => $bike->name,
                'image' => $variant ? $variant->image_url : '',
                'price' => number_format($variant ? $variant->price : 0, 0, ',', '.'),
                'link'  => route('products.show', $bike),
            ];
        })
        ->values()
        ->toJson();
@endphp

<div class="mt-20 py-10 md:py-12 bg-[#F2F4F1] border-t border-gray-200"
     x-data="{
         bikes: {{ $bikesJson }},
         activeIndex: null,

         get currentBike() {
            if (this.activeIndex === null) {
                return this.bikes.length > 0 ? this.bikes[0] : { image: '' };
            }
            return this.bikes[this.activeIndex];
         },

         toggle(index) {
             this.activeIndex = (this.activeIndex === index) ? null : index;
         },

         nextBike() {
             if (this.bikes.length === 0) return;
             let current = this.activeIndex === null ? -1 : this.activeIndex;
             this.activeIndex = (current + 1) % this.bikes.length;
         },
         prevBike() {
             if (this.bikes.length === 0) return;
             let current = this.activeIndex === null ? 0 : this.activeIndex;
             this.activeIndex = (current - 1 + this.bikes.length) % this.bikes.length;
         }
     }"
>
    <div class="container mx-auto px-4 max-w-7xl">

        <h3 class="text-xs md:text-sm font-bold tracking-widest text-gray-500 uppercase mb-8 md:mb-12">
            THAM KHẢO NHỮNG MẪU XE KHÁC
        </h3>

        {{-- Add a check to hide grid if no bikes exist after filtering --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12 items-start" x-show="bikes.length > 0">

            {{-- LEFT COLUMN: Accordion List --}}
            <div class="lg:col-span-5 flex flex-col">
                <template x-for="(bike, index) in bikes" :key="bike.id">
                    <div class="border-b border-gray-300">

                        <div class="flex justify-between items-center py-4 md:py-5 cursor-pointer group select-none"
                             @click="toggle(index)">

                            <span class="text-lg md:text-xl font-bold uppercase transition-colors duration-300"
                                  :class="activeIndex === index ? 'text-[#002C3E]' : 'text-gray-500 group-hover:text-[#002C3E]'"
                                  x-text="bike.name">
                            </span>

                            <button class="text-2xl md:text-3xl font-light transition-all duration-300"
                                    :class="activeIndex === index ? 'text-[#4D632F] rotate-45' : 'text-gray-400 group-hover:text-[#002C3E]'">
                                +
                            </button>
                        </div>

                        <div x-show="activeIndex === index"
                             x-collapse
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="pb-6 md:pb-8 pl-1">

                            <p class="text-sm md:text-base font-medium text-gray-600 mb-1">
                                Xe máy điện VinFast <span x-text="bike.name"></span>
                            </p>

                            <p class="text-base md:text-lg font-medium text-[#002C3E] mb-5">
                                <span x-text="bike.price"></span> VNĐ
                            </p>

                            <a :href="bike.link"
                               class="inline-flex items-center gap-3 bg-[#3F5326] hover:bg-[#32421f] text-white px-5 py-2 md:px-6 md:py-2 rounded-full transition-all shadow-md group/btn">
                                <span class="text-xs md:text-sm font-medium">Xem thêm</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4 transform group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </template>
            </div>

            {{-- RIGHT COLUMN: Image Preview (Desktop Only) --}}
            {{--
                FIXED: Removed 'h-[600px]' from this parent div.
                Now it shares the height of the left column, allowing 'sticky' to work.
            --}}
            <div class="hidden lg:block lg:col-span-7 relative">

                {{--
                    FIXED: Changed 'top-24' to 'top-32' for better spacing from navbar.
                    This sticky div will now slide down until it hits the bottom of the list.
                --}}
                <div class="sticky top-32">

                    {{-- IMAGE CONTAINER --}}
                    <div class="relative w-full h-[500px] flex items-center justify-center p-8 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <img :src="currentBike.image"
                             :key="currentBike.image"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 scale-95 translate-x-4"
                             x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                             alt="Preview"
                             class="w-full h-full object-contain">
                    </div>
                </div>
            </div>

        </div>

        {{-- Optional: Message if no bikes found --}}
        <div x-show="bikes.length === 0" class="text-center py-10 text-gray-500 italic">
            Không có sản phẩm liên quan.
        </div>
    </div>
</div>
</div>
