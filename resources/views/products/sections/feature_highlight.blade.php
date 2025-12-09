<div class="bg-white py-24 border-b border-gray-100">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">

            <div class="md:col-span-3 flex flex-col gap-16 order-2 md:order-1">

                @if($f1 = $bike->features->where('order', 1)->first())
                <div class="text-left group">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 flex items-/center justify-center">
                            <img src="{{ asset($f1->header_icon_url) }}" alt="Icon" class="w-8 h-8 object-contain">
                        </div>
                        <h3 class="font-semibold text-base uppercase tracking-wider text-[#0B2434]">{{ $f1->header_title }}</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed pl-14">
                        {{ $f1->body_content }}
                    </p>
                </div>
                @endif

                @if($f2 = $bike->features->where('order', 2)->first())
                <div class="text-left group">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <img src="{{ asset($f2->header_icon_url) }}" alt="Icon" class="w-8 h-8 object-contain">
                        </div>
                        <h3 class="font-semibold text-base uppercase tracking-wider text-[#0B2434]">{{ $f2->header_title }}</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed pl-14">
                        {{ $f2->body_content }}
                    </p>
                </div>
                @endif
            </div>

            <div class="md:col-span-6 flex justify-center order-1 md:order-2 py-8 md:py-0">
                <img :src="selectedVariant.feature_image_url ? selectedVariant.feature_image_url : selectedVariant.image_url"
                     :alt="selectedVariant.color_name"
                     class="w-full object-contain drop-shadow-2xl transform hover:scale-105 transition-transform duration-500">
            </div>

            <div class="md:col-span-3 flex flex-col gap-16 order-3">

                @if($f3 = $bike->features->where('order', 3)->first())
                <div class="text-left md:text-right group">
                    <div class="flex items-center md:flex-row-reverse gap-3 mb-3">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <img src="{{ asset($f3->header_icon_url) }}" alt="Icon" class="w-8 h-8 object-contain">
                        </div>
                        <h3 class="font-semibold text-base uppercase tracking-wider text-[#0B2434]">{{ $f3->header_title }}</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed pl-14 md:pl-0 md:pr-14">
                        {{ $f3->body_content }}
                    </p>
                </div>
                @endif

                @if($f4 = $bike->features->where('order', 4)->first())
                <div class="text-left md:text-right group">
                    <div class="flex items-center md:flex-row-reverse gap-3 mb-3">
                        <div class="w-10 h-10 flex items-center justify-center">
                            <img src="{{ asset($f4->header_icon_url) }}" alt="Icon" class="w-8 h-8 object-contain">
                        </div>
                        <h3 class="font-semibold text-base uppercase tracking-wider text-[#0B2434]">{{ $f4->header_title }}</h3>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed pl-14 md:pl-0 md:pr-14">
                        {{ $f4->body_content }}
                    </p>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
