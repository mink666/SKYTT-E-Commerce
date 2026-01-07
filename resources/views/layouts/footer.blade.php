<footer id="lien-he" class="bg-[var(--skytt-footer-bg)] text-[var(--skytt-text)] border-t border-gray-200 pt-12 pb-8">
    <div class="container mx-auto px-8 md:px-16">
        {{--
           GRID LAYOUT FIX:
           - We use a 5-4-3 split (lg:col-span-x) to mimic the reference image.
           - Left (5): Logo + Legal Text (heaviest content).
           - Center (4): Store Addresses.
           - Right (3): Socials & Hotline.
        --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-12 lg:gap-x-12 items-start">

            {{-- 1. LEFT COLUMN: Logo + Legal Info (Span 5) --}}
            <div class="lg:col-span-5 flex flex-col items-start gap-6 text-sm text-gray-600 leading-relaxed">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="block mb-2">
                    <img src="{{ asset('images/logo.png') }}"
                         alt="VinFast SKYTT"
                         class="h-20 md:h-24 w-auto object-contain">
                </a>

                {{-- Legal Info (Moved here to match reference image) --}}
                <div>
                    <h4 class="font-bold text-[#0B2434] uppercase mb-2 text-base">Công ty TNHH VinFast SKYTT</h4>
                    <p class="mb-1">Số đăng ký kinh doanh: <strong>0108926276</strong></p>
                    <p>Địa điểm ĐKKD: Sở KHĐT TP Hà Nội cấp lần đầu ngày 01/10/2019</p>
                </div>

                {{-- BCT Logo (Optional, fits well here) --}}
                {{-- <img src="{{ asset('images/bct-logo.png') }}" alt="Đã thông báo BCT" class="h-10 w-auto mt-2"> --}}
            </div>

            {{-- 2. CENTER COLUMN: Store Addresses (Span 4) --}}
            <div class="lg:col-span-4 flex flex-col gap-8 text-sm text-gray-600">

                {{-- Location 1 --}}
                <div>
                    <h5 class="font-bold text-[#0B2434] uppercase mb-3 text-sm tracking-wide">VinFast SKYTT 1</h5>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2">
                            <span class="shrink-0 mt-1">📍</span>
                            <span>12B Nguyễn Thị Định, P. Bình Trưng, TP.HCM (Quận 2)</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="shrink-0">📞</span>
                            <span><strong>Hotline:</strong> 0862.172.217</span>
                        </li>
                    </ul>
                </div>

                {{-- Location 2 --}}
                <div>
                    <h5 class="font-bold text-[#0B2434] uppercase mb-3 text-sm tracking-wide">VinFast SKYTT 2</h5>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2">
                            <span class="shrink-0 mt-1">📍</span>
                            <span>300A-B Nguyễn Tất Thành, P. Xóm Chiếu, TP.HCM (Quận 4)</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="shrink-0">📞</span>
                            <span><strong>Hotline:</strong> 096.4432.766</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- 3. RIGHT COLUMN: Socials & Contact (Span 3) --}}
            <div class="lg:col-span-3 flex flex-col items-start lg:items-end text-left lg:text-right">

                {{-- Hotline Big --}}
                <div class="mb-6">
                    <h4 class="font-bold text-[#0B2434] text-sm uppercase mb-2">Tổng đài CSKH</h4>
                    <a href="tel:1900232389" class="text-2xl font-bold text-[#0B2434] hover:text-[#3D5A17] transition-colors">
                        1900 23 23 89
                    </a>
                    <a href="mailto:support.vn@vinfastauto.com" class="block text-sm text-gray-500 mt-1 hover:underline">
                        support.vn@vinfastauto.com
                    </a>
                </div>

                {{-- Social Icons --}}
                <div>
                    <h4 class="font-bold text-[#0B2434] text-sm uppercase mb-4">Kết nối với VinFast</h4>
                    <div class="flex gap-4 lg:justify-end">
                        <a href="https://www.facebook.com/SKYTT.VINFAST/" class="hover:opacity-70 transition-transform hover:-translate-y-1 duration-300">
                            <img src="{{ asset('images/footer-icons/facebook.png') }}" alt="Facebook" class="w-8 h-8">
                        </a>
                        <a href="https://www.tiktok.com/@skyttvinfast" class="hover:opacity-70 transition-transform hover:-translate-y-1 duration-300">
                            <img src="{{ asset('images/footer-icons/tiktok.png') }}" alt="TikTok" class="w-8 h-8">
                        </a>
                        {{-- <a href="#" class="hover:opacity-70 transition-transform hover:-translate-y-1 duration-300">
                            <img src="{{ asset('images/footer-icons/youtube.png') }}" alt="Youtube" class="w-8 h-8">
                        </a> --}}
                        <a href="#" class="hover:opacity-70 transition-transform hover:-translate-y-1 duration-300">
                            <img src="{{ asset('images/footer-icons/phone.png') }}" alt="Zalo" class="w-8 h-8">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Copyright
    <div class="container mx-auto px-8 md:px-12 mt-4 pt-8 border-t border-gray-200">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
            <p>© {{ date('Y') }} VinFast SKYTT. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-[#0B2434] transition-colors">Điều khoản chính sách</a>
                <a href="#" class="hover:text-[#0B2434] transition-colors">Chính sách bảo mật</a>
            </div>
        </div>
    </div> --}}
</footer>
