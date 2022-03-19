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
    <link rel="stylesheet" href="{{asset("css/frontendcss/master/style.css")}}">
    {{-- Boostrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="css/frontendcss/master/style.css">
    @yield('head')
</head>

<body>
<header id="header">
    <div id="header-img">
        <img src="{{asset("img/frontend/cinemaLogo2.png")}}" alt="Cinema's Logo">
    </div>
    <nav id="nav-bar" class="navbar navbar-expand-lg">
        <a class="nav-link" href="{{route('homepage')}}">Trang chủ</a>
        <a class="nav-link" href="{{route('current.movie.index')}}">Phim</a>
        <a class="nav-link" href="#games">Lịch phát hành</a>
        <a class="nav-link" href="#buy">Buy</a>
        <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
    </nav>
</header>
    <header id="header">
        <div id="header-img">
            <img style="width:100px" src="img/frontend/cinemaLogo2.png" alt="KoalaMan's Store Logo">
        </div>
        <nav id="nav-bar" class="navbar navbar-expand-lg mr-5">
            <a class="nav-link mr-2" href="{{ route('homepage') }}">Trang chủ</a>
            <a class="nav-link mr-2" href="{{ route('current.movie.index') }}">Phim</a>
            <a class="nav-link ml-2" href="#games">Lịch phát hành</a>
            <a class="nav-link mr-2" href="#buy">Buy</a>
            <div class="nav-item dropdown navbar-search col-1"><a class="nav-link dropdown-toggle hide"
                    data-toggle="dropdown" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></a>
                <div class="dropdown-menu">
                    <li class="arrow_box">
                        <form method="GET" action="{{ route('searchuser') }}">
                            <div class="input-group search-box">
                                <div class="position-relative has-icon-right full-width">
                                    <input class="form-control" name="search" id="search" type="text"
                                        placeholder="Search here...">
                                    <div class="form-control-position navbar-search-close"><i class="ft-x">
                                        </i></div>
                                </div>
                            </div>
                        </form>
                    </li>
                </div>
            </div>
            @if (Auth::check())
                <a class="nav-link" href="{{ route('infor') }}">{{ Auth::user()->name }}</a>
            @else
                <a href="{{ route('login') }}">Đăng Nhập</a>
            @endif
            <a href="{{ route('logout') }}">{{ Auth::check() ? 'Logout' : '' }}</a>
            @if (Auth::check())
                <a href="{{ route('home') }}">{{ Auth::user()->role_id == 1 ? 'Admin' : '' }}</a>
            @endif
        </nav>
    </header>

    @yield('content')


    <footer class="mt-4">
        <ul>
            <a href="#">
                <li>Chính sách</li>
            </a>
            <a href="#">
                <li>Điều khoản</li>
            </a>
            <a href="#">
                <li>Liên hệ</li>
            </a>
        </ul><br>
        <p id="copyright">&copy;2022, Minhdz99 & Hùng phụ tùng</p>
    </footer>
    {{-- JS Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>
