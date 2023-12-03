<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Edit</title>
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Edit employee</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
        </div>
    </div>
</div>
    
    
<form action="{{ route('employees.update',$employee) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>employee Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="employee Name" value="{{$employee->name}}">
               @error('name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>employee Salary:</strong>
                 <input type="number" name="salary" class="form-control" placeholder="employee Salary" value="{{$employee->salary}}">
                @error('salary')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>employee Department:</strong>
                 
                 <select name="department_id" id="" class="form-control">
                     <option value=""></option>
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}"
                    @if (($department->id)==($employee->department_id))
                    selected
                    @endif
                    >{{$department->name}}</option>
                    @endforeach
                </select>
                @error('department_id')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary ml-3">Edit</button>
    </div>
    
</form>
    </div>
</body>
</html>