@extends('layouts.app')

@section('title', $bike->name)

@section('content')
    <div class="container mx-auto px-4 py-12">

        <div
            x-data="{
                selectedVariant: {{ $bike->variants->first() ?? 'null' }}
            }"
            class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start"
        >

            <div class="sticky top-24">
                <img x-show="selectedVariant" :src="selectedVariant.image_url" :alt="$bike->name" class="w-full h-auto object-cover rounded-lg shadow-lg">
                <div x-show="!selectedVariant">No image available</div>
            </div>

            <div class="py-4">
                <h1 class="text-4xl font-bold text-gray-900">{{ $bike->name }}</h1>
                <p class="text-lg text-gray-600 mt-2">{{ $bike->description ?? 'Lựa chọn chuẩn Gen Z' }}</p>

                <p class="text-3xl font-bold text-gray-900 mt-4" x-show="selectedVariant">
                    Giá niêm yết: <span x-text="Number(selectedVariant.price).toLocaleString('vi-VN')"></span> VNĐ
                </p>
                <p class="text-gray-500 text-sm">(Đã bao gồm VAT, bộ sạc và ắc quy)</p>

                <div class="mt-6">
                    <p class="text-sm font-medium text-gray-700 mb-2">Màu sắc:</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($bike->variants as $variant)
                            <button
                                @click="selectedVariant = {{ json_encode($variant) }}"
                                class="w-8 h-8 rounded-full border-2 focus:outline-none"
                                :class="{ 'ring-2 ring-offset-2 ring-blue-500': selectedVariant.id === {{ $variant->id }} }"
                                style="background-color: {{ $variant->color_name }};"
                                title="{{ $variant->color_name }}"
                            ></button>
                        @endforeach
                    </div>
                </div>

                <button class="mt-8 w-full bg-[#3D5A17] text-white py-3 px-6 rounded-lg text-lg font-semibold hover:bg-opacity-90 transition-all">
                    Liên hệ
                </button>
            </div>
        </div>


        <div class="mt-24 py-16 bg-gray-50 rounded-lg">
            <div class="container mx-auto px-4 relative">

                <div class="flex justify-center">
                    <img src="{{ $bike->variants->first()->image_url ?? 'default-image.jpg' }}" alt="{{ $bike->name }}" class="w-full max-w-md h-auto object-contain">
                </div>

                @php
                    $feature1 = $bike->features->where('order', 1)->first();
                    $feature2 = $bike->features->where('order', 2)->first();
                    $feature3 = $bike->features->where('order', 3)->first();
                    $feature4 = $bike->features->where('order', 4)->first();
                @endphp

                @if ($feature1)
                <div class="absolute top-0 left-0 w-64">
                    <h4 class="text-lg font-bold text-gray-900">{{ $feature1->header_title }}</h4>
                    <p class="text-sm text-gray-600">{{ $feature1->body_content }}</p>
                </div>
                @endif

                @if ($feature2)
                <div class="absolute bottom-0 left-0 w-64">
                    <h4 class="text-lg font-bold text-gray-900">{{ $feature2->header_title }}</h4>
                    <p class="text-sm text-gray-600">{{ $feature2->body_content }}</p>
                </div>
                @endif

                @if ($feature3)
                <div class="absolute top-0 right-0 w-64">
                    <h4 class="text-lg font-bold text-gray-900">{{ $feature3->header_title }}</h4>
                    <p class="text-sm text-gray-600">{{ $feature3->body_content }}</p>
                </div>
                @endif

                @if ($feature4)
                <div class="absolute bottom-0 right-0 w-64">
                    <h4 class="text-lg font-bold text-gray-900">{{ $feature4->header_title }}</h4>
                    <p class="text-sm text-gray-600">{{ $feature4->body_content }}</p>
                </div>
                @endif
            </div>
        </div>


        <div class="mt-24">
            <h2 class="text-3xl font-bold text-center mb-12">Vận hành êm ái, muôn nơi</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($bike->features->where('order', '>', 4) as $feature)
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <h4 class="text-xl font-bold text-gray-900">{{ $feature->header_title }}</h4>
                        <p class="text-gray-600 mt-2">{{ $feature->body_content }}</p>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="mt-24 max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">Thông số sản phẩm</h2>
            <div class="space-y-4">
                <div class="border rounded-lg overflow-hidden">
                    <div class="bg-gray-100 p-4 cursor-pointer flex justify-between items-center">
                        <span class="font-semibold">EVO GRAND</span>
                        <span>+</span>
                    </div>
                    </div>
                </div>
        </div>


        <div class="mt-24">
            <h2 class="text-3xl font-bold text-center mb-12">Tham khảo những mẫu xe khác</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 max-w-5xl mx-auto">
                {{-- @foreach ($related_bikes as $bike)
                    <div class="bg-gray-100 rounded-lg p-4 ...">
                        ... (Your product card HTML) ...
                    </div>
                @endforeach --}}

                <p class="text-center md:col-span-3 text-gray-500">(Related Product Cards Go Here)</p>
            </div>
        </div>

    </div>
@endsection
