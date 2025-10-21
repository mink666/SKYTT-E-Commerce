@props([
  'quote',
  'author',
  'title' => '',  // Chức danh (VD: Freelance Designer)
])

{{-- 
  Cấu trúc card mới (đã loại bỏ Logo và nút "X")
  - rounded-3xl: Bo góc lớn
  - shadow-xl: Đổ bóng mềm và lớn
  - p-6 md:p-8: Padding
  - flex flex-col: Để căn chỉnh footer xuống dưới cùng
--}}
<article {{ $attributes->merge(['class' => 'rounded-3xl bg-white shadow-xl p-6 md:p-8 h-full flex flex-col']) }}>

  {{-- 1. Nội dung (Dấu ngoặc kép và quote) --}}
  <div class="flex-grow relative">
    {{-- Dấu ngoặc kép " lớn phía sau --}}
    <span class="text-6xl text-slate-100 absolute -top-4 left-0 z-0">“</span>
    
    {{-- Nội dung quote (z-10 để đè lên trên) --}}
    <p class="relative z-10 text-slate-600">
      {{ $quote }}
    </p>
  </div>

  {{-- 2. Footer (Tác giả) --}}
  {{-- Tăng margin-top (mt-12) để quote có nhiều không gian hơn --}}
  <div class="mt-12 flex items-center justify-between gap-4">
    
    {{-- Thông tin tác giả --}}
    <div class="flex items-center gap-3">
      
      {{-- 
        SỬ DỤNG ẢNH TĨNH:
        Sử dụng 'customer-avatar.png'. 
        Hãy đảm bảo bạn đặt ảnh này trong thư mục 'public/images/customer-avatar.png'
      --}}
     <img 
        src="{{ asset('images/customer-avatar.png') }}" 
        alt="Customer Avatar" 
        class="w-12 h-12 rounded-full object-cover flex-shrink-0"
      >
      
      <div>
        <div class="font-semibold text-slate-800">{{ $author }}</div>
        @if($title)
          {{-- Chức danh (title) --}}
          <div class="text-sm text-slate-500">{{ $title }}</div>
        @endif
      </div>
    </div>

    {{-- Không còn nút "X" ở đây --}}
  </div>
</article>