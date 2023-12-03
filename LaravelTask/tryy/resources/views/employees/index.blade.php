<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

    <title>Employee</title>
</head>
<body>
<div class="container mt-2">
 
 <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Employees</h2>
             </div>
             <div class="pull-right mb-2">
                 <a class="btn btn-success" href="{{ route('employees.create') }}"> Create employee</a>
             </div>
             <div>
                <form action="{{route('employees.index')}}">
                
                <label for="department_id" class="col-4"><strong>employee Department:</strong></label>
                <select name="department_id" id="" class="form-control col-4">
                    <option value=""></option>
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                <button tybe="submit" class="btn btn-success my-2">search</button>
                </form>
             </div>
         </div>
     </div>
     
          
     <table class="table table-bordered">
         <tr>
             <th>No</th>
             <th> Name</th>
             <th>Salary</th>
             <th>Department</th>
             <th width="280px">Action</th>
         </tr>
         @foreach ($employees as $employee)
         <tr>
             <td>{{ $employee->id }}</td>
             <td>{{ $employee->name }}</td>
             <td>{{ $employee->salary }}</td>
             <td>{{ $employee->department->name }}</td>
             <td>
                 <form action="{{ route('employees.destroy',$employee->id) }}" method="Post">
      
                     <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
     
                     @csrf
                     @method('DELETE')
        
                     <button type="submit" class="btn btn-danger">Delete</button>
                 </form>
             </td>
                
         </tr>
         @endforeach
     </table>
     {!! $employees->links() !!}
</body>
</html>