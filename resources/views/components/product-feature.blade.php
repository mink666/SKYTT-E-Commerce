@props([
    'image' => '', // đường dẫn ảnh (public/images/...)
    'title' => '', // tên xe
    'subtitle' => 'Xe điện', // nhãn nhỏ
    'price' => '', // giá hiển thị
    'stats' => [], // [['label','value'], ...]
    'link' => '#', // link nút
    'reverse' => false, // true => ảnh trái, text phải
    'imageClass' => '', // tuỳ biến thêm cho ảnh
])

@php
    $textOrder = $reverse ? 'lg:order-2' : ''; // đảo cột text khi reverse
    $imgOrder = $reverse ? 'lg:order-1' : ''; // đảo cột ảnh khi reverse
@endphp

{{--
    Đã thêm 'overflow-x-clip' để ngăn thanh cuộn ngang
    khi các hiệu ứng 'fade-left'/'fade-right' hoạt động
--}}
<section {{ $attributes->merge(['class' => 'relative min-h-[calc(100vh-56px)] flex items-center overflow-x-clip']) }}>
    <div class="w-screen relative left-1/2 -translate-x-1/2"> {{-- full-bleed ngang 100vw --}}
        <div class="mx-auto max-w-[1500px] px-6 grid lg:grid-cols-2 gap-6 items-center"> {{-- khung grid --}}

            {{-- CỘT TEXT --}}
            <div
                class="{{ $textOrder }} space-y-3 flex flex-col
                    {{ $reverse ? 'ml-auto text-left items-start max-w-[560px] lg:pr-0 xl:pr-0' : 'lg:pl-20 xl:pl-28' }}"
                
                {{-- HIỆU ỨNG AOS --}}
                data-aos="{{ $reverse ? 'fade-left' : 'fade-right' }}"
            >
                <div class="text-sm text-slate-600">{{ $subtitle }}</div> {{-- phụ đề --}}
                <h3 class="text-3xl md:text-4xl font-extrabold leading-tight">{{ $title }}</h3> {{-- tiêu đề --}}
                @if ($price)
                    <p class="text-slate-700">{{ $price }}</p> {{-- giá --}}
                @endif
                @if (!empty($stats))
                    <ul class="space-y-1 text-sm text-slate-600"> {{-- thông số --}}
                        @foreach ($stats as $s)
                            <li>• {{ $s['label'] }}: <span class="font-semibold">{{ $s['value'] }}</span></li>
                        @endforeach
                    </ul>
                @endif
                <div class="pt-2">
                    <x-btn :href="$link" label="Tìm hiểu thêm" :arrow="true" /> {{-- nút có mũi tên --}}
                </div>
            </div>

            {{-- CỘT ẢNH --}}
            <div
                class="{{ $imgOrder }} overflow-visible relative"

                {{-- HIỆU ỨNG AOS (ngược lại với cột text) --}}
                data-aos="{{ $reverse ? 'fade-right' : 'fade-left' }}"
            >
                <img src="{{ asset($image) }}" alt="{{ $title }}"
                    @class([
                        'block mx-auto w-auto object-contain max-h-[85vh]', // kích thước ảnh
                        'lg:scale-[1.55] xl:scale-[1.65]', // phóng lớn như full screen
                        'lg:-ml-6' => $reverse, // tràn nhẹ theo hướng
                        'lg:-mr-6' => !$reverse,
                        $imageClass,
                    ])>
            </div>

        </div>
    </div>
</section>