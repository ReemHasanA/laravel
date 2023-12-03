@extends('layouts.master')
@section('content')
    

 
<div class="container mt-2">
 
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Movie</h2>
                <form action="{{route('movies.index')}}">
                    <input type="search" name="search" id="">
                </form>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('movies.create') }}"> Create Movie</a>
                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="3.5" data-size="xs" disabled="">
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Movie Name</th>
            <th>Movie Description</th>
            <th>Movie Gener</th>
            <th>Movie Img</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>
            <td><a href="{{route('movies.show',$movie->id)}}">{{ $movie->movie_name }}</a></td>
            <td>{{ $movie->movie_description }}</td>
            <td>{{ $movie->movie_gener }}</td>
            <td><img src="{{ asset('image/'.$movie->movie_img) }}" height="100px" weidth="100px" alt=""></td>
            <td>
                <form action="{{ route('movies.destroy',$movie->id) }}" method="Post">
     
                    <a class="btn btn-primary" href="{{ route('movies.edit',$movie->id) }}">Edit</a>
    
                    @csrf
                    @method('DELETE')
       
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
   
    {{$movies->links() }}
 @endsection
