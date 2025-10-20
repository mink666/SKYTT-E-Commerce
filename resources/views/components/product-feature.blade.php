@props([
  'image'    => '',          // đường dẫn ảnh (public/images/...) 
  'title'    => '',          // tên xe 
  'subtitle' => 'Xe điện',   // nhãn nhỏ trên tiêu đề 
  'price'    => '',          // giá hiển thị (text) 
  'stats'    => [],          // [['label'=>'','value'=>''], ...] 
  'link'     => '#',         // link của nút 
  'reverse'  => false,       // true => ảnh trái, text phải 
  'imageClass' => '',        // tùy biến thêm cho ảnh (tùy chọn) 
])

@php
  $textOrder = $reverse ? 'lg:order-2' : '';   // đảo cột text khi reverse 
  $imgOrder  = $reverse ? 'lg:order-1' : '';   // đảo cột ảnh khi reverse 
@endphp

<section {{ $attributes->merge(['class' => 'relative min-h-[calc(100vh-56px)] flex items-center overflow-visible']) }}> {{-- full-screen trừ navbar --}}
  <div class="w-screen relative left-1/2 -translate-x-1/2"> {{-- full-bleed: tràn ngang 100vw --}}
    <div class="mx-auto max-w-[1400px] px-6 grid lg:grid-cols-2 gap-8 items-center"> {{-- khung 2 cột rộng --}}
      
      <div class="{{ $textOrder }} space-y-3 flex flex-col {{ $reverse ? 'text-right items-end' : '' }}"> {{-- khi reverse thì căn phải + nút bám mép phải --}} {{-- cột TEXT (gói chung 1 khối) --}}
        <div class="text-sm text-slate-600">{{ $subtitle }}</div> {{-- phụ đề --}}
        <h3 class="text-3xl md:text-4xl font-extrabold leading-tight">{{ $title }}</h3> {{-- tiêu đề --}}
        @if($price)
          <p class="text-slate-700">{{ $price }}</p> {{-- giá --}}
        @endif
        @if(!empty($stats))
          <ul class="space-y-1 text-sm text-slate-600"> {{-- thông số --}}
            @foreach($stats as $s)
              <li>• {{ $s['label'] }}: <span class="font-semibold">{{ $s['value'] }}</span></li>
            @endforeach
          </ul>
        @endif
        <div class="pt-2">
          <x-btn :href="$link" label="Tìm hiểu thêm" :arrow="true" /> {{-- nút có mũi tên --}}
        </div>
      </div>

      <div class="{{ $imgOrder }} overflow-visible"> {{-- cột ẢNH --}}
        <img src="{{ asset($image) }}" alt="{{ $title }}"
             class="block mx-auto w-auto max-h-[80vh] object-contain    {{-- cao gần full màn --}}
                    lg:scale-[1.35] lg:-mr-8 lg:-mb-4                     {{-- phóng to & ép sát mép như mẫu --}}
                    {{ $reverse ? 'lg:translate-x-[-0.5rem]' : 'lg:translate-x-[0.5rem]' }} {{-- lệch nhẹ --}}
                    {{ $imageClass }}"> {{-- hook tùy biến thêm --}}
      </div>

    </div>
  </div>
</section>
