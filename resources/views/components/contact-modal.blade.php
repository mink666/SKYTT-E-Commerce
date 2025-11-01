<div
    x-show="isContactModalOpen"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center p-4"
>
    <div
        @click="isContactModalOpen = false"
        class="fixed inset-0 bg-black/40 z-40">
    </div>

    <!-- Modal box -->
    <div
        class="relative z-50 w-full max-w-md bg-white rounded-[25px] shadow-xl p-8"
        @click.away="isContactModalOpen = false"
    >
        <button
            @click="isContactModalOpen = false"
            class="absolute top-4 right-4 text-gray-400 hover:text-gray-600"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <h3 class="text-2xl font-semibold text-center mb-6">Liên hệ với chúng tôi</h3>

        <div class="space-y-4">
            <a href="#" class="block bg-gray-100 rounded-xl p-4 text-center text-gray-800 font-medium hover:bg-gray-200 transition-colors">
                Liên hệ qua Facebook
            </a>

            <a href="#" class="block bg-gray-100 rounded-xl p-4 text-center text-gray-800 font-medium hover:bg-gray-200 transition-colors">
                Liên hệ qua Instagram
            </a>

            <a href="#" class="block bg-gray-100 rounded-xl p-4 text-center text-gray-800 font-medium hover:bg-gray-200 transition-colors">
                Liên hệ qua Zalo
            </a>
        </div>
    </div>
</div>
