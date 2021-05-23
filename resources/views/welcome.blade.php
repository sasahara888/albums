@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="text-center">
            <h1>{{ Auth::user()->name }}さんのアルバム</h1>
        </div>
        <div class="text-center" style="padding: 40px;">
            {!! link_to_route('albums.create', 'アルバムを追加する', [], ['class' => 'btn btn-primary']) !!}
        </div>
        <div class="row">
            {{-- アルバム一覧 --}}
            @include('albums.index')
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Albums</h1>
                <a>{!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-success']) !!}</a>
            </div>
        </div>
        <div class="center">
            <div class="text-center">
            {!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}
            </div>
        </div> 
    @endif
@endsection