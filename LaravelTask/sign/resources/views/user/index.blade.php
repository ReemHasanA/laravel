@extends('auth.layouts')
@section('content')
    

 
<div class="container mt-2">
 
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create User</a>
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
            <th> Name</th>
            <th>Email</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="Post">
     
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
    
                    @csrf
                    @method('DELETE')
       
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
               
        </tr>
        @endforeach
    </table>
   
  
@endsection
