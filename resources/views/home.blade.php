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
      // asset('images/hero-2.png'),
      // asset('images/hero-3.png'),
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
    <div class="s-danh-gia__header mb-10 text-center">
      <h2 class="s-danh-gia__title text-3xl font-bold">Đánh giá từ khách hàng</h2>
    </div>
    <div class="s-danh-gia__grid grid md:grid-cols-3 gap-6">
      <x-testimonial class="s-danh-gia__item" quote="Tư vấn nhiệt tình, giao xe nhanh." author="Anh Minh" />
      <x-testimonial class="s-danh-gia__item" quote="Giá tốt, hậu mãi chu đáo." author="Chị Hạnh" />
      <x-testimonial class="s-danh-gia__item" quote="Trải nghiệm lái thử tuyệt vời." author="Bạn Khôi" />
    </div>
  </x-section>

  {{-- CỬA HÀNG --}}
  <x-section id="cua-hang" class="s-cua-hang bg-white">
    <div class="s-cua-hang__header mb-10 text-center">
      <h2 class="s-cua-hang__title text-3xl font-bold">Hệ thống cửa hàng</h2>
    </div>
    <div class="s-cua-hang__grid grid md:grid-cols-2 gap-6">
      <x-store class="s-cua-hang__item"
        name="VinFast SKYTT (CN1)"
        address="12B Nguyễn Thị Định, Phường Bình Trưng, TP.HCM (Q2)"
        hotline="0862 172 217"
      />
      <x-store class="s-cua-hang__item"
        name="VinFast SKYTT (CN2)"
        address="300A-B Nguyễn Tất Thành, Phường Xóm Chiếu, TP.HCM (Q4)"
        hotline="096 443 2766"
      />
    </div>
  </x-section>

    {{-- GIỚI THIỆU --}}
  <x-section id="gioi-thieu" class="s-gioi-thieu bg-slate-50">
    <div class="s-gioi-thieu__header mb-10 text-center">
      <h2 class="s-gioi-thieu__title text-3xl font-bold">Giới thiệu</h2>
      <p class="s-gioi-thieu__subtitle mt-2 text-slate-600 text-sm fw-semibold">Công ty VinFast SKYTT</p>
    </div>
    <p class="s-gioi-thieu__text max-w-3xl mx-auto text-center text-slate-600">
      VinFast SKYTT là đại diện ủy quyền chính thức của VinFast, cam kết mang đến trải nghiệm xe điện thông minh, hiện đại
      và đồng hành cùng bạn trong mọi hành trình. Với hệ thống phục vụ chuyên nghiệp, từ lái thử, tư vấn, giao xe đến hậu mãi –
      mọi dịch vụ đều nhanh chóng, trong sáng và tận tâm.
    </p>
  </x-section>

@endsection

@push('scripts')
  @vite('resources/js/home.js')
@endpush