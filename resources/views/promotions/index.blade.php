@extends('layouts.app')

@section('title', 'Khuyến mãi')

@section('content')
    <div class="container mx-auto px-4 py-12">

        {{-- Thêm AOS cho Tiêu đề --}}
        <h1 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">Khuyến mãi</h1>

        {{-- Thêm AOS cho thanh Lọc/Tìm kiếm --}}
        <div class="max-w-7xl mx-auto mb-8" data-aos="fade-up">
            <div class="flex flex-col md:flex-row items-center justify-between">

                <div class="flex items-center space-x-2">
                    <span class="text-sm font-semibold text-gray-700">LỌC:</span>
                    <a href="{{ route('promotions.index', ['category' => 'ALL']) }}" class="text-sm font-semibold bg-gray-200 text-gray-800 py-1 px-4 rounded-full hover:bg-gray-300">ALL</a>
                    <a href="{{ route('promotions.index', ['category' => 'Vinfast']) }}" class="text-sm font-semibold bg-gray-200 text-gray-800 py-1 px-4 rounded-full hover:bg-gray-300">Vinfast</a>
                    <a href="{{ route('promotions.index', ['category' => 'Neo']) }}" class="text-sm font-semibold bg-gray-200 text-gray-800 py-1 px-4 rounded-full hover:bg-gray-300">Neo</a>
                </div>

                <form action="{{ route('promotions.index') }}" method="GET" class="relative w-full md:w-1/3 mt-4 md:mt-0">
                    <input
                        type="text"
                        name="search"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tìm kiếm khuyến mãi..."
                        value="{{ request('search') }}">
                    <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-7xl mx-auto">

            @forelse ($promotions as $promo)
                {{--
                  === MODIFICATION ===
                  Changed h-[400px] to h-[400px] md:h-[340px]
                  to reduce height on iPad/Tablets
                --}}
                <div
                  class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl flex flex-col h-[400px] md:h-[340px]"
                  data-aos="fade-up"
                  data-aos-delay="{{ ($loop->index % 3) * 100 }}"
                >

                    <a href="{{ route('news.show', $promo) }}" class="block h-3/5 align-bottom">
                        <img src="{{ asset($promo->image_url ?? 'images/default-news.jpg') }}"
                             alt="{{ $promo->title }}"
                             class="w-full h-full object-cover">
                    </a>

                    <div class="p-5 flex flex-col flex-1">
                        <a href="{{ route('news.show', $promo) }}">
                            <h3 class="text-lg font-semibold text-gray-900 hover:text-blue-600 line-clamp-2">
                                {{ $promo->title }}
                            </h3>
                        </a>

                        <div class="mt-auto flex items-center">
                            <a href="{{ route('news.show', $promo) }}" class="inline-block bg-[#3D5A17] bg-opacity-10 text-white    py-1 px-3 rounded-full text-sm font-medium hover:bg-opacity-20 mr-auto">
                                Xem chi tiết
                            </a>
                            <p class="text-sm text-gray-500">
                                {{ $promo->publish_date ? \Carbon\Carbon::parse($promo->publish_date)->format('M d, Y') : '' }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="md:col-span-3 text-center text-gray-500">No promotions found.</p>
            @endforelse

        </div>

        <div class="mt-12">
            {{ $promotions->links('pagination.custom') }}
        </div>

        {{-- Thêm AOS cho khối Liên hệ tư vấn --}}
        <div
          class="w-full bg-gray-100 py-12 px-4 md:px-8 max-w-5xl mx-auto mt-12 rounded-[25px]"
          data-aos="fade-up"
          id="tu-van"
        >
            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-[25px] shadow-xl p-8 lg:p-12">
                    <h3 class="text-3xl font-semibold text-gray-900 mb-8">Liên hệ tư vấn</h3>
                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 p-4 mb-4 rounded-lg shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded-lg shadow-sm">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <p class="text-gray-600 mb-10">
                        Cần tư vấn về xe? Chúng tôi ở đây để hỗ trợ.
                        Hãy để lại email và số điện thoại, chúng tôi sẽ liên hệ ngay trong 24 giờ.
                    </p>

                    <hr class="mb-8 border-gray-200">

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                    @csrf

                    {{-- 1. Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-3">Họ và tên</label>
                        <input type="text" name="name" id="name" required
                            class="w-full bg-gray-100 border-gray-300 rounded-lg p-3 text-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Nguyễn Văn A">
                    </div>

                    {{-- 2. Phone (Required for the Telegram Alert) --}}
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-3">Số điện thoại liên hệ</label>
                        <input type="tel" name="phone" id="phone" required
                            class="w-full bg-gray-100 border-gray-300 rounded-lg p-3 text-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="09xx xxx xxx">
                    </div>

                    {{-- 3. Email (Good to have for database, even if Telegram doesn't show it) --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-3">Địa chỉ email</label>
                        <input type="email" name="email" id="email"
                            class="w-full bg-gray-100 border-gray-300 rounded-lg p-3 text-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="email@example.com">
                    </div>

                    {{-- 4. Message (NEW: Matches $request->message in Controller) --}}
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-3">Lời nhắn</label>
                        <textarea name="message" id="message" rows="3"
                                class="w-full bg-gray-100 border-gray-300 rounded-lg p-3 text-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Nội dung cần tư vấn..."></textarea>
                    </div>

                    {{-- Honeypot (Anti-spam) --}}
                    <div class="hidden">
                        <label>Don't fill this out if you're human:</label>
                        <input type="text" name="website_url_check" value="">
                    </div>

                    {{-- Submit --}}
                    <div>
                        <button type="submit" class="w-auto bg-[#3D5A17] text-white py-2 px-8 rounded-lg font-semibold hover:bg-[#2c4210] transition-colors mt-2">
                            Xác nhận
                        </button>
                    </div>
                </form>
                </div>

                <div class="flex flex-col gap-8">

                    <img src="{{ asset('images/service-form.png') }}"
                         alt="VinFast Service"
                         class="w-full h-auto object-cover rounded-[25px]">
                    <div class="bg-white rounded-[25px] shadow-xl p-8
                                h-[330px]      {{-- Mobile Height --}}
                                md:h-[310px]   {{-- Tablet/Laptop Height --}}
                                lg:h-[295px]   {{-- PC Height --}}">
                        <h4 class="font-semibold text-gray-900 mt-2">VinFast SKYTT 1</h4>
                        <p class="text-sm text-gray-600 mt-2">12B Nguyễn Thị Định, P.Bình Trưng, HCM (Quận 2)</p>
                        <p class="text-sm text-gray-600 mt-2">Hotline: 0862.172.217</p>

                        <h4 class="font-semibold text-gray-900 mt-10">VinFast SKYTT 2</h4>
                        <p class="text-sm text-gray-600 mt-2">300A-B Nguyễn Tất Thành, P.Xóm Chiếu, HCM (Quận 4)</p>
                        <p class="text-sm text-gray-600 mt-2">Hotline: 096.4432.766</p>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
