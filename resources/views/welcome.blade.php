@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
        
        <div class="row">
            {{-- アルバム一覧 --}}
            @include('albums.albums')
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Albums</h1>
            </div>
        </div>
    @endif
@endsection