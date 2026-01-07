@extends('layouts.app')

@section('title', $news->title)

@section('content')

    {{--
        CONTAINER CHANGES:
        - min-h-[80vh]: Pushes the footer down if content is short.
        - md:py-16: Increased vertical padding for a more spacious feel on Tablet.
    --}}
    <div class="container mx-auto px-4 py-12 md:py-16 min-h-[80vh]">

        {{--
            LAYOUT LOGIC:
            - flex-col: Mobile & Tablet (Stacked)
            - xl:flex-row: Desktop Only (Side-by-Side)
            * Changing from 'lg' to 'xl' ensures iPad Pro Portrait (which is often <1280px)
              sees the full-width stacked version.
        --}}
        <div class="flex flex-col xl:flex-row gap-12 lg:gap-20">

            {{-- Main Content Column --}}
            {{-- xl:w-2/3 ensures it is full width (w-full) on iPad --}}
            <main class="w-full xl:w-2/3">

                {{-- Title --}}
                <div class="mb-6 md:mb-8" data-aos="fade-up">
                    {{-- Scaled up title size for tablet (md:text-5xl) --}}
                    <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">
                        {{ $news->title }}
                    </h1>
                    <p class="text-gray-500 text-sm md:text-base">
                        Published on {{ \Carbon\Carbon::parse($news->publish_date)->format('F j, Y') }}
                    </p>
                </div>

                {{-- Featured Image --}}
                <div class="mb-8 md:mb-12" data-aos="fade-up" data-aos-delay="100">
                    {{-- Increased max-height for tablet (md:max-h-[600px]) --}}
                    <img src="{{ asset($news->image_url) ?? '/images/default-news.jpg' }}"
                         alt="{{ $news->title }}"
                         class="w-full h-auto max-h-[500px] md:max-h-[600px] object-cover rounded-2xl shadow-lg">
                </div>

                {{-- Article Content --}}
                {{-- Changed to 'md:prose-xl' to make text larger and easier to read on iPad --}}
                <article class="prose prose-lg md:prose-xl max-w-none text-gray-800" data-aos="fade-up" data-aos-delay="200">
                    {!! $news->content !!}
                </article>

            </main>

            {{-- Sidebar Column --}}
            {{-- xl:w-1/3 ensures it is full width (w-full) on iPad, sitting below content --}}
            <aside class="w-full xl:w-1/3" data-aos="fade-up" data-aos-delay="300">
                <div class="sticky top-24 bg-gray-50 p-6 md:p-8 rounded-2xl shadow-md border border-gray-100">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-900 border-b pb-4 mb-6">
                        Recent News
                    </h3>

                    <div class="space-y-6">
                        @forelse ($recentNews as $recent)
                            <a href="{{ route('news.show', $recent) }}" class="group block">
                                <div class="flex items-start space-x-4">
                                    {{-- Increased thumbnail size --}}
                                    <img src="{{ asset($recent->image_url) ?? '/images/default-news-thumb.jpg' }}"
                                         alt="{{ $recent->title }}"
                                         class="w-20 h-20 md:w-24 md:h-24 object-cover rounded-xl flex-shrink-0 shadow-sm transition-transform group-hover:scale-105">

                                    <div class="flex-1">
                                        <h4 class="text-base md:text-lg font-semibold text-gray-800 group-hover:text-[#3D5A17] transition-colors leading-snug line-clamp-2">
                                            {{ $recent->title }}
                                        </h4>
                                        <p class="text-xs md:text-sm text-gray-500 mt-2">
                                            {{ \Carbon\Carbon::parse($recent->publish_date)->format('M j, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-500 italic">No other news available.</p>
                        @endforelse
                    </div>
                </div>
            </aside>

        </div>
    </div>
@endsection
