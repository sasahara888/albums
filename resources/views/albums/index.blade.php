@if (count($albums) > 0)
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">タイトル</th>
                <th scope="col">作成日</th>
                <th scope="col">画像数</th>
                <th scope="col">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
            <tr>
                <td>
                    {!! link_to_route('albums.show', $album->name, ['album' => $album->id]) !!}
                </th>
                <td>{{$album->date}}</td>
                <td>
                    <button type="button" class="btn btn-primary">
                        Photo <span class="badge bg-secondary">{{$album->albumitems_count}}</span>
                    </button>
                </td>
                <td>
                    <div class="btn-toolbar" role="toolbar">
                        {!! link_to_route('albums.edit', '編集', ['album' => $album->id], ['class' => 'btn btn-success']) !!}
                        {!! Form::model($album, ['route' => ['albums.destroy', $album->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{-- ページネーションリンク --}}
    {{ $albums->links() }}
@endif



