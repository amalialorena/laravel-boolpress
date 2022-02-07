@extends('layout.main-layout')
@section('content')

@foreach ($posts as $post)
    <h3>{{ $post -> title }}</h3>
    <p> {{ $post -> text }}</p>
    <p> {{ $post -> author }}</p>
@endforeach

@endsection