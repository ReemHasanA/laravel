@extends('layouts.master')
@section('content')
<div class="container m-4 p-2">
<h1>
    {{$actor->name}}
</h1>
<p></p>

<ul>
    @foreach ($actor->movie as $movie)
    <li>{{ $movie->movie_name }}</li>
    @endforeach
</ul>
</div>
@endsection