<div
    x-show="isContactModalOpen"
    style="display: none;"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-[100] flex items-center justify-center p-4"
>
    {{-- Backdrop --}}
    <div class="fixed inset-0 bg-black/40 transition-opacity" @click="isContactModalOpen = false"></div>

    {{-- Modal Content --}}
    <div class="relative w-full max-w-md bg-white rounded-[25px] shadow-xl p-8 z-10">

        {{-- Close Button --}}
        <button
            @click="isContactModalOpen = false"
            class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <h3 class="text-2xl font-semibold text-center mb-6 text-gray-900">Liên hệ với chúng tôi</h3>

        <div class="space-y-4">

            {{-- 1. FACEBOOK --}}
            <a href="https://www.facebook.com/SKYTT.VINFAST"
               target="_blank"
               class="flex items-center justify-center gap-3 bg-[#1877F2]/10 text-[#1877F2] border border-[#1877F2]/20 rounded-xl p-4 font-bold hover:bg-[#1877F2] hover:text-white transition-all duration-300 group">

                {{-- Facebook Icon --}}
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>

                <span>Nhắn tin qua Facebook</span>
            </a>

            {{-- 3. HOTLINE --}}
            <a href="tel:0862172217"
               class="flex items-center justify-center gap-3 bg-gray-100 text-gray-800 border border-gray-200 rounded-xl p-4 font-medium hover:bg-[#0B2434] hover:text-white transition-all duration-300">

                {{-- Phone Icon --}}
                <svg class="w-6 h-6 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>

                <span>Gọi Hotline: 0862.172.217</span>
            </a>

            {{-- 3. HOTLINE --}}
            <a href="tel:0862172217"
               class="flex items-center justify-center gap-3 bg-gray-100 text-gray-800 border border-gray-200 rounded-xl p-4 font-medium hover:bg-[#0B2434] hover:text-white transition-all duration-300">

                {{-- Phone Icon --}}
                <svg class="w-6 h-6 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>

                <span>Gọi Hotline: 096.4432.766</span>
            </a>

        </div>
    </div>
</div>
