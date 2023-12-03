@extends('auth.layouts')

@section('content')
   
 
<div class="container mt-2">
 
 <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>tickets</h2>
             </div>
             <div class="pull-right mb-2">
                 <a class="btn btn-success" href="{{ route('tickets.create') }}"> Create ticket</a>
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
             <th>Title</th>
             <th>Messege</th>
             <th>status</th>
             <th>priority</th>
             <th width="280px">Action</th>
         </tr>
         @foreach ($userTicket as $ticket)
         <tr>
             <td>{{ $ticket->id }}</td>
             <td>{{ $ticket->title }}</td>
             <td>{{ $ticket->messege }}</td>
             <td>{{ $ticket->statuses->name }}</td>
             <td>{{ $ticket->priority->name }}</td>
             <td>
                 <form action="{{ route('tickets.destroy',$ticket->id) }}" method="Post">
      
                     <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Edit</a>
     
                     @csrf
                     @method('DELETE')
        
                     <button type="submit" class="btn btn-danger">Delete</button>
                 </form>
             </td>
                
         </tr>
         @endforeach
     </table>
</div>
@endsection