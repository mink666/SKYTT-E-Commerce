@extends('layouts.app')

@section('title', 'All Products')

@section('content')
    <div class="container mx-auto px-4 py-12">

        <div class="text-center mb-8" data-aos="fade-up">
            <p class="text-lg text-gray-600">Not sure which bike is right for you?</p>
            <h1 class="text-4xl font-bold text-gray-900 mt-1">Meet the family</h1>
        </div>

        <div class="max-w-7xl mx-auto mb-8 px-4 md:px-0 mt-20" data-aos="fade-up" data-aos-delay="100">

            <div class="flex justify-between items-center mb-2">

                <form action="{{ route('products.index') }}" method="GET" class="relative w-full md:w-1/3">
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

                <a href="#" class="flex items-center mt-4 space-x-2 text-sm font-semibold text-gray-700 hover:text-gray-900 transition-colors">
                    <span>LỌC</span>
                    <img src="{{ asset('images/filter-icon.png') }}" alt="Filter" class="h-4 w-4 object-contain">
                </a>

            </div>

            <div class="text-sm text-gray-500 min-h-[1.25rem]">
                </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-7xl mx-auto">
            @foreach ($bikes as $bike)
                <div
                  class="bg-gray-100 rounded-2xl p-4 transition-all duration-300 hover:shadow-lg aspect-square flex flex-col"
                  data-aos="fade-up"
                  {{--
                    ($loop->index % 2) sẽ là 0 (cột trái) hoặc 1 (cột phải).
                  --}}
                  data-aos-delay="{{ ($loop->index % 2) * 100 }}"
                >

                    <h3 class="text-2xl font-semibold text-gray-900 ml-18 mb-2 mt-10">
                        {{ $bike->name }}
                    </h3>

                    <p class="text-lg text-gray-500 mb-6 ml-18">
                        {{ $bike->tagline ?? 'Lựa chọn cho bạn' }}
                    </D>

                    <a href="{{ route('products.show', $bike) }}">
                        <img src="{{ $bike->variants->first()->image_url ?? 'default-image.jpg' }}"
                             alt="{{ $bike->name }}"
                             class="w-full h-90 object-cover mb-16"> </a>

                    <div class="flex justify-center space-x-2">
                        @foreach ($bike->variants as $variant)
                            <span class="block w-7 h-7 rounded-full border-2 border-gray-300"
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
