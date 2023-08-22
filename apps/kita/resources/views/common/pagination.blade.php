 <ul class="pagination pt-3">
     <!-- 前ページへのリンク -->
    @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link" aria-label="前">
                Previous
            </span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="前">
                Previous
            </a>
        </li>
    @endif

     <!-- ページ番号リンクの計算 -->
    @php
        $startPage = max(1, $paginator->currentPage() - 1);
        $endPage = min($startPage + 2, $paginator->lastPage());
    @endphp

    <!-- ページ番号の表示 -->
    @for ($page = $startPage; $page <= $endPage; $page++)
        <li class="page-item{{ $paginator->currentPage() == $page ? ' active' : '' }}">
            <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
        </li>
    @endfor

     <!-- 次ページへのリンク -->
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="次">
                Next
            </a>
        </li>
    @else
        <li class="page-item disabled">
            <span class="page-link" aria-label="次">
                Next
            </span>
        </li>
    @endif
</ul>
