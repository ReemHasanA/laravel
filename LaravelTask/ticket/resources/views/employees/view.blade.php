@extends('auth.layouts')

@section('content')
   
 
<div class="container mt-2">
 
 <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>tickets</h2>
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
         @foreach ($tickets as $ticket)
         <tr>
             <td>{{ $ticket->id }}</td>
             <td>{{ $ticket->title }}</td>
             <td>{{ $ticket->messege }}</td>
             <td>
             <form action="{{ route('tickets.update',$ticket->id) }}" method="post">
                <div class="form-group">
                 @csrf
                 @method('PUT')
             <select name="statuses_id" id="" class="form-control col-3">
                    <option value="">status</option>
                    @foreach ($status as $s)
                    <option value="{{$s->id}}"
                    @if ($s->id ==$ticket->statuses_id)
                    selected
                    @endif
                    >{{$s->name}}</option>
                    @endforeach
                </select>
                <button tybe="submit" class="btn btn-success my-2">submit</button>
            </form>
             </td>
             <td>{{ $ticket->priority->name }}</td>
             <td>
                 <form action="{{ route('tickets.destroy',$ticket->id) }}" method="Post">
     
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