@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex justify-center">
        <div class="flex items-center space-x-2">

            @foreach ($elements as $element)

                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())
                            <span class="flex items-center justify-center w-8 h-8 bg-[#3D5A17] text-white rounded-full text-sm font-semibold">
                                {{ $page }}
                            </span>

                        @else
                            <a href="{{ $url }}" class="flex items-center justify-center w-8 h-8 text-gray-700 bg-white rounded-full text-sm font-semibold hover:bg-gray-100 transition-colors">
                                {{ $page }}
                            </a>
                        @endif

                    @endforeach
                @endif

            @endforeach

        </div>
    </nav>
@endif
