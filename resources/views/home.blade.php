{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')

 {{-- Hero (fullscreen slider) --}}
<section id="hero" class="relative h-[calc(100vh-56px)] pt-14"> {{-- 56px ~ h-14 của navbar --}}
  @php
    // Có thể thêm nhiều ảnh nữa ở đây nếu muốn
    $slides = [
      asset('images/hero-1.png'),
       asset('images/hero-2.jpg'),
       asset('images/hero-3.png'),
    ];
  @endphp

  <div class="absolute inset-0 overflow-hidden group" data-hero>
    <div class="h-full w-full">
      <div class="flex h-full transition-transform duration-700 ease-out" data-hero-track>
        @foreach($slides as $src)
          <div class="w-full h-full shrink-0">
            <img src="{{ $src }}" alt="Hero" class="w-full h-full object-cover">
          </div>
        @endforeach
      </div>
    </div>

    {{-- Nút Prev --}}
    <button type="button" aria-label="Previous"
      class="absolute left-3 top-1/2 -translate-y-1/2 grid place-items-center rounded-full p-2 bg-white/70 hover:bg-white shadow"
      data-hero-prev>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6"><path fill="currentColor" d="M15.41 7.41L14 6l-6 6l6 6l1.41-1.41L10.83 12z"/></svg>
    </button>

    {{-- Nút Next --}}
    <button type="button" aria-label="Next"
      class="absolute right-3 top-1/2 -translate-y-1/2 grid place-items-center rounded-full p-2 bg-white/70 hover:bg-white shadow"
      data-hero-next>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6"><path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6l6 6l-6 6z"/></svg>
    </button>

    {{-- Dots --}}
    <div class="absolute bottom-4 inset-x-0 flex items-center justify-center gap-2" data-hero-dots></div>
  </div>

</section>

{{-- btn --}}
<section class="py-6 md:py-8"> {{-- block dưới hero --}}
  <div class="max-w-7xl mx-auto px-4 flex justify-center"> {{-- canh giữa --}}
    <x-btn href="#san-pham" label="Tìm hiểu thêm" :arrow="true" />
  </div>
</section>


 {{-- SẢN PHẨM (mỗi xe 1 màn full-screen) --}}
{{-- Nên thêm overflow-x-clip cho body để tránh thanh cuộn ngang --}}
{{-- <body class="overflow-x-clip"> --}}

<section id="san-pham" class="!p-0"> {{-- không bọc container để không bị bó chiều ngang --}}
  {{-- 1) Theon S --}}
  <x-product-feature
    class="bg-white"                                 {{-- nền full-bleed --}}
    image="images/theon-s.png"
    title="Vinfast Theon S"
    price="Giá niêm yết: 56.900.000 VND"
    :stats="[
      ['label'=>'Tốc độ tối đa','value'=>'99 km/h*'],
      ['label'=>'Quãng đường mỗi sạc','value'=>'150 km*'],
      ['label'=>'Cốp','value'=>'24 lít'],
    ]"
    link="#theon-s"
    :reverse="false"                                  {{-- text trái / ảnh phải --}}
  />

  {{-- 2) Evo Lite Neo (đảo layout) --}}
  <x-product-feature
    class="bg-slate-50"
    image="images/evo-lite-neo.png"
    title="Vinfast Evo Lite Neo"
    price="Giá niêm yết: 14.400.000 VND"
    :stats="[
      ['label'=>'Tốc độ tối đa','value'=>'49 km/h*'],
      ['label'=>'Quãng đường mỗi sạc','value'=>'78 km*'],
      ['label'=>'Cốp','value'=>'17 lít'],
    ]"
    link="#evo-lite-neo"
    :reverse="true"                                   {{-- ảnh trái / text phải --}}
  />

  {{-- 3) EvoGrand --}}
  <x-product-feature
    class="bg-white"
    image="images/evogrand.png"
    title="Vinfast EvoGrand"
    price="Giá niêm yết: 18.000.000 VND"
    :stats="[
      ['label'=>'Tốc độ tối đa','value'=>'70 km/h*'],
      ['label'=>'Quãng đường mỗi sạc','value'=>'262 km*'],
      ['label'=>'Cốp','value'=>'35 lít'],
    ]"
    link="#evogrand"
    :reverse="false"
  />
</section>



  {{-- BÁN CHẠY (slider 1-2-3 cột, có prev/next + dots) --}}
{{-- SẢN PHẨM BÁN CHẠY (Carousel 1-2-3 cột, tái sử dụng home.js) --}}
<x-section id="ban-chay" class="bg-white">
  <div class="mb-6">
    <h2 class="text-2xl md:text-3xl font-bold">SẢN PHẨM BÁN CHẠY</h2>
    <p class="mt-1 text-slate-600">Xe máy điện học sinh</p>
  </div>

  {{-- BẮT ĐẦU CAROUSEL --}}
  <div class="relative" data-carousel>

    {{-- 1. Track chứa các item --}}
    <div class="overflow-hidden">
      <div class="flex transition-transform duration-500 ease-out" data-carousel-track>

        {{-- Item 1 --}}
        <div class="flex-shrink-0 w-full px-3" data-carousel-item>
          {{-- 1. Card (chỉ chứa ảnh và text overlay) --}}
          <x-card
            variant="thumb"
            image="images/banChay/1.png"
            title="Xe máy điện VinFast Motio" {{-- title này dùng cho alt text của ảnh --}}

            {{-- Props mới cho text overlay --}}
            :newBadge="true"
            topRightTitle="Motio"
            topRightSubtitle="Xe máy điện"
          />

          {{-- 2. Text bên ngoài card (quay lại như cũ) --}}
          <div class="mt-4 space-y-2">
            <p class="text-slate-600">Xe máy điện VinFast Motio</p>
            <p class="font-extrabold text-lg">12.000.000 VNĐ</p>
          </div>

          {{-- 3. Nút bên ngoài card (quay lại như cũ) --}}
          <div class="mt-4">
            <x-btn href="#motio" label="Xem thêm" :arrow="true" />
          </div>
        </div>

        {{-- Item 2 --}}
        <div class="flex-shrink-0 w-full px-3" data-carousel-item>
          <x-card
            variant="thumb"
            image="images/banChay/2.png"
            title="Xe máy điện VinFast EvoGrand Lite"
             :newBadge="true"
            topRightTitle="EvoGrand"
            topRightSubtitle="Lite"
          />
          <div class="mt-4 space-y-2">
            <p class="text-slate-600">Xe máy điện VinFast EvoGrand Lite</p>
            <p class="font-extrabold text-lg">18.000.000 VNĐ</p>
          </div>
          <div class="mt-4">
            <x-btn href="#evogrand" label="Xem thêm" :arrow="true" />
          </div>
        </div>

        {{-- Item 3 --}}
        <div class="flex-shrink-0 w-full px-3" data-carousel-item>
          <x-card
            variant="thumb"
            image="images/banChay/3.png"
            title="Xe máy điện VinFast Evo Lite Neo"
             :newBadge="true"
            topRightTitle="Evo Lite"
            topRightSubtitle="Neo"
          />
          <div class="mt-4 space-y-2">
            <p class="text-slate-600">Xe máy điện VinFast Evo Lite Neo</p>
            <p class="font-extrabold text-lg">12.000.000 VNĐ</p>
          </div>
          <div class="mt-4">
            <x-btn href="#evo-lite-neo" label="Xem thêm" :arrow="true" />
          </div>
        </div>

        {{-- Item 4 (Copy từ 1) --}}
        <div class="flex-shrink-0 w-full px-3" data-carousel-item>
          <x-card
            variant="thumb"
            image="images/banChay/4.png"
            title="Xe máy điện VinFast Motio (2)"
             :newBadge="true"
            topRightTitle="Motio"
            topRightSubtitle="Xe máy điện"
          />
          <div class="mt-4 space-y-2">
            <p class="text-slate-600">Xe máy điện VinFast Motio</p>
            <p class="font-extrabold text-lg">12.000.000 VNĐ</p>
          </div>
          <div class="mt-4">
            <x-btn href="#motio" label="Xem thêm" :arrow="true" />
          </div>
        </div>

      </div>
    </div>

    {{-- 2. Navigation (Giữ nguyên) --}}
    <div class="mt-8 flex items-center justify-center gap-4">
      <button type="button" aria-label="Previous"
        class="grid place-items-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500"
        data-carousel-prev>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6"><path fill="currentColor" d="M15.41 7.41L14 6l-6 6l6 6l1.41-1.41L10.83 12z"/></svg>
      </button>

      <div class="flex items-center justify-center gap-2" data-carousel-dots>
      </div>

      <button type="button" aria-label="Next"
        class="grid place-items-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500"
        data-carousel-next>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6"><path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6l6 6l-6 6z"/></svg>
      </button>
    </div>

  </div>
  {{-- KẾT THÚC CAROUSEL --}}

</x-section>

{{-- ĐÁNH GIÁ --}}
<x-section id="danh-gia" class="s-danh-gia bg-slate-50">
  <div class="s-danh-gia__header mb-10 ">
    <h2 class="s-danh-gia__title text-3xl font-bold">Đánh giá từ khách hàng</h2>
  </div>

  {{-- ĐÁNH GIÁ KHÁCH HÀNG  (Tái sử dụng home.js) --}}
  <div class="relative" data-carousel>

    {{-- 1. Track chứa các item --}}
    <div class="overflow-hidden">
      <div class="flex transition-transform duration-500 ease-out" data-carousel-track>

        {{-- Item 1 (Sử dụng dữ liệu mẫu từ hình) --}}
        <div class="flex-shrink-0 w-full px-3 pb-12" data-carousel-item>
          <x-testimonial
            class="s-danh-gia__item"
            quote="Managing money used to be overwhelming. Now I feel in control, thanks to their simple tools and expert guidance. Everything's clear, organized, and stress-free."
            author="Guy Hawkins"
            title="Freelance Designer"
            avatar="images/avatars/guy-hawkins.png" {{-- BẠN CẦN THÊM ẢNH NÀY --}}
          />
        </div>

        {{-- Item 2 (Dữ liệu cũ) --}}
        <div class="flex-shrink-0 w-full px-3 pb-12" data-carousel-item>
          <x-testimonial
            class="s-danh-gia__item"
            quote="Tư vấn nhiệt tình, giao xe nhanh."
            author="Anh Minh"
            title="Khách hàng" {{-- Thêm title --}}
            avatar="images/avatars/anh-minh.png" {{-- BẠN CẦN THÊM ẢNH NÀY --}}
          />
        </div>

        {{-- Item 3 (Dữ liệu cũ) --}}
        <div class="flex-shrink-0 w-full px-3 pb-12" data-carousel-item>
          <x-testimonial
            class="s-danh-gia__item"
            quote="Giá tốt, hậu mãi chu đáo."
            author="Chị Hạnh"
            title="Doanh nghiệp" {{-- Thêm title --}}
            avatar="images/avatars/chi-hanh.png" {{-- BẠN CẦN THÊM ẢNH NÀY --}}
          />
        </div>

        {{-- Item 4 (Dữ liệu cũ) --}}
        <div class="flex-shrink-0 w-full px-3 pb-12" data-carousel-item>
          <x-testimonial
            class="s-danh-gia__item"
            quote="Trải nghiệm lái thử tuyệt vời."
            author="Bạn Khôi"
            title="Học sinh" {{-- Thêm title --}}
            avatar="images/avatars/ban-khoi.png" {{-- BẠN CẦN THÊM ẢNH NÀY --}}
          />
        </div>

      </div>
    </div>

    {{-- 2. Navigation (Dots) --}}
    {{--
      Chúng ta không cần nút Prev/Next cho design này,
      nhưng vẫn thêm thẻ 'hidden' để JS không bị lỗi
    --}}
    <button type="button" data-carousel-prev class="hidden"></button>
    <button type="button" data-carousel-next class="hidden"></button>

    {{-- Dots container (JS sẽ tự động điền vào đây) --}}
    {{-- Thêm 'mt-8' để tạo khoảng cách từ slider đến dots --}}
    <div class="mt-8 flex items-center justify-center gap-2" data-carousel-dots>
    </div>

  </div>
  {{-- KẾT THÚC CAROUSEL --}}

</x-section>



  {{-- CỬA HÀNG --}}
  {{-- 1. TIÊU ĐỀ (ĐẶT TRONG X-SECTION ĐỂ CĂN HÀNG) --}}

<x-section class="s-cua-hang-header bg-white pt-16 md:pt-24 pb-10">
  <h2 class="text-3xl font-bold text-skytt-text">Hệ thống cửa hàng</h2>
</x-section>

{{-- 2. NỘI DUNG (ẢNH NỀN FULL-WIDTH) --}}

<section id="cua-hang" class="bg-white relative z-10">
  {{-- Container cho ảnh nền --}}
  <div
    class="relative bg-cover bg-center py-32 md:py-56"
    style="background-image: url('{{ asset('images/address-bg.png') }}')"
  >
    {{-- Lớp phủ mờ --}}
    <div class="absolute inset-0 bg-black/20"></div>

    {{-- Card "Glassmorphism" --}}
    <div class="relative max-w-5xl mx-auto grid md:grid-cols-2 rounded-3xl overflow-hidden shadow-2xl
                bg-white/60 backdrop-blur-lg border border-white/20
                max-md:mx-4">

      {{-- CỘT BÊN TRÁI (THÔNG TIN) --}}
      <div class="p-8 md:p-10 text-skytt-text space-y-6">

        {{-- Chi nhánh 1 --}}
        <div class="space-y-1">
          <h3 class="font-bold">VinFast SKYTT (CN1)</h3>
          <a
            href="https://www.google.com/maps/place/12B+Nguy%E1%BB%85n+Th%E1%BB%8B+%C4%90%E1%BB%8Bnh,+B%C3%ACnh+Tr%C6%B0ng+T%C3%A2y,+Qu%E1%BA%ADn+2,+Th%C3%A0nh+ph%E1%BB%91+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam"
            target="_blank" rel="noopener"
            class="block hover:text-skytt-btn transition-colors"
          >
            12B Nguyễn Thị Định, Phường Bình Trưng,TP.HCM (Quận 2)
          </a>
          <p>Hotline: 0862 172 217</p>
        </div>

        {{-- Chi nhánh 2 --}}
        <div class="space-y-1">
          <h3 class="font-bold">VinFast SKYTT (CN2)</h3>
          <a
            href="https://www.google.com/maps/place/300a+Nguy%E1%BB%85n+T%E1%BA%A5t+Th%C3%A0nh,+Ph%C6%B0%E1%BB%9Dng+13,+Qu%E1%BA%ADn+4,+Th%C3%A0nh+ph%E1%BB%91+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam"
            target="_blank" rel="noopener"
            class="block hover:text-skytt-btn transition-colors"
          >
            300A-B Nguyễn Tất Thành, Phường Xóm Chiếu,TP.HCM (Quận 4)
          </a>
          <p>Hotline: 096 4432766</p>
        </div>

        {{-- Ngăn cách --}}
        <hr class="border-slate-400/50">

        {{-- Email --}}
        <div>
          <a href="mailto:skytt.vinfast@gmail.com" class="hover:text-skytt-btn transition-colors">
            skytt.vinfast@gmail.com
          </a>
        </div>

        {{-- Social Icons (Sử dụng <img>) --}}
        <div class="flex items-center gap-4">
          {{-- Facebook --}}
          <a href="#" target="_blank" class="hover:opacity-80 transition-opacity">
            <img
              src="{{ asset('images/icons/facebook.png') }}"
              alt="Facebook"
              class="w-6 h-6"
            >
          </a>
          {{-- Youtube --}}
          <a href="#" target="_blank" class="hover:opacity-80 transition-opacity">
            <img
              src="{{ asset('images/icons/instagram.png') }}"
              alt="Instagram"
              class="w-6 h-6"
            >
          </a>
          {{-- TikTok --}}
          <a href="#" target="_blank" class="hover:opacity-80 transition-opacity">
            <img
              src="{{ asset('images/icons/tiktok.png') }}"
              alt="TikTok"
              class="w-6 h-6"
            >
          </a>
        </div>
      </div>

      {{-- CỘT BÊN PHẢI (MAP) --}}

      {{-- 1. Thẻ 'div' cha VẪN GIỮ NGUYÊN các class --}}
      <div class="block overflow-hidden rounded-b-3xl md:rounded-b-none md:rounded-r-3xl isolation-isolate">

        {{-- 2. THÊM CÁC CLASS BO TRÒN VÀO DÒNG <iframe> DƯỚI ĐÂY --}}
        <iframe
          src="https://www.google.com/maps/d/embed?mid=17qwE_yFM3yk0tl3i2qrRUgNsEMQp8ok&ehbc=2E312F"
          class="w-full h-full min-h-[300px] rounded-b-3xl md:rounded-b-none md:rounded-r-3xl"
          style="border:0;"
          allowfullscreen=""
          loading="lazy">
        </iframe>
      </div>

    </div>
  </div>
</section>

    {{-- GIỚI THIỆU --}}
{{--
  THAY THẾ BẰNG LAYOUT 2 CỘT MỚI
  - Giữ 'relative z-5' để sửa lỗi footer
  - Đổi 'bg-slate-50' thành 'bg-white'
--}}
<x-section id="gioi-thieu" class="s-gioi-thieu bg-white relative z-5  py-30 md:py-50">

 {{-- === BẮT ĐẦU SỬA LỖI === --}}
  {{-- 1. Thêm khối tiêu đề riêng (giống hệt section "Đánh giá") --}}
  <div class="s-gioi-thieu__header mb-10">
    <h2 class="s-gioi-thieu__title text-3xl font-bold text-skytt-text">
      Công ty VinFast SKYTT
    </h2>
  </div>
  {{-- === KẾT THÚC SỬA LỖI === --}}

  {{-- Container 2 cột --}}
  <div class="grid md:grid-cols-2 gap-8 md:gap-16 items-start">

    {{-- CỘT BÊN TRÁI (TEXT) --}}
    <div>

      {{-- 3. XÓA 'mt-4' ở <p> bên dưới vì đã có 'mb-10' ở trên --}}
      <p class="text-slate-600">
        VinFast SKYTT là đại diện ủy quyền chính thức của VinFast, cam kết mang đến trải nghiệm xe điện thông minh, hiện đại và đồng hành cùng bạn trong mọi hành trình. Với hệ thống phục vụ chuyên nghiệp, từ lái thử, tư vấn, giao xe đến hậu mãi – mọi dịch vụ đều nhanh chóng, trong sáng và tận tâm.
      </p>
      <div class="mt-8">
        <x-btn href="#" label="Xem thêm" :arrow="true" />
      </div>
    </div>

    {{-- CỘT BÊN PHẢI (IMAGE) --}}
    <div class="md:-mt-[4.75rem]">
      <img
        src="{{ asset('images/about-image.png') }}"
        alt="Công ty VinFast SKYTT"
        class="w-full rounded-3xl object-cover shadow-lg"
      >
    </div>

  </div>
</x-section>

@endsection

@push('scripts')
  @vite('resources/js/home.js')
@endpush
