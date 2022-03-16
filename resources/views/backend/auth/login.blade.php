<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Login</h2>
<form action="{{route('login')}}" method="post">
    @csrf
    <input type="email" name="email" placeholder="email"><br>
    <p style="color: red">{{$errors->has('email') ? $errors->first('email') : ''}}</p>
    <input type="password" name="password" placeholder="password"><br>
    <p style="color: red">{{$errors->has('password') ? $errors->first('password') : ''}}</p>
    <button>Login</button>
</form>
</body>
</html>
