<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Create</title>
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Add employee</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
        </div>
    </div>
</div>
    
<form action="{{ route('users.store') }}" method="post">
    @csrf
    
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>employee Name:</strong>
               <input type="text" name="name" class="form-control" placeholder="employee Name">
              @error('name')
                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
           </div>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>employee Email:</strong>
               <input type="email" name="email" class="form-control" placeholder="employee email">
              @error('email')
                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
           </div>
       </div>
    
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>employee password:</strong>
               <input type="password" name="password" class="form-control" placeholder="employee password">
              @error('password')
                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
           </div>
       </div>
           
           
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>employee Salary:</strong>
                   <input type="number" name="salary" class="form-control" placeholder="employee Salary">
                   @error('salary')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
                </div>
            </div>
 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>employee Position:</strong>
                <input type="text" name="position" class="form-control" placeholder="employee Position">
                
                
                @error('position')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <input type="hidden" name="role_id" value="2">
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    
    

</form>    
</body>
</html>