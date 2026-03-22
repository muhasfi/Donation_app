@if ($paginator->hasPages())
<div class="id-pagination">
    <div class="id-pagination-info">
        Menampilkan
        <strong>{{ $paginator->firstItem() }}–{{ $paginator->lastItem() }}</strong>
        dari <strong>{{ $paginator->total() }}</strong> donasi
    </div>
    <div class="id-pagination-controls">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="id-page-btn disabled" aria-disabled="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            </span>
        @else
            <a class="id-page-btn" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($paginator->links()->elements as $element)
            @if (is_string($element))
                <span class="id-page-btn dots">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="id-page-btn active" aria-current="page">{{ $page }}</span>
                    @else
                        <a class="id-page-btn" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a class="id-page-btn" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
        @else
            <span class="id-page-btn disabled" aria-disabled="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
            </span>
        @endif

    </div>
</div>
@endif