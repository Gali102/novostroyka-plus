@if ($paginator->hasPages())
@push('style')
    <style>
  .page-navigation{      
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    align-content: center;
}
.page__link-wrapper{
    padding: unset !important;
    border: none !important;
    height: auto !important;
    background-color: transparent !important;
}
.link__span-wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
}
    </style>
@endpush
    <div class="page-navigation-container">
        <div class="container">
            <div class="page-navigation t-center">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-numbers page-item disabled link__span-wrapper" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link page__link-wrapper" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                 <li class="page-numbers page-item disabled "> 
                    <a class="page-numbers page-item page-link page__link-wrapper" style="text-align: center" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                 </li> 
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-numbers page__link-wrapper page-item disabled link__span-wrapper" aria-disabled="true">
                        <span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-numbers page-item current link__span-wrapper" aria-current="page"><span class="page__link-wrapper page-link">{{ $page }}</span></li>
                        @else
                 <li class="page-numbers page-item">
                    <a class="page-numbers page-item page-link page__link-wrapper" href="{{ $url }}">{{ $page }}</a>
                </li> 

                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                 <li class="page-numbers page-item">
                    <a class="page-numbers page-item page-link page__link-wrapper" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li> 
            @else
                <li class="page-numbers page-item disabled link__span-wrapper" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link page__link-wrapper" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif

            </div>
        </div>
    </div>
@endif
