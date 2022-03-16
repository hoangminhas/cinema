<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
        <a class="nav-link" href="#features">Phim đang chiếu</a>
        <a class="nav-link" href="#games">Lịch phát </a>
        <a class="nav-link" href="#buy">Buy</a>
    </nav>
</header>

<form id="form" action="#" method="get">
    <h1>Japan Anti Viruss Cinema</h1><br>
    <input id="email" type="email" placeholder="Nhập email để nhận các ưu đãi mới nhất" name="register"><br><br>
    <input id="submit" type="button" name="register" value="Đăng ký">
</form>

<main>
    <div id="home">
        <h2 style="text-align: center; margin-bottom: 50px">Phim hot trong tuần</h2>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/EE-4GvjKcfs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div id="features">
        <h2 style="text-align: center">Tin Tức và Ưu Đãi</h2>
        <section class="flex-secs">
            <img width="170px" height="170px" src="https://image.shutterstock.com/image-vector/white-events-sign-over-confetti-260nw-300283754.jpg" alt="album">
            <div class="secs">
                <h3>EVENTS</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
            </div>
        </section>
        <section class="flex-secs">
            <img width="170px" height="170px" src="https://x96.com/wp-content/uploads/2015/09/X96_RFH_CelebrityNews1.png" alt="news">
            <div class="secs">
                <h3>News</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
            </div>
        </section>
        <section class="flex-secs">
            <img width="200px" height="170px" src="https://previews.123rf.com/images/generationclash/generationclash1901/generationclash190100038/124399088-neon-sign-of-cinema-night-cinema-time-neon-logo-signboard-banner-with-popcorn-3d-glasses-and-movie-c.jpg" alt="shop">
            <div class="secs">
                <h3>Accessories</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
            </div>
        </section>
    </div>

    <div id="price">
        <h2 style="text-align: center">Phim Sắp Chiếu</h2>
        <div id="games">
            <section class="games-sections">
                <img src="https://m.media-amazon.com/images/M/MV5BMGJkNDJlZWUtOGM1Ny00YjNkLThiM2QtY2ZjMzQxMTIxNWNmXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_.jpg" alt="Animal Crossing">
                <button type="submit" value="submit">Chi tiết /></button>
            </section>
            <section class="games-sections">
                <img src="https://westcovmedia.files.wordpress.com/2013/09/insidious.jpg" alt="Mario Kart 8">
                <button type="submit" value="submit">Chi tiết /></button>
            </section>
            <section class="games-sections">
                <img src="https://www.themoviedb.org/t/p/original/gGEsBPAijhVUFoiNpgZXqRVWJt2.jpg" alt="Super Smash Bros">
                <button type="submit" value="submit">Chi tiết /></button>
            </section>
        </div><br><br><br>

        <div id="buy">
            <img src="https://media.istockphoto.com/vectors/cinema-vector-id848210156?b=1&k=20&m=848210156&s=612x612&w=0&h=aqFOea3f5HbaowlY_nVvVdMjAa_PxYaFvbfHI_rO8CI=">
            <button type="submit" value="submit">Buy</button>
        </div>
    </div>



</main>


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
