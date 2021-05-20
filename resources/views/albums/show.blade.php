@extends('layouts.app')

@section('content')

    <h1>「{{ $album->name }}」</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>日付</th>
            <td>{{ $album->date }}</td>
        </tr>
        <tr>
            <th>メモ</th>
            <td>{{ $album->memo }}</td>
        </tr>
    </table>
    
    {{-- アルバム編集ページへのリンク --}}
    {!! link_to_route('albums.edit', '編集する', ['album' => $album->id], ['class' => 'btn btn-light']) !!}
    
    {{-- アルバム削除フォーム --}}
    {!! Form::model($album, ['route' => ['albums.destroy', $album->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除する', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
    {{--  --}}
    {!! link_to_route('albumitems.create', '追加する', ['album' => $album->id], ['class' => 'btn btn-primary']) !!}
    
    @if (count($albumitems) > 0)
    <ul class="list-unstyled">
        @foreach ($albumitems as $albumitem)
            <tr>
                {{-- <td>{!! link_to_route('albums.show', $album->name, ['album' => $album->id]) !!}</td> --}}
                <td>{{ $albumitem->id }}</td>
                <td>{{ $albumitem->file_path }}</td>
                <td>{{ $albumitem->memo }}</td>
            </tr>
        @endforeach
    </ul>
    {{-- ページネーションリンク --}}
    {{ $albumitems->links() }}
    @endif

@endsection