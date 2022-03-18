@extends('layoutFrontend.master')
@section('title', 'Home booking')
@section('content')
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
            <button type="submit" value="submit">Buy Now</button>
        </div>
    </div>

</main>
@endsection
