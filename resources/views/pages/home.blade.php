@extends('layout.main-layout')

@section('content')
    @auth
    <br/>
        <a class="btn btn-primary" href="{{ route('post.create') }}">CREATE POST</a>
        <br/>
    @endauth

    @foreach ($posts as $post)
        <div class=post>
            <h2> {{ $post->title }}</h3>
                <p> {{ $post-> text }}</p>
                <p> Author: {{ $post-> author }}</p>
                <p> date: {{ $post -> created_at }}</p>
                <h2> category :{{ $post -> category -> name}}</h2>
        </div>
    @endforeach

@endsection
