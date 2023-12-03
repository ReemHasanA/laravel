@extends('layouts.master')
@section('content')
    

 
<div class="container mt-2">
 
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show All Actor</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('actors.create') }}"> Create actor</a>
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
            <th>actor Name</th>
            <th>Actor Movies</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($actors as $actor)
        <tr>
            <td>{{ $actor->id }}</td>
            <td><a href="{{route('actors.show',$actor->id)}}">{{ $actor->name }}</a></td>
            <td><ul>
                @foreach ($actor->movie as $movie)
                <li>{{ $movie->movie_name }}</li>
                @endforeach
            </ul></td>
            <td>
                <form action="{{ route('actors.destroy',$actor->id) }}" method="Post">
     
                    <a class="btn btn-primary" href="{{ route('actors.edit',$actor->id) }}">Edit</a>
    
                    @csrf
                    @method('DELETE')
       
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
   
 
 @endsection
