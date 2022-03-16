<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/auth/register/style.css">
</head>
<body>
<p class="texto">Register</p>
<div class="Registro">
    <form method="post" action="{{route('register')}}">
        @csrf
        <span class="fontawesome-user"></span><input type="text" value="{{old('name')}}" name="name" placeholder="name" autocomplete="off">
{{--        <p style="color: red">{{($errors->has('name') ? $errors->first('name') : "")}}</p>--}}
        <span class="fontawesome-envelope-alt"></span><input type="email" value="{{old('email')}}" id="email" name="email" placeholder="Email" autocomplete="off">
{{--        <p style="color: red">{{$errors->has('email') ? $errors->first('mail') : ""}}</p>--}}
        <span class="fontawesome-lock"></span><input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
{{--        <p style="color: red">{{$errors->has('password') ? $errors->first('password') : ""}}</p>--}}
        <span class="fontawesome-lock"></span><input type="password" name="confirmPassword" placeholder="Confirm Password" autocomplete="off">
{{--        <p style="color: red">{{$errors->has('confirmPassword') ? $errors->first('confirmPassword') : ""}}</p>--}}
        <input type="hidden" name="role_id" value="2"><br>

    @if($errors->any())
            @foreach($errors->all() as $error)
                <p style="color: red">{{$error}}</p>
            @endforeach
        @endif
        <input type="submit" value="Register" title="Registra tu cuenta"><br><br>
        <a id="back" href="{{route('login')}}"><input type="button" value="Back" title="Registra tu cuenta"></a>
    </form>

</div>
{{--<h2>Register</h2>--}}
{{--<form action="{{route('register')}}" method="post">--}}
{{--    @csrf--}}
{{--    <input type="text" name="name" value="{{old('name')}}" placeholder="name"><br>--}}
{{--    <p style="color: red">{{$errors->has('name') ? $errors->first('name') : ""}}</p>--}}
{{--    <input type="email" name="email" value="{{old('email')}}" placeholder="email"><br>--}}
{{--    <p style="color: red">{{$errors->has('email') ? $errors->first('mail') : ""}}</p>--}}
{{--    <input type="password" name="password" value="{{old('password')}}" placeholder="password"><br>--}}
{{--    <p style="color: red">{{$errors->has('password') ? $errors->first('password') : ""}}</p>--}}
{{--    <input type="password" name="password" value="{{old('confirmPassword')}}" placeholder="confirmPassword"><br>--}}
{{--    <p style="color: red">{{$errors->has('confirmPassword') ? $errors->first('confirmPassword') : ""}}</p>--}}
{{--    <input type="hidden" name="role_id" value="2"><br>--}}
{{--    <button>Register</button>--}}
{{--</form>--}}
</body>
</html>
