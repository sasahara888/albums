@extends('layouts.app')

@section('content')

    <h1>アルバムアイテム登録</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($albumitem, ['route' => 'albumitems.store']) !!}
                <div class="form-group">
                    <input type="hidden" name="album_id" value="{{$albumitem->album_id}}">
                </div>
                <div class="form-group">
                    {!! Form::label('file_path', 'ファイルパス：') !!}
                    {!! Form::text('file_path', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('memo', 'メモ：') !!}
                    {!! Form::textarea('memo', null, ['class' => 'form-control', 'rows' => '3']) !!}
                </div>
                
                {!! Form::submit('登録する', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection