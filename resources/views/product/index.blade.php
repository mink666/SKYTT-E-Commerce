@extends('layouts.app')

@section('title', 'All Products')

@section('content')
    <div class="container mx-auto px-4 py-12">

        <div class="text-center mb-8">
            <p class="text-lg text-gray-600">Not sure which bike is right for you?</p>
            <h1 class="text-4xl font-bold text-gray-900 mt-1">Meet the family</h1>
        </div>

        <div class="max-w-5xl mx-auto mb-4 px-0 mt-20">
            <form action="{{ route('product.index') }}" method="GET" class="relative w-full md:w-1/3">
                <input
                    type="text"
                    name="search"
                    class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search..."
                    value="{{ request('search') }}">

                <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
            <div class="mt-2 text-sm text-gray-500 min-h-[1.25rem]"></div>
        </div>
        <div class="flex items-center pb-3 mb-8 max-w-5xl mx-auto">
            <div class="ml-auto">
                <a href="#" class="text-sm font-semibold text-gray-700 flex items-center">
                    LỌC
                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 max-w-5xl mx-auto">
            @foreach ($bikes as $bike)
                <div class="bg-gray-100 rounded-lg p-4 transition-all duration-300 hover:shadow-lg aspect-square flex flex-col">

                    <h3 class="text-lg font-semibold text-gray-900 ml-12 mb-2 mt-8">
                        {{ $bike->name }}
                    </h3>

                    <p class="text-sm text-gray-500 mb-8 ml-12">
                        {{ $bike->tagline ?? 'Lựa chọn cho bạn' }}
                    </p>

                    <a href="{{ route('product.show', $bike) }}">
                        <img src="{{ $bike->variants->first()->image_url ?? 'default-image.jpg' }}"
                             alt="{{ $bike->name }}"
                             class="w-full h-70 object-contain mb-14"> </a>

                    <div class="flex justify-center space-x-2">
                        @foreach ($bike->variants as $variant)
                            <span class="block w-5 h-5 rounded-full border-2 border-gray-300"
                                  style="background-color: {{ $variant->color_name }};"
                                  title="{{ $variant->color_name }}">
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>

        <div class="mt-12">
            {{ $bikes->links('pagination.custom') }}
        </div>

    </div>
@endsection
