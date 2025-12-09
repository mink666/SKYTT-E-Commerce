<div class="relative w-full">

    <div class="absolute top-0 left-0 w-full h-[85%] bg-[#F2F4F5] z-0 rounded-b-[3rem]"></div>

    <div class="container mx-auto px-4 pt-12 pb-12 relative z-10">

        <div class="text-center mb-10">
            <p class="text-2xl font-medium tracking-[0.2em] text-[#0B2434] uppercase mb-3">VINFAST</p>

            <h1 class="text-5xl md:text-[6rem] leading-none font-black text-[#0B2434] uppercase mb-6 tracking-tight">
                {{ $bike->name }}
            </h1>

            <div class="flex flex-col md:flex-row justify-center items-center gap-2 md:gap-8 text-sm md:text-base">
                <span class="text-[#0B2434] uppercase tracking-widest font-medium">{{ $bike->description }}</span>
                <span class="hidden md:inline text-[#0B2434]">|</span>

                <div class="font-bold text-[#]">
                    Giá niêm yết: <span class="text-2xl text-[#0B2434]" x-text="formatPrice(selectedVariant.price)"></span> VNĐ
                    <span class="block text-[10px] font-normal text-[#0B2434] mt-1">(Đã bao gồm VAT, 01 bộ sạc và ắc quy)</span>
                </div>
            </div>
        </div>

        <div class="relative max-w-6xl mx-auto min-h-[400px] md:min-h-[600px] flex items-center justify-center">

            <img :src="selectedVariant.image_url"
                 :alt="selectedVariant.color_name"
                 class="w-full h-auto max-h-[650px] object-contain transition-opacity duration-500 ease-in-out drop-shadow-2xl"
            >

            <div class="absolute right-4 top-1/2 -translate-y-1/2 flex flex-col gap-4">
                @foreach($bike->variants as $variant)
                    <button
                        @click="selectedVariant = {{ $variant }}"
                        class="w-6 h-6 md:w-8 md:h-8 rounded-full border-2 border-white/20 shadow-lg transition-transform hover:scale-125 focus:outline-none"
                        :class="selectedVariant.id === {{ $variant->id }} ? 'ring-2 ring-offset-2 ring-offset-[#0B2434] ring-white scale-110' : ''"
                        style="background-color: {{ $variant->color_name }};"
                        title="{{ $variant->color_name }}"
                    ></button>
                @endforeach
            </div>
        </div>
    </div>
</div>
