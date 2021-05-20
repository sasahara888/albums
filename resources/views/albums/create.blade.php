@extends('layouts.app')

@section('content')

    <h1>アルバム登録</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($album, ['route' => 'albums.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'タイトル：') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('date', '日付：') !!}
                    {!! Form::text('date', null, ['class' => 'form-control']) !!}
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