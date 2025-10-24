{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- HERO GIỚI THIỆU (full-screen, text trái – ảnh phải) --}}
<section id="about-hero" class="relative h-[calc(100vh-56px)] pt-14 bg-slate-50">
  <div class="h-full w-screen relative left-1/2 -translate-x-1/2">
    <div class="mx-auto max-w-[1500px] h-full px-6 lg:px-10 grid lg:grid-cols-2 gap-6">

      {{-- TEXT LEFT (đẩy lên trên) --}}
      <div class="self-start pt-10 lg:pt-20 xl:pt-36 space-y-4 lg:pl-6 xl:pl-10">
        <p>Giới thiệu về</p>
        <h1 class="font-lexend text-3xl md:text-5xl xl:text-6xl font-semibold leading-tight">
          Công ty VinFast SKYTT
        </h1>
        <p class="text-slate-700">
          VinFast SKYTT – Đồng hành cùng bạn trên mọi hành trình
        </p>
        <p class="max-w-xl text-slate-600">
          VinFast SKYTT là đại diện ủy quyền chính thức của VinFast, cam kết mang đến trải nghiệm xe điện thông minh, hiện đại
          và đồng hành cùng bạn trong mọi hành trình. Với hệ thống phục vụ chuyên nghiệp, từ lái thử, tư vấn, giao xe đến hậu mãi –
          mọi dịch vụ đều nhanh chóng, trong sáng và tận tâm.
        </p>
      </div>

      {{-- IMAGE RIGHT (ngang với tiêu đề, phóng to) --}}
      <div class="relative self-start pt-10 lg:pt-20 xl:pt-24 flex justify-end pr-2 lg:pr-6 overflow-visible">
        <img src="{{ asset('images/about/hero.png') }}" alt="VinFast About Hero"
    class="object-contain max-h-[85vh] w-[95%] lg:w-[95%]
       lg:scale-[1.55] xl:scale-[1.65]
       lg:translate-x-12 xl:translate-x-20   {{-- đẩy sang phải nhiều hơn --}}
       lg:mr-[-40px] xl:mr-[-80px]"

      </div>

    </div>
  </div>
</section>



  {{-- DẤU CHÂN TOÀN CẦU --}}
<section id="global-footprint">

  {{-- Header (nền trắng, canh giữa) --}}
  <div class="bg-white">
    <div class="max-w-[900px] mx-auto px-6 py-12 text-center">
      <h2 class="font-lexend font-semibold text-3xl md:text-4xl leading-tight">Dấu chân toàn cầu</h2>
      <p class="mt-3 text-slate-600 tracking-[-0.03em]">
        VinFast đã nhanh chóng thiết lập sự hiện diện toàn cầu, thu hút những tài năng tốt nhất từ khắp nơi
        trên thế giới và hợp tác với một số thương hiệu mang tính biểu tượng nhất trong ngành.
      </p>
    </div>
  </div>

  {{-- Vùng nội dung (nền xám nhạt) --}}
  <div class="bg-slate-50">
    <div class="w-screen relative left-1/2 -translate-x-1/2">
      <div class="mx-auto max-w-[1200px] grid lg:grid-cols-2 items-center gap-12 px-6 py-14">

       {{-- LEFT: image card (ôm sát, không màu nền, bo góc 29, đổ bóng như mẫu) --}}
<div class="w-full max-w-[620px] mx-auto">                        
       
    <img
      src="{{ asset('images/about/values.png') }}"
      alt="Giá trị"
      class="block w-full h-auto select-none pointer-events-none" 
      loading="lazy" decoding="async"
    >
</div>
        {{-- RIGHT: content --}}
        <div class="space-y-6">
          <span class="inline-flex px-4 py-1 rounded-full bg-[var(--skytt-btn)]/15 text-[var(--skytt-btn)] text-sm">
            Values
          </span>

          <h3 class="font-lexend text-2xl md:text-3xl leading-snug">
            Innovative marketing solutions backed by a decade of strategic experience.
          </h3>

          <div class="grid grid-cols-3 gap-8">
            <div>
              <div class="font-lexend text-4xl md:text-5xl">95%</div>
              <p class="mt-2 text-sm text-slate-600 tracking-[-0.03em]">
                Complete customer<br> satisfaction
              </p>
            </div>
            <div>
              <div class="font-lexend text-4xl md:text-5xl">10+</div>
              <p class="mt-2 text-sm text-slate-600 tracking-[-0.03em]">
                Innovation and<br> valuable insight
              </p>
            </div>
            <div>
              <div class="font-lexend text-4xl md:text-5xl">50M</div>
              <p class="mt-2 text-sm text-slate-600 tracking-[-0.03em]">
                Users worldwide,<br> providing them with
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>


  {{-- SỨ MỆNH (so le ảnh / card component) --}}
  <x-section id="mission" class="bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-2xl md:text-3xl font-semibold  text-center mb-8">Sứ mệnh của VinFast SKYTT</h2>

      {{-- Row 1: Ảnh trái / Card phải --}}
      <div class="grid md:grid-cols-2 gap-6 items-center mb-6">
        <div class="rounded-2xl bg-slate-50 p-4">
          <img src="{{ asset('images/mission-1.jpg') }}" class="w-full h-72 object-cover rounded-xl" alt="mission-1">
        </div>
        <x-mission-card
          icon="bolt"
          title="Lựa chọn bền vững"
          desc="Dễ dùng, tiết kiệm, bảo hiểm – bảo dưỡng đầy đủ; hậu mãi tận tâm giúp bạn an tâm dài lâu." />
      </div>

      {{-- Row 2: Card trái / Ảnh phải --}}
      <div class="grid md:grid-cols-2 gap-6 items-center mb-6">
        <x-mission-card
          icon="users"
          bg="bg-slate-50"
          class="order-2 md:order-1"
          title="Đa dạng cho mọi nhu cầu"
          desc="Từ dòng học sinh đến cao cấp – luôn có giải pháp phù hợp về tính năng và chi phí." />
        <div class="rounded-2xl bg-slate-50 p-4 order-1 md:order-2">
          <img src="{{ asset('images/mission-2.jpg') }}" class="w-full h-72 object-cover rounded-xl" alt="mission-2">
        </div>
      </div>

      {{-- Row 3: Ảnh trái / Card phải --}}
      <div class="grid md:grid-cols-2 gap-6 items-center">
        <div class="rounded-2xl bg-slate-50 p-4">
          <img src="{{ asset('images/mission-3.jpg') }}" class="w-full h-72 object-cover rounded-xl" alt="mission-3">
        </div>
        <x-mission-card
          icon="headset"
          title="Hỗ trợ tận tâm"
          desc="Bảo trì – hậu mãi nhanh chóng; đồng hành cùng bạn trong suốt quá trình sử dụng." />
      </div>
    </div>
  </x-section>

  {{-- TRẢI NGHIỆM LIỀN MẠCH --}}
  <x-section id="exp" class="bg-white">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-6 items-center">
      <div class="rounded-2xl overflow-hidden">
        <img src="{{ asset('images/experience.jpg') }}" alt="Trải nghiệm" class="w-full h-80 object-cover">
      </div>
      <div class="rounded-2xl bg-slate-100 p-8">
        <h3 class="text-xl font-semibold">Trải nghiệm liền mạch</h3>
        <p class="mt-2 text-slate-600">
          Quy trình lái thử – tư vấn – giao xe – bảo trì khép kín, nhanh chóng và minh bạch.
        </p>
      </div>
    </div>
  </x-section>

  {{-- VỀ NHÂN VIÊN (tĩnh – có thể thay bằng slider sau) --}}
  <x-section id="team" class="bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-2xl md:text-3xl font-semibold text-center mb-8">Về nhân viên</h2>

      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ([
          ['images/staff-1.jpg','Nguyễn Tuấn Khoa','Chuyên viên tư vấn','0862 172 217','12B Nguyễn Thị Định, Thủ Đức'],
          ['images/staff-2.jpg','Nguyễn Tuấn Khoa','Chăm sóc KH','0964 432 766','300A-B Nguyễn Tất Thành, Q4'],
          ['images/staff-3.jpg','Nguyễn Tuấn Khoa','Kỹ thuật','0862 172 217','12B Nguyễn Thị Định, Thủ Đức'],
          ['images/staff-4.jpg','Nguyễn Tuấn Khoa','Lái thử trải nghiệm','0964 432 766','300A-B Nguyễn Tất Thành, Q4'],
        ] as $s)
          <article class="rounded-2xl bg-white border border-slate-200 shadow-sm p-4">
            <div class="flex items-center gap-3">
              <img src="{{ asset($s[0]) }}" class="w-12 h-12 rounded-full object-cover" alt="{{ $s[1] }}">
              <div>
                <div class="text-xs text-slate-500">{{ $s[2] }}</div>
                <div class="font-semibold">{{ $s[1] }}</div>
              </div>
            </div>
            <div class="mt-3 text-sm">
              <span class="text-slate-500">Hotline:</span>
              <a href="tel:{{ preg_replace('/\s+/', '', $s[3]) }}" class="font-semibold hover:underline">{{ $s[3] }}</a>
            </div>
            <div class="mt-1 text-sm text-slate-600">{{ $s[4] }}</div>
          </article>
        @endforeach
      </div>
    </div>
  </x-section>

@endsection
