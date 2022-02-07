@extends('layout.main-layout')

@section('content')

@foreach ($posts as $post)
<div class=post>
    <h2> {{ $post -> title }}</h3>
    <p>  {{ $post -> text }}</p>
    <p> Author: {{ $post -> author }}</p>

</div>
    
@endforeach
   
   
 
@endsection 
