<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('signin.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nmae">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="password">
        <input type="hidden" name="role_id" value="2" >
        <button type="submit" >Submit</button>
    </form>
</body>
</html>