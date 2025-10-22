@extends('layouts.app')

@section('title', 'About VinFast SKYTT')

@section('content')
<div class="container mx-auto px-4 py-12">

    {{-- Hero --}}
    <div class="flex flex-col md:flex-row items-center justify-between mb-16">
        <div class="md:w-1/2 mb-8 md:mb-0">
            <p class="text-gray-500 mb-2">Giới thiệu về</p>
            <h1 class="text-4xl font-bold mb-4">Công ty VinFast SKYTT</h1>
            <p class="text-gray-700">VinFast SKYTT là đại lý ủy quyền chính thức của VinFast, cam kết mang đến chất lượng, hậu mãi, dịch vụ bảo hành, độ uy tín cao nhất.</p>
        </div>
        <div class="md:w-1/2 flex justify-end">
            <img src="{{ asset('images/hero-bike.png') }}" class="w-80 h-auto" />
        </div>
    </div>

    {{-- Global Mission --}}
    <div class="bg-gray-50 rounded-lg mb-16 py-12 text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Dấu chân toàn cầu</h2>
        <p class="max-w-2xl mx-auto text-gray-600">
            VinFast đã vươn tầm ảnh hưởng trên toàn cầu, thể hiện sự đổi mới và phát triển vượt bậc trong ngành xe điện.
        </p>
    </div>

    {{-- Statistics --}}
    <div class="flex flex-col md:flex-row gap-8 mb-16 items-center">
        <div class="md:w-1/2">
            <img src="{{ asset('images/stats.jpg') }}" class="rounded-lg shadow" />
        </div>
        <div class="md:w-1/2 space-y-6">
            <span class="inline-block bg-green-700 text-white py-1 px-4 rounded text-xs">Values</span>
            <h3 class="text-2xl font-semibold">Innovative marketing solutions backed by a decade of strategic experience.</h3>
            <div class="flex gap-8">
                <div>
                    <div class="text-4xl font-bold">95%</div>
                    <div class="text-gray-500 text-xs">Hài lòng</div>
                </div>
                <div>
                    <div class="text-4xl font-bold">10+</div>
                    <div class="text-gray-500 text-xs">Năm kinh nghiệm</div>
                </div>
                <div>
                    <div class="text-4xl font-bold">50M</div>
                    <div class="text-gray-500 text-xs">Người dùng</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll Cards Section --}}
    <div class="bg-gray-50 py-16 mb-16">
        <h2 class="text-center text-3xl font-bold mb-10">Sứ mệnh của VinFast SKYTT</h2>
        <div id="scroll-cards-container" class="relative h-[400px] max-w-4xl mx-auto">
            {{-- Each .scroll-card is absolutely stacked and js will handle which is visible --}}
            <div class="scroll-card absolute inset-0 flex flex-col md:flex-row items-center bg-white rounded-lg shadow-lg p-8 transition-opacity duration-700 active">
                <div class="md:w-1/2 flex flex-col justify-center items-center text-center mb-8 md:mb-0">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center border-2 border-gray-800 mb-4">
                        {{-- Icon SVG, hardcoded --}}
                        <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-1">Lựa chọn bền vững</h3>
                    <p class="text-gray-600">Sản phẩm tiết kiệm năng lượng, bảo vệ môi trường, cam kết mức giá tốt nhất!</p>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('images/card1.jpg') }}" class="rounded-lg shadow w-full md:w-80" />
                </div>
            </div>

            <div class="scroll-card absolute inset-0 flex flex-col md:flex-row items-center bg-white rounded-lg shadow-lg p-8 transition-opacity duration-700 opacity-0">
                <div class="md:w-1/2 flex flex-col justify-center items-center text-center mb-8 md:mb-0 order-2 md:order-1">
                    <img src="{{ asset('images/card2.jpg') }}" class="rounded-lg shadow w-full md:w-80" />
                </div>
                <div class="md:w-1/2 order-1 md:order-2 flex flex-col justify-center items-center text-center">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center border-2 border-gray-800 mb-4">
                        <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-1">Đa dạng cho mọi nhu cầu</h3>
                    <p class="text-gray-600">Nhiều mẫu xe đa dạng, phục vụ mọi đối tượng khách hàng, hỗ trợ tối đa trải nghiệm.</p>
                </div>
            </div>

            <div class="scroll-card absolute inset-0 flex flex-col md:flex-row items-center bg-white rounded-lg shadow-lg p-8 transition-opacity duration-700 opacity-0">
                <div class="md:w-1/2 flex flex-col justify-center items-center text-center mb-8 md:mb-0">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center border-2 border-gray-800 mb-4">
                        <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-1">Hỗ trợ tận tâm</h3>
                    <p class="text-gray-600">Đội ngũ kỹ thuật tâm huyết, dịch vụ bảo trì bảo dưỡng uy tín, nhanh chóng.</p>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('images/card3.jpg') }}" class="rounded-lg shadow w-full md:w-80" />
                </div>
            </div>

            <div class="scroll-card absolute inset-0 flex flex-col md:flex-row items-center bg-white rounded-lg shadow-lg p-8 transition-opacity duration-700 opacity-0">
                <div class="md:w-1/2 flex flex-col justify-center items-center text-center mb-8 md:mb-0 order-2 md:order-1">
                    <img src="{{ asset('images/card4.jpg') }}" class="rounded-lg shadow w-full md:w-80" />
                </div>
                <div class="md:w-1/2 order-1 md:order-2 flex flex-col justify-center items-center text-center">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center border-2 border-gray-800 mb-4">
                        <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-1">Trải nghiệm liền mạch</h3>
                    <p class="text-gray-600">Chuyến đi luôn an toàn, liền mạch và nhiều niềm vui với VinFast SKYTT.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Staff Section --}}
    <div class="mb-16">
        <h2 class="text-center text-3xl font-bold mb-10">Về nhân viên</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- ... Staff member cards, hardcode your info here ... --}}
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <div class="w-20 h-20 rounded-full mx-auto mb-4 overflow-hidden">
                    <img src="{{ asset('images/member1.jpg') }}" class="w-full h-full object-cover" />
                </div>
                <div class="font-bold mb-1">Nguyễn Tuấn Khoa</div>
                <div class="text-gray-500 text-xs mb-2">Kỹ thuật viên trưởng</div>
                <div class="text-xs text-gray-400 mb-2">SĐT: 0906 123 121<br> Địa chỉ: Q.Bình Thạnh, TP.HCM</div>
            </div>
            {{-- Copy/paste for more cards --}}
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/about.js') }}"></script>
@endpush

@push('styles')
<style>
.scroll-card { transition: opacity 0.7s; }
.scroll-card:not(.active) { opacity: 0; pointer-events: none; }
.scroll-card.active { opacity: 1; z-index: 10; }
</style>
@endpush
