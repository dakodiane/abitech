<div class="d-flex adign-items-center justify-content-end" >
    @if($paginator->lastPage() > 1)
        <div class="pagination">
            @if($paginator->currentPage() !== 1)
                <div class="page-item">
                    <a class="page-divnk"
                       href="{{ Request::fullUrlWithQuery(['page' => $paginator->currentPage() - 1]) }}">
                        <i class="fa fa-angle-double-left"></i>
                    </a>
                </div>
            @else
                <div class="page-item disabled">
                    <a href="#" class="page-divnk" aria-disabled="true">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </div>
            @endif
            @if($paginator->lastPage() <= 7)
                @for($i = 1; $i <= $paginator->lastPage(); $i++)
                    <div class="page-item">
                        <a class="page-divnk {{ $paginator->currentPage() === $i ? 'active' : '' }}"
                           href="{{ Request::fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a>
                    </div>
                @endfor
            @else
                @for( $i = 1; $i <= 3; $i++)
                    <div class="page-item">
                        <a class="page-divnk {{ $paginator->currentPage() === $i ? 'active' : '' }}"
                           href="{{ Request::fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a>
                    </div>
                @endfor
                {{--          3 dots  --}}

                @if($paginator-> currentPage() >= 4 && $paginator->currentPage() <= $paginator->lastPage() - 3)
                    <div class="page-item disabled">
                        <a class="page-divnk" href="#" tabindex="-1" aria-disabled="true">...</a>
                    </div>
                    <div class="page-item active">
                        <a class="page-divnk"
                           href="{{ Request::fullUrlWithQuery(['page' => $paginator->currentPage()]) }}">{{ $paginator->currentPage() }}</a>
                    </div>
                    <div class="page-item disabled">
                        <a class="page-divnk" href="#" tabindex="-1" aria-disabled="true">...</a>
                    </div>
                @else
                    <div class="page-item ">
                        <a
                            class="page-divnk" tabindex="-1"
                            href="{{ Request::fullUrlWithQuery([
                            'page' => $paginator->lastPage() % 2 === 0 ? $paginator->lastPage() / 2 : ($paginator->lastPage() + 1) / 2
                            ]) }}"
                        >...</a>
                    </div>
                @endif

                @for( $i = $paginator->lastPage() - 2; $i <= $paginator->lastPage(); $i++)
                    <div class="page-item">
                        <a class="page-divnk {{ $paginator->currentPage() === $i ? 'active' : '' }}"
                           href="{{ Request::fullUrlWithQuery(['page' => $i]) }}">{{ $i }}</a>
                    </div>
                @endfor
            @endif



            @if($paginator->currentPage() !== $paginator->lastPage())
                <div class="page-item">
                    <a class="page-divnk"
                       href="{{ Request::fullUrlWithQuery(['page' => $paginator->currentPage() + 1]) }}">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            @else
                <div class="page-item disabled">
                    <a class="page-divnk" href="#" tabindex="-1" aria-disabled="true">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                </div>
            @endif
        </div>
    @endif
</div>
