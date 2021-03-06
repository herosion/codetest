@if ($paginator->hasPages())
<div class="row"> 
<ul class="pagination" class="col s12">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="material-icons" style="color: #42a5f5">chevron_left</i></a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active #42a5f5 blue lighten-1" class="waves-effect "><a>{{ $page }}</a></li>
                @else
                    <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="material-icons" style="color: #42a5f5">chevron_right</i></a></li>
    @else
        <li class="disabled"><a><i class="material-icons">chevron_right</i></a></li>
    @endif
</ul>
</div> 
@endif
