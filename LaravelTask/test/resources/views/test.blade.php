<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Heellooooo</p>

    @foreach ($users as $user)
        {{ $user->email }}

        <p>Role: {{ $user->role->name }}</p>
        <br>
    @endforeach
</body>
</html>