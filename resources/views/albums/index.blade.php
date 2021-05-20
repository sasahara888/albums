@if (count($albums) > 0)
    <ul class="list-unstyled">
        @foreach ($albums as $album)
            <tr>
                <td>{!! link_to_route('albums.show', $album->name, ['album' => $album->id]) !!}</td>
                <td>{{ $album->date }}</td>
            </tr>
        @endforeach
    </ul>
    {{-- ページネーションリンク --}}
    {{ $albums->links() }}
@endif