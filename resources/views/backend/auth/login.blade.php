<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/auth/login/style.css">

</head>
<body>

<div class="login">
    <h1 style="color: red">Login</h1>
    <form action="{{route('login')}}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email" required="required" />
        <p style="color: red">{{$errors->has('email') ? $errors->first('email') : ''}}</p>
        <input type="password" name="password" placeholder="Password" required="required" />
        <p style="color: red">{{$errors->has('password') ? $errors->first('password') : ''}}</p>
        <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button> <br>
        <a class="btn btn-primary btn-block btn-large" style="color: white; text-decoration: none" href="{{route('showFormRegister')}}">Sign Up</a><br>
        <a class="btn btn-primary btn-block btn-large" style="color: white; text-decoration: none" href="{{url('auth/redirect/google')}}">Login with Google</a>
    </form>
</div>

{{--<h2>Login</h2>--}}
{{--<form action="{{route('login')}}" method="post">--}}
{{--    @csrf--}}
{{--    <input type="email" name="email" value="{{old('email')}}" placeholder="email"><br>--}}
{{--    <p style="color: red">{{$errors->has('email') ? $errors->first('email') : ''}}</p>--}}
{{--    <input type="password" name="password" placeholder="password"><br>--}}
{{--    <p style="color: red">{{$errors->has('password') ? $errors->first('password') : ''}}</p>--}}
{{--    <button>Login</button>--}}
{{--</form>--}}
</body>
</html>
