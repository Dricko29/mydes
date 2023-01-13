@if ($paginator->hasPages())
    <div class="paginations mt-30">
        <ul>
            @if ($paginator->onFirstPage())
                <li @disabled(true)>
                    {{-- <a href="#"><i class="fas fa-chevron-left"></i></a> --}}
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                </li>
            @endif

                        {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="active" href="#">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                </li>
            @else
                <li>
                    <a href="#"><i class="fas fa-chevron-right"></i></a>
                </li>
            @endif
        </ul>
    </div>

@endif