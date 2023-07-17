<style>
    .pagination {
    margin: 0;
    padding: 0;
    list-style-type: none;
    display: flex;
    justify-content: center;
}

.pagination ul {
    margin: 0;
    padding: 0;
}

.pagination li {
    display: inline-block;
    margin-right: 5px;
}

.pagination li a,
.pagination li span {
    display: inline-block;
    padding: 5px 10px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    color: #333;
    text-decoration: none;
}

.pagination li.active span {
    background-color: #007bff;
    color: #fff;
}

.pagination li.disabled span {
    pointer-events: none;
    opacity: 0.6;
}

.pagination li.disabled a {
    pointer-events: none;
    opacity: 0.6;
    cursor: default;
}
</style>
<div class="pagination">
    <ul>
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
</div>