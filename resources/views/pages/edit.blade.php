@extends('layout.main-layout')

@section('content')
@auth
    

    <form class="post-form" action="{{ route('post.store') }}" method="POST">
        @method('POST')
        @csrf

        <label for="title"></label>
        <input type="text" placeholder="title" name="title">
        <label for="text"></label>
        <textarea name="text" id="" cols="30" rows="10" placeholder="Your text"></textarea>
        <input type="submit" value="Create new post">
        <select name="category" id="category">
            @foreach ($categories as $category)
                <option name="category" value="{{ $category->id }}"> {{ $category->name }} </option>
            @endforeach
        </select>

        <div>
            <h4>Tags:</h4>
            @foreach ($tags as $tag)
            <input type="checkbox"  name="tags[]" value="{{ $tag -> id}}"> {{ $tag -> name}} <br>
            @endforeach
            <input class="btn" type="submit" value="CREATE">
        </div>

    </form>
    @endauth
@endsection
