@extends('layout.main-layout')

@section('content')
    @auth
        <br />
        <a class="btn btn-primary" href="{{ route('post.create') }}">CREATE POST</a>
        <br />
        <br />
    @endauth

    @foreach ($posts as $post)
        <div class="post">
            <div class="category">{{ $post->category->name }}</div>
            <h2> Post Title: {{ $post->title }}</h2>
            <small class="author">By {{ $post->author }} in {{ $post->created_at }} </small>
            <p>{{ $post->text }}</p>

            <br>
            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="tag">{{ $tag->name }}</span>
                @endforeach
            </div>
            
            <div class="action-bar">
                <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}"> EDIT</a>
                <a class="btn btn-danger" href="{{ route('post.delete', $post->id) }}"> DELETE</a>
            </div>
        </div>
    @endforeach

@endsection
