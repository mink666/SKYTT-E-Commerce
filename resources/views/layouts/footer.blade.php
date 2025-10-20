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
        <a href="#" aria-label="Facebook" class="social-circle">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor">
            <path d="M13.5 9H15V6h-1.5C11.57 6 10 7.57 10 9.5V11H8v3h2v5h3v-5h2.1l.4-3H13v-1.5c0-.28.22-.5.5-.5Z"/>
          </svg>
        </a>
        {{-- Zalo/Phone --}}
        <a href="tel:0862172217" aria-label="Hotline" class="social-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
            <path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 011 1V21a1 1 0 01-1 1C10.07 22 2 13.93 2 3a1 1 0 011-1h3.5a1 1 0 011 1c0 1.24.2 2.45.57 3.57a1 1 0 01-.24 1.02l-2.2 2.2z"/>
          </svg>
        </a>
        {{-- TikTok --}}
        <a href="#" aria-label="TikTok" class="social-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
            <path d="M21 8.5a7.5 7.5 0 01-5-1.96V15a5 5 0 11-5-5c.35 0 .69.04 1 .1v3.15a2 2 0 10-1 .25V2h3a7.5 7.5 0 005 2v4.5z"/>
          </svg>
        </a>
        {{-- YouTube --}}
        <a href="#" aria-label="YouTube" class="social-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
            <path d="M23 12c0-2.2-.18-3.7-.4-4.6-.23-.9-.9-1.6-1.8-1.8C19.9 5.3 12 5.3 12 5.3s-7.9 0-8.8.3c-.9.23-1.6.9-1.8 1.8C1.2 8.3 1 9.8 1 12s.18 3.7.4 4.6c.23.9.9 1.6 1.8 1.8.9.23 8.8.3 8.8.3s7.9 0 8.8-.3c.9-.23 1.6-.9 1.8-1.8.22-.9.4-2.4.4-4.6zM10 15.5v-7l6 3.5-6 3.5z"/>
          </svg>
        </a>
      </div>
    </div>

  </div>

  <div class="border-t border-[color:rgba(11,36,52,.15)] text-xs md:text-sm text-center py-4 text-[color:rgba(11,36,52,.75)]">
    © {{ date('Y') }} VinFast SKYTT. All rights reserved.
  </div>
</footer>
