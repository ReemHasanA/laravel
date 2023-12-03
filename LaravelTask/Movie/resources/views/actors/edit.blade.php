@extends('layouts.master')
@section('content')
    

<div class="container m-4 p-2">
 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit actor</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-dark" href="{{ route('actors.index') }}"> Back</a>
        </div>
        </div>
    </div>
    
  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
   
    <form action="{{ route('actors.update',$actor->id) }}" method="POST" class="m-3">
        @csrf
        @method('PUT')
    
           
        
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-11 m-auto">
            <div class="form-group">
                <strong>actor Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="actor Name" value="{{$actor->name}}">
               @error('name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-11 m-auto">
            <div class="form-group">
                <strong>Actor Movies:</strong>
                @foreach ($movies as $movie)
                <br>
                {{$actor->movie->pluck('id')}}
                {{$movie->id}}
                  
                    <input type="checkbox" name="movie[]" id="" value="{{ $movie->id }}">
                    <label for="">{{$movie->movie_name}}</label>
                    
                    @endforeach
            </div>
        </div>
 

    
    <button type="submit" class="btn btn-dark ml-5">Submit</button></div>
    </form>
</div>
 @endsection
