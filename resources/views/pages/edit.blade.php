@extends('layout.main-layout')

@section('content')
    @auth
        <form class="post-form" action="{{ route('post.update', $post->id) }}" method="POST">
            @method('POST')
            @csrf

            <label for="title"></label>
            <input type="text" placeholder="title" name="title" value="{{ $post->title }}">
            <label for="text"></label>
            <textarea name="text" id="" cols="30" rows="10">{{ $post->text }}</textarea>

            <select name="category" id="category">
                @foreach ($categories as $category)
                    <option name="category" value="{{ $category->id }}" @if ($category->id == $post->category->id)
                        selected
                @endif
                > {{ $category->name }} </option>
                @endforeach
            </select>
            <br>
            <br>
            <h4>Tags:</h4>
            <div class="tags">

                @foreach ($tags as $tag)
                    <span class="tag">

                        <input type="checkbox" id="tag-{{ $tag->id }}" name="tag-{{ $tag->id }}" value="{{ $tag->id }}" 
                            @foreach ($post->tags as $postTag)
                                @if ($tag->id == $postTag->id) checked @endif
                            @endforeach
                        >
                        <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        <br>
                </span>
                @endforeach
            </div>
            <input class="btn btn-primary" type="submit" value="UPDATE">
        </form>
    @endauth
@endsection
