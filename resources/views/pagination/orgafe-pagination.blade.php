@if ($paginator->lastPage() > 1)
    <div class="row">
        <div class="col-12">
            <div class="basic-pagination basic-pagination-2 text-center mt-20">
                <ul>
                    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $paginator->url(1) }}">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $paginator->url($paginator->currentPage()+1) }}">
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endif
