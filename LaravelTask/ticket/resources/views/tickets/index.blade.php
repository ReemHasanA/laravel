<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Tickets</title>
</head>
<body>
   
 
<div class="container mt-2">
 
 <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Tickets</h2>
             </div>
             <div class="pull-right mb-2">
                 <a class="btn btn-success" href="{{ route('tickets.create') }}"> Create ticket</a>
             </div>
         </div>
         <div class="col-lg-12 margin-tb">
         <form action="{{route('tickets.index')}}">
                
                <label for="" class="col-3"><strong>Filter:</strong></label>
                <select name="priority_id" id="" class="form-control col-3">
                    <option value="">priority</option>
                    @foreach ($priorty as $p)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                </select>
                <select name="statuses_id" id="" class="form-control col-3">
                    <option value="">status</option>
                    @foreach ($status as $s)
                    <option value="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                </select>
                <button tybe="submit" class="btn btn-success my-2">search</button>
                </form></div>
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
             <th>User</th>
             <th>status</th>
             <th>priority</th>
             <th>employee to assign</th>
             <th>Action</th>
         </tr>
         @foreach ($tickets as $ticket)
         <tr>
             <td>{{ $ticket->id }}</td>
             <td>{{ $ticket->title }}</td>
             <td>{{ $ticket->messege }}</td>
             <td>{{ $ticket->user->name }}</td>
             <td>{{ $ticket->statuses->name }}</td>
             <td>{{ $ticket->priority->name }}</td>
             <td>
                @if ($ticket->employee_id==null)
                <form action="{{ route('tickets.update',$ticket->id) }}" method="post">
                <div class="form-group">
                 @csrf
                 @method('PUT')
                 <select name="employee_id" id="" class="form-control">
                     <option value=""></option>
                    @foreach ($employee as $emp)
                    <option value="{{$emp->id}}">{{$emp->user->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-warning">assign</button>
            </form>
            </div>
                @else
                {{ $ticket->employee->user->name }}
                @endif
            </td>
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
     <a href="/admin">Back</a>
</body>
</html>