<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home Page')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
{{--    Boostrap CSS--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="css/frontendcss/master/style.css">
</head>
<body>
<header id="header">
    <div id="header-img">
        <img src="img/frontend/cinemaLogo.png" alt="KoalaMan's Store Logo">
    </div>
    <nav id="nav-bar" class="navbar navbar-expand-lg">
        <a class="nav-link" href="#home">Trang chủ</a>
        <a class="nav-link" href="#features">Phim đang chiếu</a>
        <a class="nav-link" href="#games">Lịch phát </a>
        <a class="nav-link" href="#buy">Buy</a>
        <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
    </nav>
</header>

@yield('content')

{{--JS Boostrap--}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

<footer>
    <ul>
        <a href="#"><li>Chính sách</li></a>
        <a href="#"><li>Điều khoản</li></a>
        <a href="#"><li>Liên hệ</li></a>
    </ul><br>
    <p id="copyright">&copy;2022, Minhdz99 & Hùng phụ tùng</p>
</footer>
</html>
