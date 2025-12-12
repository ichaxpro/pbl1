{{-- resources/views/vendor/pagination/tailwind.blade.php --}}

@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex justify-end mt-4">
    <ul class="inline-flex items-center space-x-1">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li class="px-3 py-1 rounded bg-gray-200 text-gray-400 cursor-not-allowed">&lt;</li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-3 py-1 rounded bg-white text-black hover:bg-blue-100 hover:text-blue-700">&lt;</a>
            </li>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="px-3 py-1 bg-white text-gray-400">{{ $element }}</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- Active Page as rectangular box --}}
                        <li class="px-4 py-2 bg-blue-600 text-white font-bold rounded-md">
                            {{ $page }}
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}"
                               class="px-3 py-1 bg-white text-black hover:bg-blue-100 hover:text-blue-700 rounded-md">
                               {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-3 py-1 rounded bg-white text-black hover:bg-blue-100 hover:text-blue-700">&gt;</a>
            </li>
        @else
            <li class="px-3 py-1 rounded bg-gray-200 text-gray-400 cursor-not-allowed">&gt;</li>
        @endif
    </ul>
</nav>
@endif
