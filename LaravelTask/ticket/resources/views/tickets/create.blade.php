<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Add ticket</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Back</a>
        </div>
    </div>
</div>
    
    
<form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
   
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ticket Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="ticket Name">
               @error('title')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ticket Messege:</strong>
                 <input type="text" name="messege" class="form-control" placeholder="ticket Mes">
                @error('messege')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ticket priority:</strong>
                 
                 <select name="priority_id" id="" class="form-control">
                     <option value=""></option>
                    @foreach ($priorty as $priority)
                    <option value="{{$priority->id}}">{{$priority->name}}</option>
                    @endforeach
                </select>
                @error('priority_id')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        
        <input type="hidden" name="statuses_id" value="1">
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
    
</form>
    </div>
</body>
</html>