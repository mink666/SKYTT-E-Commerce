<footer id="lien-he" class="bg-[var(--skytt-footer-bg)] text-[var(--skytt-text)]">
  <div class="max-w-6xl mx-auto px-4 py-10 grid gap-8 md:grid-cols-[200px_1fr_240px] items-start">

  {{-- Cột trái: logo --}}
<div class="flex md:block items-center md:items-start gap-4"> {{-- giữ layout hiện tại --}}
  <img src="{{ asset('images/logo.png') }}" alt="VinFast SKYTT"
     class="h-28 md:h-40 lg:h-48 w-auto object-contain shrink-0 transform translate-y-3 md:translate-y-5"> {{-- tăng size + đẩy xuống --}}
  <span class="sr-only">VinFast SKYTT</span> {{-- a11y --}}
</div>

    {{-- Cột giữa: thông tin doanh nghiệp --}}
    <div class="text-sm leading-6">
      <div class="font-semibold">Số đăng ký kinh doanh:</div>
      <div>Địa điểm ĐKKD:</div>

      <div class="mt-3">
        <div class="fw-bold">VinFast SKYTT 1</div>
        <ul class="list-disc pl-5">
          <li>12B Nguyễn Thị Định, Phường Bình Trưng, TP.HCM (Quận 2)</li>
          <li>Hotline: 0862.172.217</li>
        </ul>
      </div>

      <div class="mt-3">
        <div class="fw-bold">VinFast SKYTT 2</div>
        <ul class="list-disc pl-5">
          <li>300A-B Nguyễn Tất Thành, Phường Xóm Chiếu, TP.HCM (Quận 4)</li>
          <li>Hotline: 096.4432.766</li>
        </ul>
      </div>
    </div>

    {{-- Cột phải: social --}}
  <div class="justify-self-start md:justify-self-end">
    <div class="text-sm fw-semibold mb-3 text-center md:text-right">Theo dõi chúng tôi tại:</div>
    
    <div class="flex gap-3 md:justify-end">
      
      {{-- Facebook --}}
      {{-- Đã xóa "social-circle" và thêm hiệu ứng hover --}}
      <a href="#" aria-label="Facebook" class="hover:opacity-80 transition-opacity">
        <img src="{{ asset('images/footer-icons/facebook.png') }}" alt="Facebook" class="w-8 h-8">
      </a>
      
      {{-- Zalo/Phone --}}
      {{-- Đã xóa "social-circle" và thêm hiệu ứng hover --}}
      <a href="tel:0862172217" aria-label="Hotline" class="hover:opacity-80 transition-opacity">
        <img src="{{ asset('images/footer-icons/phone.png') }}" alt="Hotline" class="w-8 h-8">
      </a>

      {{-- TikTok --}}
      {{-- Đã xóa "social-circle" và thêm hiệu ứng hover --}}
      <a href="#" aria-label="TikTok" class="hover:opacity-80 transition-opacity">
        <img src="{{ asset('images/footer-icons/tiktok.png') }}" alt="TikTok" class="w-8 h-8">
      </a>
      
      {{-- Youtube --}}
      {{-- Đã xóa "social-circle" và thêm hiệu ứng hover --}}
      <a href="#" aria-label="Youtube" class="hover:opacity-80 transition-opacity">
        <img src="{{ asset('images/footer-icons/youtube.png') }}" alt="Youtube" class="w-8 h-8">
      </a>
      
    </div>

  </div>

  </div>

  <div class="border-t border-[color:rgba(11,36,52,.15)] text-xs md:text-sm text-center py-4 text-[color:rgba(11,36,52,.75)]">
    © {{ date('Y') }} VinFast SKYTT. All rights reserved.
  </div>
</footer>
