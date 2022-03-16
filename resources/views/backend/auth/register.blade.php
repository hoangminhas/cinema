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
<h2>Register</h2>
<form action="{{route('register')}}" method="post">
    @csrf
    <input type="text" name="name" value="{{old('$')}}" placeholder="name"><br>
    <p style="color: red">{{$errors->has('name') ? $errors->first('name') : ""}}</p>
    <input type="email" name="email" placeholder="email"><br>
    <p style="color: red">{{$errors->has('email') ? $errors->first('mail') : ""}}</p>
    <input type="password" name="password" placeholder="password"><br>
    <p style="color: red">{{$errors->has('password') ? $errors->first('password') : ""}}</p>
    <input type="password" name="password" placeholder="confirmPassword"><br>
    <p style="color: red">{{$errors->has('confirmPassword') ? $errors->first('confirmPassword') : ""}}</p>
    <input type="hidden" name="role_id" value="2"><br>
    <button>Register</button>
</form>
</body>
</html>
