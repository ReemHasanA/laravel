@extends('auth.layouts')
@section('content')

<div class="container m-4 p-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
        </div>
    </div>

    <!-- @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif -->

    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data" class="m">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-11 m-auto">
                <div class="form-group">
                    <strong>User Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="User Name" value="{{ $user->name }}">
                    <!-- @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-11 m-auto">
                <div class="form-group">
                    <strong>User Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="User Email" value="{{ $user->email }}">
                    <!-- @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror -->
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-11 m-auto">
                <div class="form-group">
                    <strong>User Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="Leave blank to keep the current password">
                </div>
            </div>

            
        </div>
<input type="hidden" name="_method" value="PUT">
        <button type="submit" class="btn btn-dark ml-5">Submit</button>
    </form>
</div>
@endsection