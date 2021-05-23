@extends('layouts.app')

@section('content')

    <div class="col-sm-8 offset-sm-2">
        <div class="card bg-dark text-white">
            <img class="card-img img-fluid" src="/image/album_title.jpeg" alt="title" style="opacity: 0.6;">
            <div class="card-img-overlay">
                <h1 class="card-title text-center" style="padding-top: 150px;">「{{ $album->name }}」</h1>
                <p class="card-text text-center">{{ $album->date }}</p>
            </div>
            
        </div>
        <h5 class="text-center" style="padding-top: 10px; padding-bottom:30px;">{{ $album->memo }}</h5>
    </div>
    
    {{--  --}}
    <div class="text-center">
        {!! link_to_route('albumitems.create', '写真を追加する', ['album' => $album->id], ['class' => 'btn btn-primary']) !!}
    </div>
    
    @if (count($albumitems) > 0)
        <div class="row" style="padding-top: 20px;">
        @foreach ($albumitems as $albumitem)
            <div class="col-sm-4"  style="padding-bottom: 20px;">
                <div class="card">
                    <h5 class="card-header">photo</h5>
                    <img src="/storage/album_covers/{{$albumitem->file_path}}" class="card-img-top" alt="image">
                    <div class="card-body">
                        <p class="card-text">{{$albumitem->memo}}</p>
                        {{-- アルバム削除フォーム --}}
                        {!! Form::model($album, ['route' => ['albumitems.destroy', $albumitem->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    {{-- ページネーションリンク --}}
    {{ $albumitems->links() }}
    @endif

@endsection