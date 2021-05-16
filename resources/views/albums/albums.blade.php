@if (count($albums) > 0)
    <ul class="list-unstyled">
        @foreach ($albums as $album)
            <li class="media mb-3">
                <div>
                    <p class="mb-0">{!! nl2br(e($album->name)) !!}</p>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションリンク --}}
    {{ $albums->links() }}
@endif