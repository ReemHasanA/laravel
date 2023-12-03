<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Home</title>
</head>
<body>
    <main class="container ">
    <h1 class="m-4">Dash</h1>
    <div class="d-flex justify-content-between text-light">
        <div class="card m-2 w-25 bg-success "><h2>Our Employee:{{$emp}}</h2></div>
        <div class="card m-2 w-25 bg-primary"><h2>Min Salary:{{$min}}</h2></div>
        <div class="card m-2 w-25 bg-danger"><h2>MaxSalary:{{$max}}</h2></div>
        
    </div>
    <a href="{{ route('employees.index') }}" class="m-3 p-2">View</a>
</main>
</body>
</html>