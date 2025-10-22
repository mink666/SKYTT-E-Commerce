@extends('layouts.app')

@section('title', 'Dịch vụ')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center mb-12">Dịch vụ</h1>

        <div class="space-y-8 max-w-5xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2 overflow-hidden rounded-lg shadow-md bg-[#F2F2F2]">

                <div class="flex flex-col justify-center items-center text-center px-12 py-20 lg:px-16 lg:py-28">
                    <img src="{{ asset('images/service/service1.png') }}" alt="Bán xe Icon" class="w-18 h-18 object-contain mb-4">

                    <h2 class="text-3xl font-semibold mb-3">Bán xe</h2>
                    <p class="text-gray-600 max-w-xs">
                        Tư vấn đúng nhu cầu, lái thử miễn phí, giao xe nhanh - minh bạch trọn gói.
                    </p>
                </div>

                <div class="min-h-[300px] md:h-full w-full">
                    <img src="{{ asset('images/service-warranty.jpg') }}" alt="Bảo hành pin 8 năm" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 overflow-hidden rounded-lg shadow-md bg-[#DBE0D3]">

                <div class="min-h-[300px] md:h-full w-full">
                    <img src="{{ asset('images/service-repair.jpg') }}" alt="Sửa chữa" class="w-full h-full object-cover">
                </div>

                <div class="flex flex-col justify-center items-center text-center px-12 py-20 lg:px-16 lg:py-28">
                    <img src="{{ asset('images/service/service2.png') }}" alt="Bán xe Icon" class="w-16 h-16 object-contain mb-4">

                    <h2 class="text-3xl font-semibold mb-3">Sửa chữa</h2>
                    <p class="text-gray-600 max-w-xs">
                        Chẩn đoán chính xác, báo giá trước, thợ tay nghề cao, bảo hành sau sửa.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 overflow-hidden rounded-lg shadow-md bg-[#F2F2F2]">

                <div class="flex flex-col justify-center items-center text-center px-12 py-20 lg:px-16 lg:py-28">
                    <img src="{{ asset('images/service/service3.png') }}" alt="Phụ tùng Icon" class="w-18 h-18 object-contain mb-4">

                    <h2 class="text-3xl font-semibold mb-3">Phụ tùng</h2>
                    <p class="text-gray-600 max-w-xs">
                        Phụ tùng chính hãng, giá niêm yết, lắp đặt tại chỗ, tư vấn nâng cấp an toàn.
                    </p>
                </div>

                <div class="min-h-[300px] md:h-full w-full">
                    <img src="{{ asset('images/service-parts.jpg') }}" alt="Phụ tùng" class="w-full h-full object-cover">
                </div>
            </div>

        </div> </div> @endsection
