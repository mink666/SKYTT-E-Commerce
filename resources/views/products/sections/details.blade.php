<div class="font-sans text-[#1A1A1A]">
    @foreach($bike->sections->sortBy('sort_order') as $section)

        @php
            // 1. Separate the items into their correct groups for clean access (Used for split layouts)
            $imageItem = $section->items
                ->whereNotNull('image')
                ->sortBy('sort_order')
                ->first();

            $textItems = $section->items
                ->when($imageItem, function ($collection) use ($imageItem) {
                    return $collection->where('id', '!=', $imageItem->id);
                }, function ($collection) {
                    return $collection->whereNull('image');
                })
                ->whereNull('image');
        @endphp

        {{-- ========================================================= --}}
        {{-- 1. TEXT/IMAGE SPLIT LAYOUT (Normal/Reverse - 50/50) --}}
        {{-- Now fully dynamic for header, text, and bullets --}}
        {{-- ========================================================= --}}
        @if($section->type === 'text_image_split' || $section->type === 'text_image_split_reverse')
            <div class="py-24 bg-[#F6F9F8] h-[912px] text-[#0B2434]">
                <div class="container mx-auto px-4 max-w-6xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

                        {{-- IMAGE COLUMN --}}
                        <div class="{{ $section->type === 'text_image_split_reverse' ? 'order-2 md:order-last' : '' }}">
                            @if($imageItem)
                                {{-- REVERTED TO FIXED HEIGHT (600px) --}}
                                <div class="relative h-[600px] bg-gray-100 rounded-3xl overflow-hidden">
                                    <img src="{{ asset($imageItem->image) }}"
                                            data-db-path="{{ $imageItem->image }}"
                                         alt="{{ $section->title }}"
                                         class="absolute inset-0 w-full h-full object-contain">
                                </div>
                            @endif
                        </div>

                        {{-- TEXT COLUMN (Dynamic) --}}
                        <div class="py-8 {{ $section->type === 'text_image_split_reverse' ? 'order-1 md:order-first' : '' }}">
                            <h2 class="text-4xl mb-6">{{ $section->title }}</h2>

                            <div class="space-y-6">
                                @foreach($textItems as $item)
                                    <div>
                                        {{-- 1. HEADER (Used for main titles like 'Hiệu suất ấn tượng:') --}}
                                        @if($item->header)
                                            <h3 class="text-lg mb-2">{{ $item->header }}</h3>
                                        @endif

                                        {{-- 2. BULLETS (Renders list from JSON column) --}}
                                        @if(!empty($item->bullets))
                                            <ul class="list-disc list-inside space-y-2 pl-4 text-gray-700">
                                                @foreach($item->bullets as $bullet)
                                                    <li>{{ $bullet }}</li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        {{-- 3. TEXT (Renders notes or disclaimers, checking for italic formatting) --}}
                                        @if($item->text)
                                            <p class="{{ str_contains($item->text, 'Theo điều kiện tiêu chuẩn') || str_contains($item->text, '*') ? 'text-xs italic mt-2' : 'leading-relaxed' }}">
                                                {{ $item->text }}
                                            </p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        {{-- ========================================================= --}}
        {{-- 2. TWO CARD LAYOUT (Two by Two) --}}
        {{-- Custom Styles: BG #DBE0D3, Cards BG #F6F9F8, Text #0B2434, Height 931px --}}
        {{-- ========================================================= --}}
        @elseif($section->type === 'two_cards')
            <div class="py-24 bg-[#DBE0D3] text-[#0B2434]">
                <div class="container mx-auto px-4 max-w-6xl">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($section->items->sortBy('sort_order') as $item)
                            <div class="bg-[#F6F9F8] rounded-3xl p-10 h-[931px] flex flex-col relative overflow-hidden group hover:shadow-lg transition-shadow">
                                <div class="relative z-10">
                                    {{-- DYNAMIC CONTENT FOR CARD --}}
                                    @if($item->header)
                                        <p class="text-xs tracking-widest text-gray-500 uppercase mb-2">{{ $item->header }}</p>
                                    @endif
                                    <h3 class="text-3xl mb-4">{{ $item->header }}</h3>
                                    <p class="leading-relaxed">{{ $item->text }}</p>
                                    {{-- END DYNAMIC CONTENT --}}
                                </div>
                                @if($item->image)
                                    @php
                                        // Determine the width and set the necessary centering classes
                                        // $loop->index is 0 for the first card in the section, 1 for the second.
                                        $imageClasses = $loop->index === 0
                                            ? 'left-1/2 -translate-x-1/2 w-4/5' // Card 1: Centered, 80% width
                                            : 'left-1/2 -translate-x-1/2 w-3/5'; // Card 2: Centered, 60% width
                                    @endphp
                                    <img src="{{ asset($item->image) }}"
                                         data-db-path="{{ $item->image }}"
                                         alt="{{ $item->header }}"
                                         class="absolute bottom-0 h-full object-contain translate-y-10 group-hover:translate-y-5 transition-transform duration-500 {{ $imageClasses }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
