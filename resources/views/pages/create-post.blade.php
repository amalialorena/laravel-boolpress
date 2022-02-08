@extends('layout.main-layout')

@section('content')

    <form class="post-form" action="{{ route('post.store') }}" method="POST">
        @method('POST')
        @csrf

        <label for="title"></label>
        <input type="text" placeholder="title" name="title">
        <label for="text"></label>
        <textarea name="text" id="" cols="30" rows="10" placeholder="Your text"></textarea>
        <input type="submit" value="Create new post">
    </form>

    {{-- @foreach ($posts as $post)
<div class=post>
    <h2> {{ $post -> title }}</h3>
    <p>  {{ $post -> text }}</p>
    <p> Author: {{ $post -> author }}</p>

</div>
    
@endforeach --}}

@endsection
