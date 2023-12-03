@extends('auth.layouts')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
 @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif
        <div class="card">
            <div class="card-header">
            <h3>welcome</h3>
        </div>
        </div>
            <div class="card-body">
                <h4><a href="{{ route('users.index') }}">User</a></h4>
                <h4><a href="{{ route('tickets.index') }}">Ticket</a></h4>
                <h4><a href="{{ route('employees.index') }}">Employee</a></h4>
                 
            </div>
        </div>
    </div>    
</div>
@endsection