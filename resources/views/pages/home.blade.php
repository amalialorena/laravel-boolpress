@extends('layout.main-layout')

@section('content')
    @auth
    <br/>
        <a class="btn btn-primary" href="{{ route('post.create') }}">CREATE POST</a>
        <br/>
    @endauth

    @foreach ($posts as $post)
        <div class=post>
            <h2> Post Title: {{ $post->title }}</h3>
                <p> Post text: {{ $post-> text }}</p>
                <p> Author: {{ $post-> author }}</p>
                <p> date: {{ $post -> created_at }}</p>
                <p> category: {{ $post -> category -> name}}</p>
                <p> tags: 
                    @foreach ($post -> tags as $tag)
                        {{ $tag -> name }},
                    @endforeach  
                </p>
                <a class="btn btn-primary"href="#">EDIT</a>
        </div>
    @endforeach

@endsection
