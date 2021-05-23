@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ユーザー情報の更新</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="col-sm-4 offset-sm-4">
                    {!! Form::submit('更新する', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}
            
        </div>
    </div>
@endsection