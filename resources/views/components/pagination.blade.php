<div class="custom-pagination mt-4">
    <nav aria-label="Pagination">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $currentPage <= 1 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $articles->url(1) }}" aria-label="В начало">В начало</a>
            </li>
            @for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++)
                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                    <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ $currentPage >= $totalPages ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $articles->url($totalPages) }}" aria-label="В конец">В конец</a>
            </li>
        </ul>
    </nav>
</div>

<style>
    .custom-pagination .pagination {
        font-size: 1rem;
        padding: 0.5rem 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .custom-pagination .page-item {
        margin: 0 5px;
    }
    .custom-pagination .page-link {
        color: #007bff;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 0.5rem 0.9rem;
        text-decoration: none;
        background-color: #fff;
    }
    .custom-pagination .page-link:hover,
    .custom-pagination .page-link:focus {
        color: #0056b3;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
    .custom-pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        cursor: default;
    }
    .custom-pagination .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #fff;
        border-color: #dee2e6;
        cursor: not-allowed;
    }
</style>