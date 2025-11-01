{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- HERO GIỚI THIỆU (full-screen, text trái – ảnh phải) --}}
<section id="about-hero" class="relative h-[calc(100vh-56px)] pt-14 bg-slate-50" >
  <div class="h-full w-screen relative left-1/2 -translate-x-1/2">
    <div class="mx-auto max-w-[1500px] h-full px-6 lg:px-10 grid lg:grid-cols-2 gap-6">

      {{-- TEXT LEFT (đẩy lên trên) --}}
      <div class="self-start pt-10 lg:pt-20 xl:pt-36 space-y-4 lg:pl-6 xl:pl-10" data-aos="fade-right">
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
      <div class="relative self-start pt-10 lg:pt-20 xl:pt-24 flex justify-end pr-2 lg:pr-6 overflow-visible" data-aos="fade-left">
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
<section id="global-footprint" >

  {{-- Header (nền trắng, canh giữa) --}}
  <div class="bg-white" data-aos="fade-up">
    <div class="max-w-[900px] mx-auto px-6 py-12 text-center">
      <h2 class="font-lexend font-semibold text-3xl md:text-4xl leading-tight">Dấu chân toàn cầu</h2>
      <p class="mt-3 text-slate-600 tracking-[-0.03em]">
        VinFast đã nhanh chóng thiết lập sự hiện diện toàn cầu, thu hút những tài năng tốt nhất từ khắp nơi
        trên thế giới và hợp tác với một số thương hiệu mang tính biểu tượng nhất trong ngành.
      </p>
    </div>
  </div>

  {{-- Vùng nội dung (nền xám nhạt) --}}
  <div class="bg-slate-50" data-aos="fade-up">
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


 {{-- MISSION — Hiệu ứng xếp chồng (Sticky Stacking) với FADE --}}
<x-section id="su-menh" class="bg-white !px-0">

  {{--
    1. Khai báo Alpine 'x-data'.
       'activeCard' sẽ lưu ID của card đang ở trên cùng (mặc định là 1).
  --}}
  <div
    x-data="{ activeCard: 1 }"
    class="max-w-[1200px] mx-auto px-4 md:px-6 pb-[25vh]" {{-- Giảm padding-bottom như yêu cầu trước --}}
  >

    {{--
      2. Thêm 'x-intersect' để đặt activeCard = 1.
      3. Thêm ':class' để kiểm tra: nếu activeCard > 1 (ví dụ: Card 2 đang active),
         thì card này (Card 1) sẽ nhận class 'opacity-50'.
      4. Thêm 'transition-opacity' để tạo hiệu ứng mờ "nhẹ".
    --}}
    <x-mission-card
      x-intersect:enter.half="activeCard = 1"
      :class="{ 'opacity-50': activeCard > 1 }"
      class="sticky top-16 z-10 transition-opacity duration-300 ease-in-out"
      tone="gray"
      icon="images/about/icon-1.png"
      title="Lựa chọn bền vững"
      desc="Gồm hỗ trợ đăng ký biển số, bảo hiểm, bảo dưỡng và hậu mãi – tạo sự an tâm bền lâu cho khách hàng."
      image="images/about/mission-1.png"
      height="h-[380px] md:h-[440px] lg:h-[500px]"
    />

    {{-- Card 2 --}}
    <x-mission-card
      x-intersect:enter.half="activeCard = 2"
      :class="{ 'opacity-50': activeCard > 2 }"
      class="sticky top-20 z-20 transition-opacity duration-300 ease-in-out"
      tone="green"
      :reverse="true"
      icon="images/about/icon-2.png"
      title="Dịch vụ tận tâm"
      desc="Tư vấn rõ ràng, giao xe nhanh, bảo hành minh bạch – trải nghiệm đồng nhất tại mọi cơ sở."
      image="images/about/mission-2.png"
      height="h-[380px] md:h-[440px] lg:h-[500px]"
    />

    {{-- Card 3 --}}
    <x-mission-card
      x-intersect:enter.half="activeCard = 3"
      :class="{ 'opacity-50': activeCard > 3 }"
      class="sticky top-24 z-30 transition-opacity duration-300 ease-in-out"
      tone="gray"
      icon="images/about/icon-3.png"
      title="Đa dạng cho mọi nhu cầu"
      desc="Từ xe máy điện nhỏ gọn cho thành thị đến mẫu cao cấp – VinFast SKYTT luôn có giải pháp phù hợp."
      image="images/about/mission-3.png"
      height="h-[380px] md:h-[440px] lg:h-[500px]"
    />

    {{-- Card 4 (Không cần :class vì nó là card cuối cùng) --}}
    <x-mission-card
      x-intersect:enter.half="activeCard = 4"
      class="sticky top-28 z-40 transition-opacity duration-300 ease-in-out"
      tone="green"
      :reverse="true"
      icon="images/about/icon-4.png"
      title="Trải nghiệm liền mạch"
      desc="Từ tìm hiểu sản phẩm, lái thử đến giao xe và hậu mãi – mọi bước diễn ra mạch lạc, thống nhất."
      image="images/about/mission-4.png"
      height="h-[380px] md:h-[440px] lg:h-[500px]"
    />

  </div>
</x-section>



  {{-- VỀ NHÂN VIÊN (tĩnh – có thể thay bằng slider sau) --}}
  <section class="py-10" data-aos="fade-up">
  <h2 class="font-lexend text-2xl md:text-3xl text-center mb-8">Về nhân viên</h2>

  <div class="max-w-[1100px] mx-auto grid sm:grid-cols-2 lg:grid-cols-3 gap-6 place-items-center">
    <x-staff-card
      name="Nguyễn Tuấn Khoa"
      avatar="images/about/staff-1.png"
      branch="Cửa hàng trưởng CN1 (Quận 2)"
      address="Chi nhánh: 128 Nguyễn Thị Định, P. Bình Trưng, TP. Thủ Đức"
      hotline="0968 172 217"
      experience="Kinh nghiệm: 7+ năm bán lẻ xe/ đồ điện tử, 3 năm quản lý cửa hàng"
      :cta="['label' => 'Liên hệ ngay', 'href' => '#']"
    />

    <x-staff-card
      name="Nguyễn Tuấn Khoa"
      avatar="images/about/staff-2.png"
      branch="Cửa hàng trưởng CN1 (Quận 2)"
      address="Chi nhánh: 128 Nguyễn Thị Định, P. Bình Trưng, TP. Thủ Đức"
      hotline="0968 172 217"
      experience="Kinh nghiệm: 7+ năm bán lẻ xe/ đồ điện tử, 3 năm quản lý cửa hàng"
      :cta="['label' => 'Liên hệ ngay', 'href' => '#']"
    />

    <x-staff-card
      name="Nguyễn Tuấn Khoa"
      avatar="images/about/staff-3.png"
      branch="Cửa hàng trưởng CN1 (Quận 2)"
      address="Chi nhánh: 128 Nguyễn Thị Định, P. Bình Trưng, TP. Thủ Đức"
      hotline="0968 172 217"
      experience="Kinh nghiệm: 7+ năm bán lẻ xe/ đồ điện tử, 3 năm quản lý cửa hàng"
      :cta="['label' => 'Liên hệ ngay', 'href' => '#']"
    />


  </div>

  {{-- optional tiny dots/pagination… --}}
  <div class="mt-6 flex items-center justify-center gap-2">
    <span class="w-2.5 h-2.5 rounded-full bg-[var(--skytt-btn)]/25"></span>
    <span class="w-2.5 h-2.5 rounded-full bg-[var(--skytt-btn)]/25"></span>
    <span class="w-2.5 h-2.5 rounded-full bg-[var(--skytt-btn)]/25"></span>
  </div>
</section>


@endsection
