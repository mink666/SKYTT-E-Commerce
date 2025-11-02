@extends('layouts.app')

@section('title', 'Dịch vụ')

@section('content')
    <div class="container mx-auto px-4 py-12">

        <h1 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">Dịch vụ</h1>

        <div class="space-y-8 max-w-5xl mx-auto">

            {{-- CARD 1 (Bán xe) --}}
            <div
              class="grid grid-cols-1 md:grid-cols-2 overflow-hidden rounded-[29px] shadow-md bg-[#F2F2F2]"
              data-aos="fade-right" {{-- ADDED: Animation from left --}}
            >

                <div class="flex flex-col justify-center items-center text-center px-12 py-20 lg:px-16 lg:py-28">
                    <img src="{{ asset('images/service/service1.png') }}" alt="Bán xe Icon" class="w-16 h-16 object-contain mb-4">

                    <h2 class="text-3xl font-semibold mb-3">Bán xe</h2>
                    <p class="text-gray-600 max-w-xs">
                        Tư vấn đúng nhu cầu, lái thử miễn phí, giao xe nhanh - minh bạch trọn gói.
                    </p>
                </div>

                {{-- FIXED: Set a consistent height for all image containers --}}
                <div class="h-[440px] w-full">
                    <img src="{{ asset('images/service/service-1-thum.png') }}" alt="Bảo hành pin 8 năm" class="w-full h-full object-cover">
                </div>
            </div>

            {{-- CARD 2 (Sửa chữa) --}}
            <div
              class="grid grid-cols-1 md:grid-cols-2 overflow-hidden rounded-[29px] shadow-md bg-[#DBE0D3]"
              data-aos="fade-left" {{-- ADDED: Animation from right --}}
              data-aos-delay="600"
            >
                <div class="h-[440px] w-full md:order-last">
                    <img src="{{ asset('images/service/service-2-thum.png') }}" alt="Sửa chữa" class="w-full h-full object-cover">
                </div>

                <div class="flex flex-col justify-center items-center text-center px-12 py-20 lg:px-16 lg:py-28">
                    <img src="{{ asset('images/service/service2.png') }}" alt="Sửa chữa Icon" class="w-16 h-16 object-contain mb-4">
                    <h2 class="text-3xl font-semibold mb-3">Sửa chữa</h2>
                    <p class="text-gray-600 max-w-xs">
                        Chẩn đoán chính xác, báo giá trước, thợ tay nghề cao, bảo hành sau sửa.
                    </p>
                </div>
            </div>

            {{-- CARD 3 (Phụ tùng) --}}
            <div
              class="grid grid-cols-1 md:grid-cols-2 overflow-hidden rounded-[29px] shadow-md bg-[#F2F2F2]"
              data-aos="fade-right" {{-- ADDED: Animation from left --}}
              data-aos-delay="900"
            >

                <div class="flex flex-col justify-center items-center text-center px-12 py-20 lg:px-16 lg:py-28">
                    <img src="{{ asset('images/service/service3.png') }}" alt="Phụ tùng Icon" class="w-16 h-16 object-contain mb-4">
                    <h2 class="text-3xl font-semibold mb-3">Phụ tùng</h2>
                    <p class="text-gray-600 max-w-xs">
                        Phụ tùng chính hãng, giá niêm yết, lắp đặt tại chỗ, tư vấn nâng cấp an toàn.
                    </p>
                </div>
                <div class="h-[440px] w-full flex justify-center items-center">
                    <img src="{{ asset('images/service/service-3-thum.png') }}" alt="Phụ tùng" class="w-96 h-96 object-cover">
                </div>
            </div>

        </div>
    </div>
@endsection
