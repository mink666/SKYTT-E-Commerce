@extends('layouts.app')

@section('title', 'News')

@section('content')
    <div class="w-full bg-[#DBE0D3] h-130">
    <div class="mx-auto flex flex-col md:flex-row items-center h-full">

        <div class="w-full md:w-1/2 p-8 lg:p-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">RECENT NEWS</h2>

            @if ($featuredNews)
                <h3 class="text-2xl font-semibold text-gray-900">
                    {{ $featuredNews->title }}
                </h3>
                <p class="text-gray-600 mt-2 mb-6">
                    {{ Str::limit(strip_tags($featuredNews->content), 150) }}
                </p>
                <a href="{{ route('news.show', $featuredNews) }}"
                   class="inline-block bg-gray-800 text-white py-2 px-5 rounded-full font-semibold hover:bg-gray-700 transition-colors">
                    Xem thêm
                </a>
            @else
                <p>No recent news to display.</p>
            @endif
        </div>

        <div class="w-full md:w-1/2 h-full">
            <img src="{{ asset($featuredNews->image_url ?? '/images/default-hero.jpg') }}"
                 alt="{{ $featuredNews->title ?? 'News' }}"
                 class="w-full h-full object-fill block">
        </div>
    </div>
</div>

    <div class="container mx-auto px-4 py-12">

        <div class="max-w-6xl mx-auto mb-8">
            <div class="flex flex-col md:flex-row items-center justify-between">

                <div class="flex items-center space-x-2">
                    <span class="text-sm font-semibold text-gray-700">LỌC:</span>
                    <a href="{{ route('news.index', ['category' => 'ALL']) }}" class="text-sm font-semibold bg-gray-200 text-gray-800 py-1 px-4 rounded-full hover:bg-gray-300">ALL</a>
                    <a href="{{ route('news.index', ['category' => 'Vinfast']) }}" class="text-sm font-semibold bg-gray-200 text-gray-800 py-1 px-4 rounded-full hover:bg-gray-300">Vinfast</a>
                    <a href="{{ route('news.index', ['category' => 'Neo']) }}" class="text-sm font-semibold bg-gray-200 text-gray-800 py-1 px-4 rounded-full hover:bg-gray-300">Neo</a>
                </div>

                <form action="{{ route('news.index') }}" method="GET" class="relative w-full md:w-1/3 mt-4 md:mt-0">
                    <input
                        type="text"
                        name="search"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tìm kiếm tin tức..."
                        value="{{ request('search') }}">
                    <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">

        @forelse ($newsList as $news)
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl flex flex-col h-[370px]">

                <a href="{{ route('news.show', $news) }}" class="block h-3/5 align-bottom">
                    <img src="{{ asset($news->image_url ?? 'images/default-news.jpg') }}"
                         alt="{{ $news->title }}"
                         class="w-full h-full object-cover"> 
                </a>

                <div class="p-5 flex flex-col flex-1">
                    <a href="{{ route('news.show', $news) }}">
                        <h3 class="text-lg font-semibold text-gray-900 hover:text-blue-600">
                            {{ $news->title }}
                        </h3>
                    </a>

                    <div class="mt-auto flex items-center">
                        <a href="{{ route('news.show', $news) }}" class="inline-block bg-[#3D5A17] bg-opacity-10 text-white py-1 px-3 rounded-full text-sm font-medium hover:bg-opacity-20 mr-auto">
                            Xem chi tiết
                        </a>
                        <p class="text-sm text-gray-500">
                            {{ $news->publish_date ? \Carbon\Carbon::parse($news->publish_date)->format('M d, Y') : '' }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="md:col-span-3 text-center text-gray-500">No news articles found.</p>
        @endforelse

        </div>

        <div class="mt-12">
            {{ $newsList->links('pagination.custom') }}
        </div>

    </div>
@endsection
