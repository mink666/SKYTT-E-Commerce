@extends('layouts.app')

@section('title', $news->title)

@section('content')

    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-12">

            {{-- Main Content Column --}}
            <main class="w-full lg:w-2/3">

                {{-- Title --}}
                <div class="mb-6" data-aos="fade-up">
                    <h1 class="text-4xl font-bold text-gray-900 mb-3">{{ $news->title }}</h1>
                    <p class="text-gray-500 text-sm">
                        Published on {{ \Carbon\Carbon::parse($news->publish_date)->format('F j, Y') }}
                    </p>
                </div>

                {{-- Featured Image --}}
                <div class="mb-8" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset($news->image_url) ?? '/images/default-news.jpg' }}"
                         alt="{{ $news->title }}"
                         class="w-full h-auto max-h-[500px] object-cover rounded-lg shadow-lg">
                </div>

                {{-- Article Content --}}
                <article class="prose prose-lg max-w-none" data-aos="fade-up" data-aos-delay="200">
                    {!! $news->content !!}
                </article>

            </main>

            {{-- Sidebar Column --}}
            {{-- This whole sidebar will fade-up as one block --}}
            <aside class="w-full lg:w-1/3" data-aos="fade-up" data-aos-delay="300">
                <div class="sticky top-24 bg-gray-50 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 border-b pb-3 mb-4">
                        Recent News
                    </h3>

                    <div class="space-y-4">
                        @forelse ($recentNews as $recent)
                            <a href="{{ route('news.show', $recent) }}" class="group block">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ asset($recent->image_url) ?? '/images/default-news-thumb.jpg' }}"
                                         alt="{{ $recent->title }}"
                                         class="w-16 h-16 object-cover rounded-md flex-shrink-0">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-800 group-hover:text-blue-600 transition-colors">
                                            {{ $recent->title }}
                                        </h4>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ \Carbon\Carbon::parse($recent->publish_date)->format('M j, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-500">No other news available.</p>
                        @endforelse
                    </div>
                </div>
            </aside>

        </div>
    </div>
@endsection
