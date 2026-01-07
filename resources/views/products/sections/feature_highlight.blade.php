<div class="bg-white pb-20 mt-16 md:mt-24 border-b border-gray-100"
     x-data="{
         variants: {{ $bike->variants->toJson() }},
         currentIndex: 0,
         get selectedVariant() { return this.variants[this.currentIndex]; }
     }"
     x-init="
         @if($bike->hero_image)
             const heroColorName = '{{ $bike->hero_image }}';
             const matchIndex = variants.findIndex(v => v.color_name === heroColorName);
             if (matchIndex !== -1) {
                 currentIndex = matchIndex;
             }
         @endif
     ">

    <div class="container mx-auto px-4 max-w-[1400px]">
        <div class="flex flex-col md:flex-row items-center justify-center gap-16 md:gap-4">

            {{-- LEFT COLUMN --}}
            <div class="flex-1 flex flex-col gap-16 order-2 md:order-1 items-center md:items-end w-full">

                @if($f1 = $bike->features->where('order', 1)->first())
                <div class="text-left group w-full max-w-[280px]"
                     data-aos="fade-right"
                     data-aos-duration="800">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset($f1->header_icon_url) }}" alt="Icon" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-semibold text-base uppercase tracking-wider text-[#0B2434]">{{ $f1->header_title }}</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        {{ $f1->body_content }}
                    </p>
                </div>
                @endif

                @if($f2 = $bike->features->where('order', 2)->first())
                <div class="text-left group w-full max-w-[280px]"
                     data-aos="fade-right"
                     data-aos-duration="800">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset($f2->header_icon_url) }}" alt="Icon" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-semibold text-base uppercase tracking-wider text-[#0B2434]">{{ $f2->header_title }}</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        {{ $f2->body_content }}
                    </p>
                </div>
                @endif
            </div>

            {{-- CENTER IMAGE --}}
            <div class="hidden md:flex w-full md:w-7/12 flex-shrink-0 justify-center order-2 md:order-2 py-8 md:py-0 relative z-10">
                <img :src="selectedVariant.image_url"
                     :alt="selectedVariant.color_name"
                     class="w-full max-h-[600px] object-contain drop-shadow-2xl"
                     data-aos="fade"
                     data-aos-duration="800">
            </div>

            {{-- RIGHT COLUMN --}}
            <div class="flex-1 flex flex-col gap-16 order-3 items-center md:items-start w-full">

                @if($f3 = $bike->features->where('order', 3)->first())
                <div class="text-left group w-full max-w-[280px]"
                     data-aos="fade-left"
                     data-aos-duration="800">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset($f3->header_icon_url) }}" alt="Icon" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-semibold text-base uppercase tracking-wider text-[#0B2434]">{{ $f3->header_title }}</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        {{ $f3->body_content }}
                    </p>
                </div>
                @endif

                @if($f4 = $bike->features->where('order', 4)->first())
                <div class="text-left group w-full max-w-[280px]"
                     data-aos="fade-left"
                     data-aos-duration="800">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-8 h-8 flex-shrink-0 flex items-center justify-center">
                            <img src="{{ asset($f4->header_icon_url) }}" alt="Icon" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-semibold text-base uppercase tracking-wider text-[#0B2434]">{{ $f4->header_title }}</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        {{ $f4->body_content }}
                    </p>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
