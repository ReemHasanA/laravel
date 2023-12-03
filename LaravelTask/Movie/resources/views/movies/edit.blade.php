@extends('layouts.master')
@section('content')
    

<div class="container m-4 p-2">
 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Movie</h2>
            </div>
           
        </div>
    </div>
    
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
   
    <form action="{{ route('movies.update',$movie->id) }}" method="POST" enctype="multipart/form-data" class="m">
        @csrf
        @method('PUT')
    
           
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-11 m-auto">
            <div class="form-group">
                <strong>Movie Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Movie Name" value="{{$movie->movie_name}}">
               @error('name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-11 m-auto">
            <div class="form-group">
                <strong>Movie Description:</strong>
                 <input type="text" name="description" class="form-control" placeholder="Movie Description" value ="{{ $movie->movie_description}}">
                @error('description')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-11 m-auto">
            <div class="form-group">
                <strong>Movie Gener:</strong>
                 <input type="text" name="gener" class="form-control" placeholder="Movie Gener" value="{{$movie->movie_gener}}">
                <!-- @error('address')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror -->
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-11 m-auto">
            <div class="form-group">
                <strong>Movie Image:</strong>
                 <input type="file" name="image" class="form-control" placeholder="Movie Image" value= "{{$movie->movie_img}}">
                <!-- @error('address')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror -->
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-dark ml-5">Submit</button>
    </form>
</div>
 @endsection
