@props(['paginator'])

@if ($paginator->hasPages())
    <ul class="pagination justify-content-center mt-3">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link" style="height: 35;">prev</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" style="height: 35;" href="{{ $paginator->previousPageUrl() }}" rel="prev">prev</a>
            </li>
        @endif

        <!-- Pagination Elements -->
        @if ($paginator->lastPage() > 5 && $paginator->currentPage() > 3)
            <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
            <li class="page-item disabled"><span class="page-link">...</span></li>
        @endif

        @for ($i = max(1, $paginator->currentPage() - 2); $i <= min($paginator->lastPage(), $paginator->currentPage() + 2); $i++)
            <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($paginator->lastPage() > 5 && $paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="page-item disabled"><span class="page-link">...</span></li>
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" style="height: 35;" href="{{ $paginator->nextPageUrl() }}" rel="next">next</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link" style="height: 35;">next</span>
            </li>
        @endif
    </ul>
@endif
