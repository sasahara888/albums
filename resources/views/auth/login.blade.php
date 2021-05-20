@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            
            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="col-sm-6 offset-sm-3">
                    {!! Form::submit('Log in', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}
            
            {{-- ユーザ登録ページへのリンク --}}
            {{-- <p class="mt-2">New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p> --}}
        </div>
    </div>
@endsection