<div class="font-sans text-[#1A1A1A]">
    @foreach($bike->sections->sortBy('sort_order') as $section)

        @if($section->type === 'text_image_split' || $section->type === 'text_image_split_reverse')

            @php
                $isReverse = $section->type === 'text_image_split_reverse';
            @endphp

            <section class="w-full bg-white border-gray-100 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:min-h-[700px]">

                    {{-- TEXT COLUMN --}}
                    {{-- ADDED: data-aos-offset="400" and increased duration to 800 --}}
                    <div class="flex flex-col justify-center p-8 md:p-16 lg:p-24 order-2 {{ $isReverse ? 'md:order-2' : 'md:order-1' }}"
                         data-aos="{{ $isReverse ? 'fade-left' : 'fade-right' }}"
                         data-aos-offset="400"
                         data-aos-duration="800">

                        <div class="max-w-xl mx-auto {{ $isReverse ? 'md:mr-auto md:ml-0' : 'md:ml-auto md:mr-0' }}">
                            @if($section->subtitle)
                                <p class="text-xs font-bold tracking-widest text-gray-500 uppercase mb-3 md:mb-4">
                                    {{ $section->subtitle }}
                                </p>
                            @endif

                            <h2 class="text-xl md:text-2xl lg:text-4xl font-bold text-[#0B2434] mb-8 leading-tight">
                                {{ $section->title }}
                            </h2>

                            <div class="space-y-8">
                                @foreach($section->items->sortBy('sort_order') as $item)
                                    <div>
                                        @if($item->header)
                                            <h4 class="text-lg font-bold text-[#0B2434] mb-2">
                                                {{ $item->header }}
                                            </h4>
                                        @endif

                                        @if($item->bullets)
                                            <ul class="list-disc pl-5 space-y-1 text-gray-600">
                                                @foreach(is_array($item->bullets) ? $item->bullets : json_decode($item->bullets, true) ?? [] as $bullet)
                                                    <li>{{ $bullet }}</li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        @if($item->text)
                                            <p class="text-gray-600 leading-relaxed mt-3 italic">
                                                {{ $item->text }}
                                            </p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    {{-- IMAGE COLUMN --}}
                    {{-- ADDED: data-aos-offset="400" --}}
                    <div class="relative w-full h-[400px] md:h-full order-1 {{ $isReverse ? 'md:order-1' : 'md:order-2' }}"
                         data-aos="{{ $isReverse ? 'fade-right' : 'fade-left' }}"
                         data-aos-offset="400"
                         data-aos-duration="800">

                        @if($section->image)
                            <img src="{{ asset($section->image) }}"
                                 alt="{{ $section->title }}"
                                 class="absolute inset-0 w-full h-full object-contain">
                        @endif
                    </div>

                </div>
            </section>

        @elseif($section->type === 'two_cards')
            <div class="py-10 md:py-16 text-[#0B2434]">
                <div class="container mx-auto px-4 max-w-[1400px]">

                    <div class="flex flex-nowrap overflow-x-auto snap-x snap-mandatory gap-4 md:grid md:grid-cols-3 lg:grid-cols-5 md:gap-6 pb-6 md:pb-0 hide-scrollbar">

                        @foreach($section->items->sortBy('sort_order') as $item)

                            {{-- Card Container --}}
                            {{-- ADDED: offset="300" and increased stagger multiplier to 200 --}}
                            <div class="flex-shrink-0 w-[65vw] md:w-auto snap-center bg-[#F6F9F8] rounded-3xl h-[550px] flex flex-col overflow-hidden group"
                                 data-aos="fade-down"
                                 data-aos-offset="300"
                                 data-aos-duration="800"
                                 data-aos-delay="{{ $loop->index * 200 }}">

                                <div class="h-[75%] w-full relative overflow-hidden">
                                    @if($item->image)
                                        <img src="{{ asset($item->image) }}"
                                            data-db-path="{{ $item->image }}"
                                            alt="Feature Image"
                                            class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="h-[25%] flex items-start p-6">
                                    <p class="text-sm md:text-base leading-relaxed text-[#0B2434] font-medium whitespace-normal">
                                        {{ $item->text }}
                                    </p>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

<style>
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
