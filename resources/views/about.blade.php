{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('content')
{{-- ===================================================================== --}}
{{-- 1. HERO GIỚI THIỆU                                                    --}}
{{-- ===================================================================== --}}
{{--
    HEIGHT LOGIC:
    - min-h-[1000px]: Mobile (Increased to prevent image cut-off)
    - md:h-[600px]: iPad/Tablet (Fixed 600px)
    - xl:h-[calc(100vh-56px)]: Laptop/PC (Full screen)
--}}
<section id="about-hero" class="relative min-h-[850px] md:min-h-0 md:h-[600px] xl:h-[calc(100vh-56px)] pt-14 bg-slate-50 overflow-hidden">
  <div class="h-full w-screen relative left-1/2 -translate-x-1/2">
    <div class="mx-auto max-w-[1500px] h-full px-6 lg:px-10 grid lg:grid-cols-2 gap-6">

      <div class="self-start md:pt-10 lg:pt-24 xl:pt-36 space-y-4 lg:pl-6 xl:pl-10 relative z-10" data-aos="fade-right">
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

      {{-- IMAGE RIGHT --}}
      <div class="relative self-start pt-10 lg:pt-20 xl:pt-24 flex justify-end pr-2 lg:pr-6 overflow-visible" data-aos="fade-left">
        <img src="{{ asset('images/about/hero.png') }}" alt="VinFast About Hero"
             class="object-contain w-[95%]
                    {{-- Mobile: Scale 1.5 and push down (translate-y-24) --}}
                    scale-[1.5] origin-top translate-y-24
                    {{-- Tablet: Reset scale and position --}}
                    md:scale-100 md:translate-y-0 md:origin-center
                    lg:w-[95%]
                    lg:scale-[1.4] xl:scale-[1.65]
                    lg:translate-x-12 xl:translate-x-20
                    lg:mr-[-40px] xl:mr-[-80px]"
        >
      </div>

    </div>
  </div>
</section>

{{-- ===================================================================== --}}
{{-- 2. DẤU CHÂN TOÀN CẦU (Unchanged)                                      --}}
{{-- ===================================================================== --}}
<section id="global-footprint" >

  {{-- Header --}}
  <div class="bg-white" data-aos="fade-up">
    <div class="max-w-[900px] mx-auto px-6 py-12 text-center">
      <h2 class="font-lexend font-semibold text-3xl md:text-4xl leading-tight">Dấu chân toàn cầu</h2>
      <p class="mt-3 text-slate-600 tracking-[-0.03em]">
        VinFast đã nhanh chóng thiết lập sự hiện diện toàn cầu, thu hút những tài năng tốt nhất từ khắp nơi
        trên thế giới và hợp tác với một số thương hiệu mang tính biểu tượng nhất trong ngành.
      </p>
    </div>
  </div>

  {{-- Content Area --}}
  <div class="bg-slate-50" data-aos="fade-up">
    <div class="w-screen relative left-1/2 -translate-x-1/2">
      <div class="mx-auto max-w-[1200px] grid lg:grid-cols-2 items-center gap-12 px-6 py-14">

        {{-- LEFT: image card --}}
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

{{-- ===================================================================== --}}
{{-- 3. MISSION (Unchanged)                                                --}}
{{-- ===================================================================== --}}
<x-section id="su-menh" class="bg-white !px-0" data-aos="fade-up" >
    <div
        x-data="{ activeCard: 1 }"
        class="max-w-[1200px] mx-auto px-4 md:px-6 pb-[5vh]"
    >
        <x-mission-card
            x-intersect:enter.half="activeCard = 1"
            :class="{ 'opacity-50': activeCard > 1 }"
            class="sticky top-50 z-10 transition-opacity duration-300 ease-in-out"
            tone="gray"
            icon="images/about/icon-1.png"
            title="Lựa chọn bền vững"
            desc="Gồm hỗ trợ đăng ký biển số, bảo hiểm, bảo dưỡng và hậu mãi – tạo sự an tâm bền lâu cho khách hàng."
            image="images/about/mission-1.png"
            height="h-[380px] md:h-[440px] lg:h-[500px]"
        />

        <x-mission-card
            x-intersect:enter.half="activeCard = 2"
            :class="{ 'opacity-50': activeCard > 2 }"
            class="sticky top-50 z-20 transition-opacity duration-300 ease-in-out"
            tone="green"
            :reverse="true"
            icon="images/about/icon-2.png"
            title="Dịch vụ tận tâm"
            desc="Tư vấn rõ ràng, giao xe nhanh, bảo hành minh bạch – trải nghiệm đồng nhất tại mọi cơ sở."
            image="images/about/mission-2.png"
            height="h-[380px] md:h-[440px] lg:h-[500px]"
        />

        <x-mission-card
            x-intersect:enter.half="activeCard = 3"
            :class="{ 'opacity-50': activeCard > 3 }"
            class="sticky top-50 z-30 transition-opacity duration-300 ease-in-out"
            tone="gray"
            icon="images/about/icon-3.png"
            title="Đa dạng cho mọi nhu cầu"
            desc="Từ xe máy điện nhỏ gọn cho thành thị đến mẫu cao cấp – VinFast SKYTT luôn có giải pháp phù hợp."
            image="images/about/mission-3.png"
            height="h-[380px] md:h-[440px] lg:h-[500px]"
        />

        <x-mission-card
            x-intersect:enter.half="activeCard = 4"
            class="sticky top-50 z-40 transition-opacity duration-300 ease-in-out"
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

{{-- ===================================================================== --}}
{{-- 4. VỀ NHÂN VIÊN (Unchanged)                                           --}}
{{-- ===================================================================== --}}
<section class="py-10" data-aos="fade-up">
    <h2 class="font-lexend text-2xl md:text-3xl text-center mb-8">Về nhân viên</h2>

    {{-- BẮT ĐẦU CAROUSEL --}}
    <div class="relative max-w-[1100px] mx-auto" data-carousel>

        {{-- 1. Track chứa các item --}}
        <div class="overflow-hidden">
            <div class="flex transition-transform duration-500 ease-out" data-carousel-track>

                {{-- Item 1 --}}
                <div class="flex-shrink-0 w-full px-3 flex justify-center" data-carousel-item>
                    <x-staff-card
                        name="Nguyễn Tuấn Khoa"
                        avatar="images/about/staff-1.png"
                        branch="Cửa hàng trưởng CN1 (Quận 2)"
                        address="Chi nhánh: 128 Nguyễn Thị Định, P. Bình Trưng, TP. Thủ Đức"
                        hotline="0968 172 217"
                        experience="Kinh nghiệm: 7+ năm bán lẻ xe/ đồ điện tử, 3 năm quản lý cửa hàng"
                        :cta="['label' => 'Liên hệ ngay', 'href' => '#']"
                    />
                </div>

                {{-- Item 2 --}}
                <div class="flex-shrink-0 w-full px-3 flex justify-center" data-carousel-item>
                    <x-staff-card
                        name="Nguyễn Tuấn Khoa"
                        avatar="images/about/staff-2.png"
                        branch="Cửa hàng trưởng CN1 (Quận 2)"
                        address="Chi nhánh: 128 Nguyễn Thị Định, P. Bình Trưng, TP. Thủ Đức"
                        hotline="0968 172 217"
                        experience="Kinh nghiệm: 7+ năm bán lẻ xe/ đồ điện tử, 3 năm quản lý cửa hàng"
                        :cta="['label' => 'Liên hệ ngay', 'href' => '#']"
                    />
                </div>

                {{-- Item 3 --}}
                <div class="flex-shrink-0 w-full px-3 flex justify-center" data-carousel-item>
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

                {{-- Item 4 --}}
                <div class="flex-shrink-0 w-full px-3 flex justify-center" data-carousel-item>
                    <x-staff-card
                        name="Nguyễn Tuấn Khoa"
                        avatar="images/about/staff-1.png"
                        branch="Cửa hàng trưởng CN1 (Quận 2)"
                        address="Chi nhánh: 128 Nguyễn Thị Định, P. Bình Trưng, TP. Thủ Đức"
                        hotline="0968 172 217"
                        experience="Kinh nghiệm: 7+ năm bán lẻ xe/ đồ điện tử, 3 năm quản lý cửa hàng"
                        :cta="['label' => 'Liên hệ ngay', 'href' => '#']"
                    />
                </div>

                {{-- Item 5 --}}
                <div class="flex-shrink-0 w-full px-3 flex justify-center" data-carousel-item>
                    <x-staff-card
                        name="Nguyễn Tuấn Khoa"
                        avatar="images/about/staff-2.png"
                        branch="Cửa hàng trưởng CN1 (Quận 2)"
                        address="Chi nhánh: 128 Nguyễn Thị Định, P. Bình Trưng, TP. Thủ Đức"
                        hotline="0968 172 217"
                        experience="Kinh nghiệm: 7+ năm bán lẻ xe/ đồ điện tử, 3 năm quản lý cửa hàng"
                        :cta="['label' => 'Liên hệ ngay', 'href' => '#']"
                    />
                </div>

                {{-- Item 6 --}}
                <div class="flex-shrink-0 w-full px-3 flex justify-center" data-carousel-item>
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

            </div>
        </div>

        {{-- 2. Navigation --}}
        <div class="mt-8 flex items-center justify-center gap-4">
            {{-- Prev --}}
            <button type="button" aria-label="Previous"
                class="grid place-items-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500"
                data-carousel-prev>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6"><path fill="currentColor" d="M15.41 7.41L14 6l-6 6l6 6l1.41-1.41L10.83 12z"/></svg>
            </button>

            {{-- Dots --}}
            <div class="flex items-center justify-center gap-2" data-carousel-dots>
            </div>

            {{-- Next --}}
            <button type="button" aria-label="Next"
                class="grid place-items-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500"
                data-carousel-next>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6"><path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6l6 6l-6 6z"/></svg>
            </button>
        </div>

    </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/home.js')
@endpush
