@extends('layout.main-layout')

@section('content')
@auth
    

    <form class="post-form" action="{{ route('post.update', $post -> id) }}" method="POST">
        @method('POST')
        @csrf

        <label for="title"></label>
        <input type="text" placeholder="title" name="title" value="{{$post -> title}}">
        <label for="text"></label>
        <textarea name="text" id="" cols="30" rows="10">{{$post -> text}}</textarea>
        <select name="category" id="category">
            @foreach ($categories as $category)
                <option name="category" value="{{ $category->id }}" 
                    @if ($category -> id == $post -> category -> id)
                        selected
                    @endif
                    > {{ $category->name }} </option>
            @endforeach
        </select>

        <div>
            <h4>Tags:</h4>
            @foreach ($tags as $tag)

            <input type="checkbox"  name="tags[]" value="{{ $tag -> id}}"

                @foreach ($post -> tags as $postTag)
                
                    @if ($tag -> id == $postTag -> id)
                        checked
                    @endif

                @endforeach
            
            > {{ $tag -> name}} <br>
            @endforeach
            <input class="btn btn-primary" type="submit" value="UPDATE">
        </div>

    </form>
    @endauth
@endsection
