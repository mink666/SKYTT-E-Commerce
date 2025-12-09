<div class="font-sans text-[#1A1A1A]">

    <div class="py-5 bg-white text-center">
        <div class="container mx-auto px-4">
            <p class="text-sm font-bold tracking-[0.2em] text-gray-500 uppercase mb-3">
                {{ $bike->description ?? 'LỰA CHỌN CHUẨN GEN Z' }}
            </p>
            <h2 class="text-5xl md:text-6xl font-black text-[#002C3E] uppercase mb-12">
                {{ $bike->name }}
            </h2>
            <div class="relative max-w-4xl mx-auto w-[893px] h-[508px] md:h-[500px]">
                <img :src="selectedVariant.image_url"
                     :alt="selectedVariant.color_name"
                     class="w-full h-full object-contain drop-shadow-2xl">
            </div>
        </div>
    </div>

    <div class="bg-[#F2F2F2]">
        <div class="container mx-auto px-4">
            <h3 class="text-xl font-semibold tracking-widest text-gray-500 uppercase text-center mb-12 mt-6">
                THÔNG SỐ SẢN PHẨM
            </h3>

            @php
                // 1. Take the first 16 specs
                $specColumns = $bike->specs->take(12)->chunk(4);

                // Define reusable classes with increased spacing (px-8, py-5)
                $containerClasses = "flex justify-between items-center py-5 px-8";
                $labelClasses = "text-sm md:text-base font-medium text-gray-500 uppercase tracking-wide";
                $valueClasses = "text-sm md:text-base font-bold text-[#002C3E] text-right";
            @endphp

            {{-- The grid now spans the full container width (px-4 in parent div gives padding) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8">

                {{-- Loop through the 3 columns --}}
                @foreach($specColumns as $columnIndex => $columnSpecs)
                    <div class="px-8 {{ $loop->last ? '' : 'md:border-r border-gray-300 md:pr-16' }}">

                        {{-- Loop through the 4 rows in each column --}}
                        @foreach($columnSpecs as $specIndex => $spec)

                            @php
                                // Apply border-b ONLY to the first 3 items (0, 1, 2)
                                $isLastRow = ($specIndex === $columnSpecs->count() - 1);
                                $rowBorderClass = $isLastRow ? '' : 'border-b border-gray-300';
                            @endphp

                            {{-- Key-Value Row with CONDITIONAL Bottom Border --}}
                            <div class="{{ $containerClasses }} {{ $rowBorderClass }}">
                                <span class="{{ $labelClasses }}">{{ $spec->label }}</span>
                                <span class="{{ $valueClasses }}">{{ $spec->value }}</span>
                            </div>
                        @endforeach
                    </div> {{-- End of column div --}}
                @endforeach
            </div>
        </div>
    </div>

    {{-- ... RELATED BIKES SECTION FOLLOWS ... --}}
    <div class="py-24 bg-[#F2F4F5] border-t border-gray-200 mt-20"
         x-data="{
             // Default to the first related bike's image, or the current bike as fallback
             previewImage: '{{ $related_bikes->first()->variants->first()->image_url ?? $bike->variants->first()->image_url }}',
             activeId: null
         }"
    >
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-sm font-bold tracking-widest text-gray-500 uppercase mb-12">
                THAM KHẢO NHỮNG MẪU XE KHÁC
            </h3>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <div class="lg:col-span-7 flex flex-col">
                    @foreach($related_bikes as $related)
                        <a href="{{ route('products.show', $related) }}"
                           class="group flex justify-between items-center py-6 border-b border-gray-300 cursor-pointer hover:bg-white px-6 transition-all duration-300"
                           @mouseenter="previewImage = '{{ $related->variants->first()->image_url }}'; activeId = {{ $related->id }}"
                        >
                            <span class="text-xl font-bold text-[#002C3E] uppercase transition-all duration-300"
                                  :class="activeId === {{ $related->id }} ? 'pl-4 text-blue-600' : 'group-hover:pl-4'">
                                {{ $related->name }}
                            </span>

                            <button class="text-3xl font-light text-gray-400 group-hover:text-[#002C3E] group-hover:rotate-90 transition-all duration-300">
                                +
                            </button>
                        </a>
                    @endforeach
                </div>

                <div class="hidden lg:block lg:col-span-5 relative h-[400px]">
                    <div class="absolute inset-0 flex items-center justify-center p-6 bg-white rounded-3xl shadow-sm border border-gray-100">
                        <img :src="previewImage"
                             :key="previewImage"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             alt="Preview"
                             class="w-full h-full object-contain">
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
