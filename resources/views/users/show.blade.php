@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">    
                </div>
                <dlv class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title">{{ $user->name }}</h3>
                        <h3 class="card-text">{{ $user->email }}</h3>
                    </div>    
                </dlv>
            </div>
        </div>
    </div>
    {!! link_to_route('users.edit', '編集する', ['user' => $user->id], ['class' => 'btn btn-primary']) !!}
    <a class="btn btn-secondary" href="/">戻る</a>
@endsection